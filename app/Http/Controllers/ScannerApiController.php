<?php

namespace App\Http\Controllers;

use App\Models\OrderChild;
use App\Models\NotificationTemplate;
use App\Models\User;
use App\Models\Order;
use App\Models\Event;
use App\Models\AppUser;
use App\Models\Currency;
use App\Models\Ticket;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use App\Mail\ResetPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;


class ScannerApiController extends Controller
{
    public function __construct()
    {
        (new AppHelper)->eventStatusChange();
    }
    public function scannerLogin(Request $request)
    {

        $request->validate([
            'email' => 'bail|required|email',
            'password' => 'bail|required',
        ]);
        $userdata = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($userdata)) {
            if (Auth::user()->hasRole('scanner')) {
                $user = Auth::user();
                $user['token'] = $user->createToken('eventRight')->accessToken;
                return response()->json(['msg' => 'Login successfully', 'data' => $user, 'success' => true], 200);
            } else {
                return response()->json(['msg' => 'Only scanner can login.', 'success' => false], 200);
            }
        } else {
            return response()->json(['msg' => 'Invalid Username or password', 'data' => null, 'success' => false], 400);
        }
    }

    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email',
        ]);
        $user = User::where('email', $request->email)->first();

        $password = rand(100000, 999999);
        if ($user) {
            $content = NotificationTemplate::where('title', 'Reset Password')->first()->mail_content;
            $detail['user_name'] = $user->name;
            $detail['password'] = $password;
            $detail['app_name'] = Setting::find(1)->app_name;
            try {
                $setting = Setting::first();
                $config = array(
                    'driver'     => $setting->mail_mailer,
                    'host'       => $setting->mail_host,
                    'port'       => $setting->mail_port,
                    'encryption' => $setting->mail_encryption,
                    'username'   => $setting->mail_username,
                    'password'   => $setting->mail_password
                );
                Config::set('mail', $config);
                Mail::to($user)->send(new ResetPassword($content, $detail));
            } catch (\Throwable $th) {
                Log::info($th->getMessage());
            }
            return response()->json(['success' => true, 'msg' => 'Please check your email new password will send on it.', 'data' => null], 200);
        } else {
            return response()->json(['success' => false, 'msg' => 'Invalid email ID', 'data' => null], 200);
        }
    }

    public function scannerSetting()
    {
        $data = Setting::find(1, ['currency', 'default_lat', 'default_long', 'privacy_policy_organizer', 'terms_use_organizer', 'app_version', 'or_onesignal_app_id', 'or_onesignal_project_number', 'footer_copyright']);
        $data->currency_symbol = Currency::where('code', $data->currency)->first()->symbol;
        return response()->json(['data' => $data, 'success' => true], 200);
    }

    public function events()
    {
        $data = Event::where([['status', 1], ['is_deleted', 0], ['scanner_id', Auth::user()->id]])
            ->orderBy('id', 'DESC')->get()->makeHidden(['created_at', 'updated_at', 'tags', 'security', 'lang', 'lat', 'people', 'gallery', 'description']);
        foreach ($data as $item) {
            $order = Order::where('event_id', $item->id)->get();
            if (count($order) == 0) {
                $item->scanTicket = 0;
            } else {
                $orderData = Order::where('event_id', $item->id)->pluck('id');
                $item->scanTicket  = OrderChild::whereIn('order_id', $orderData)->where('status', 1)->count();
            }
        }
        return response()->json(['data' => $data, 'success' => true], 200);
    }

    public function eventDetail($id)
    {
        $img = array();
        $data = Event::find($id)->makeHidden(['created_at', 'updated_at']);
        foreach (array_filter(explode(',', $data->gallery)) as $value) {

            array_push($img, url('images/upload/') . '/' . $value);
        }
        $data->gallery = $img;
        $order = Order::where('event_id', $data->id)->get();
        if (count($order) == 0) {
            $data->scanTicket = 0;
        } else {
            $orderData = Order::where('event_id', $data->id)->pluck('id');
            $data->scanTicket = intval(OrderChild::whereIn('order_id', $orderData)->where('status', 1)->count());
        }
        return response()->json(['data' => $data, 'success' => true], 200);
    }

    public function eventUsers($id)
    {
        $order = Order::where('event_id', $id)->pluck('id');
        $orderChild = OrderChild::whereIn('order_id', $order)->orderBy('id', 'DESC')->get();
        foreach ($orderChild as $value) {
            $o = Order::find($value->order_id);
            $value->name = AppUser::find($value->customer_id)->name . ' ' . AppUser::find($value->customer_id)->last_name;
            $value->address = AppUser::find($value->customer_id)->address;
            $value->start_time = Event::find($o->event_id)->start_time->format('d M Y') . ', ' . Event::find($o->event_id)->start_time->format('h:i a');
            $value->end_time = Event::find($o->event_id)->end_time->format('d M Y') . ', ' . Event::find($o->event_id)->end_time->format('h:i a');
            $value->ticket_type = Ticket::find($o->ticket_id)->name;
        }
        return response()->json(['data' => $orderChild, 'success' => true], 200);
    }

    public function profile()
    {
        $data = User::find(Auth::user()->id);
        return response()->json(['data' => $data, 'success' => true], 200);
    }

    public function editProfile(Request $request)
    {
        User::find(Auth::user()->id)->update($request->all());
        $data = User::find(Auth::user()->id);
        return response()->json(['data' => $data, 'success' => true], 200);
    }

    public function scanTicket($code, $event_id)
    {
        $child = OrderChild::where('ticket_number', $code)->first();
        if (!$child) {
            return response()->json(['success' => false], 200);
        }
        $order = Order::find($child->order_id);
        $checkday = Ticket::find($child->ticket_id);
        $currency = Setting::find(1)->synbol;
        $data = [
            'payment_type' => $order->payment_type,
            'amount' => $order->payment,
            'currency' => $currency,
            'event_id' => $order->event_id,
        ];
        if ($checkday->allday == 1 && $checkday->maximum_checkins != null) {
            if ($order->checkins_count >= $checkday->maximum_checkins) {
                return response()->json(['msg' => 'Check-in limit exceeded!', 'data' => $data, 'success' => false], 200);
            }else{
                $add = $order->checkins_count + 1;
                Order::find($child->order_id)->update(['checkins_count' => $add, ]);
            }
        }
        if ($order->event_id == $event_id) {
            if ($child->status == 0) {
                if ($checkday->allday == 0) {
                    if ($order->ticket_date == Carbon::now()->format("Y-m-d")) {
                        OrderChild::find($child->id)->update(['status' => 1]);
                    } else {
                        return response()->json(['msg' => 'Ticket date is not match.', 'data' => $data, 'success' => false], 200);
                    }
                }
                $count = OrderChild::where([['order_id', $child->order_id], ['status', 0]])->count();
                if ($count == 0) {
                    Order::find($child->order_id)->update(['payment_status' => 1, 'order_status' => 'Complete',]);
                }
                if ($order->payment_type == 'LOCAL') {
                    return response()->json(['msg' => 'Please collect from the guest', 'success' => true, 'data' => $data], 200);
                }
                return response()->json(['msg' => 'Ticket scanned successfully.', 'data' => $data, 'success' => true], 200);
            } else {
                return response()->json(['msg' => 'Ticket is already scanned. ', 'success' => false], 200);
            }
        } else {
            return response()->json(['msg' => 'Ticket can not be found.', 'success' => false], 200);
        }
    }
    public function changePassword(Request $request)
    {
        $request->validate([

            'old_password' => 'bail|required',
            'password' => 'bail|required|min:6',
            'password_confirmation' => 'bail|required|same:password|min:6',
        ]);
        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::find(Auth::user()->id)->update(['password' => Hash::make($request->password)]);
            return response()->json(['success' => true, 'msg' => 'Your password is change successfully', 'data' => null], 200);
        } else {
            return response()->json(['success' => false, 'msg' => 'Current Password is wrong!', 'data' => null], 200);
        }
    }

    public function singleOrder($orderChildId)
    {
        $orderChild = OrderChild::find($orderChildId)->makeHidden(['created_at', 'updated_at']);
        $o = Order::find($orderChild->order_id);
        $orderChild->name = AppUser::find($orderChild->customer_id)->name . ' ' . AppUser::find($orderChild->customer_id)->last_name;
        $orderChild->start_time = Event::find($o->event_id)->start_time->format('d M Y') . ', ' . Event::find($o->event_id)->start_time->format('h:i a');
        $orderChild->end_time = Event::find($o->event_id)->end_time->format('d M Y') . ', ' . Event::find($o->event_id)->end_time->format('h:i a');
        $orderChild->ticket_type = Ticket::find($o->ticket_id)->name;
        return response()->json(['success' => true, 'data' => $orderChild], 200);
    }
}
