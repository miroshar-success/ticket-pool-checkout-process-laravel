<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Log;
use App\Models\AppUser;
use App\Models\Review;
use App\Models\Event;
use App\Models\Notification;
use App\Models\Ticket;
use App\Models\Setting;
use App\Models\OrderTax;
use App\Models\OrderChild;
use App\Models\User;
use App\Models\Settlement;
use App\Models\EventReport;
use App\Models\PaymentSetting;
use App\Models\OrganizerPaymentKeys;
use App\Models\Tax;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Stripe;
use Carbon\Carbon;
use Exception;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Throwable;

class OrderController extends Controller
{
    public function index()
    {

        if (Auth::user()->hasRole('admin')) {
            $orders = Order::with(['customer', 'event'])->OrderBy('id', 'DESC')->get();
        } elseif (Auth::user()->hasRole('Organizer')) {
            $orders = Order::with(['customer', 'event'])->where('organization_id', Auth::user()->id)->OrderBy('id', 'DESC')->get();
        }
        return view('admin.order.index', compact('orders'));
    }

    public function show($order_id, $id)
    {
        $order = Order::with(['customer', 'event', 'organization', 'ticket'])->find($order_id);
        $noti = Notification::find($id);
        if (isset($noti) && $noti->status == 1) {
            DB::table('notification')->where('id', $id)->update(['status' => 0]);
        }
        return view('admin.order.view', compact('order'));
    }

    public function orderInvoice($id)
    {
        $order = Order::with(['customer', 'event', 'organization', 'ticket'])->find($id);
        $order->tax_data = OrderTax::where('order_id', $id)->get();
        $order->ticket_data = OrderChild::where('order_id', $order->id)->get();
        return view('admin.order.invoice', compact('order'));
    }

    public function userReview()
    {
        $data = Review::orderBy('id', 'DESC')->get();
        return view('admin.review', compact('data'));
    }
    public function eventReports()
    {
        $data = EventReport::orderBy('id', 'DESC')->get();
        return view('admin.report', compact('data'));
    }
    public function changeReviewStatus($id)
    {
        Review::find($id)->update(['status' => 1]);
        return redirect()->back()->withStatus(__('Review is published successfully.'));
    }

    public function deleteReview($id)
    {
        $data = Review::find($id);
        $data->delete();
        return redirect()->back()->withStatus(__('Review is deleted successfully.'));
    }

    public function customerReport(Request $request)
    {
        $data = AppUser::orderBy('id', 'DESC');
        if (isset($request->duration) && $request->duration != null) {
            $start_date = explode(' to ', $request->duration)[0];
            $end_date = count(explode(' to ', $request->duration)) == 1 ? explode(' to ', $request->duration)[0] : explode(' to ', $request->duration)[1];
            $data->whereBetween('created_at', [$start_date . " 00:00:00", $end_date . " 23:59:59"]);
        }
        $data = $data->get();

        foreach ($data as $value) {
            $value->buy_tickets = Order::where('customer_id', $value->id)->sum('quantity');
        }
        return view('admin.report.org_customer_report', compact('data', 'request'));
    }

    public function ordersReport(Request $request)
    {
        $data = Order::where([['organization_id', Auth::user()->id], ['payment_status', 1]]);
        if (isset($request->customer) && $request->customer >= 1) {
            $data->where('customer_id', $request->customer);
        }
        if (isset($request->duration) && $request->duration != null) {
            $start_date = explode(' to ', $request->duration)[0];
            $end_date = count(explode(' to ', $request->duration)) == 1 ? explode(' to ', $request->duration)[0] : explode(' to ', $request->duration)[1];
            $data->whereBetween('created_at', [$start_date . " 00:00:00", $end_date . " 23:59:59"]);
        }

        $data = $data->orderBy('id', 'DESC')->get();

        return view('admin.report.org_orders_report', compact('data', 'request'));
    }

    public function orgRevenueReport(Request $request)
    {
        $data = Settlement::where('user_id', Auth::user()->id)->orderBy('id', 'DESC');
        if (isset($request->duration) && $request->duration != null) {
            $start_date = explode(' to ', $request->duration)[0];
            $end_date = count(explode(' to ', $request->duration)) == 1 ? explode(' to ', $request->duration)[0] : explode(' to ', $request->duration)[1];
            $data->whereBetween('created_at', [$start_date . " 00:00:00", $end_date . " 23:59:59"]);
        }
        $data = $data->get();

        foreach ($data as $value) {
            $value->user = User::find($value->user_id);
        }
        return view('admin.report.org_revenue', compact('data', 'request'));
    }

    public function adminCustomerReport(Request $request)
    {
        $data = AppUser::orderBy('id', 'DESC');

        if (isset($request->duration) && $request->duration != null) {
            $start_date = explode(' to ', $request->duration)[0];
            $end_date = count(explode(' to ', $request->duration)) == 1 ? explode(' to ', $request->duration)[0] : explode(' to ', $request->duration)[1];
            $data->whereBetween('created_at', [$start_date . " 00:00:00", $end_date . " 23:59:59"]);
        }
        $data = $data->get();
        foreach ($data as $value) {
            $value->buy_tickets = Order::where('customer_id', $value->id)->sum('quantity');
        }
        return view('admin.report.admin_customer_report', compact('data', 'request'));
    }

    public function adminOrgReport(Request $request)
    {
        $data = User::role('Organizer')->orderBy('id', 'DESC');
        if (isset($request->duration) && $request->duration != null) {
            $start_date = explode(' to ', $request->duration)[0];
            $end_date = count(explode(' to ', $request->duration)) == 1 ? explode(' to ', $request->duration)[0] : explode(' to ', $request->duration)[1];
            $data->whereBetween('created_at', [$start_date . " 00:00:00", $end_date . " 23:59:59"]);
        }
        $data = $data->get();
        foreach ($data as $value) {
            $value->total_events = Event::where('user_id', $value->id)->count();
            $value->total_tickets = Ticket::where([['user_id', $value->id], ['is_deleted', 0]])->sum('quantity');
            $value->sold_tickets = Order::where('organization_id', $value->id)->sum('quantity');
        }
        return view('admin.report.admin_org_report', compact('data', 'request'));
    }

    public function adminRevenueReport(Request $request)
    {
        $data = Order::with(['customer:id,name,last_name,email', 'event:id,name'])->where('payment_status', 1);
        if (isset($request->organizer) && $request->organizer >= 1) {
            $data->where('organization_id', $request->organizer);
        }
        if (isset($request->customer) && $request->customer >= 1) {
            $data->where('customer_id', $request->customer);
        }
        if (isset($request->duration) && $request->duration != null) {
            $start_date = explode(' to ', $request->duration)[0];
            $end_date = count(explode(' to ', $request->duration)) == 1 ? explode(' to ', $request->duration)[0] : explode(' to ', $request->duration)[1];
            $data->whereBetween('created_at', [$start_date . " 00:00:00", $end_date . " 23:59:59"]);
        }

        $data = $data->orderBy('id', 'DESC')->get();

        return view('admin.report.admin_revenue_report', compact('data', 'request'));
    }

    public function getStatistics($month)
    {
        $day = Carbon::parse(Carbon::now()->year . '-' . Carbon::now()->month . '-01')->daysInMonth;

        if (Auth::user()->hasRole('admin')) {
            $master['total_order'] = Order::whereBetween('created_at', [Carbon::now()->year . "-" . $month . "-01 00:00:00",  Carbon::now()->year . "-" . $month . "-" . $day . " 23:59:59"])->count();
            $master['pending_order'] = Order::where('order_status', 'Pending')->whereBetween('created_at', [Carbon::now()->year . "-" . $month . "-01 00:00:00",  Carbon::now()->year . "-" . $month . "-" . $day . " 23:59:59"])->count();
            $master['complete_order'] = Order::where('order_status', 'Complete')->whereBetween('created_at', [Carbon::now()->year . "-" . $month . "-01 00:00:00",  Carbon::now()->year . "-" . $month . "-" . $day . " 23:59:59"])->count();
            $master['cancel_order'] = Order::where('order_status', 'Cancel')->whereBetween('created_at', [Carbon::now()->year . "-" . $month . "-01 00:00:00",  Carbon::now()->year . "-" . $month . "-" . $day . " 23:59:59"])->count();
        } elseif (Auth::user()->hasRole('Organizer')) {
            $master['total_order'] = Order::where('organization_id', Auth::user()->id)->whereBetween('created_at', [Carbon::now()->year . "-" . $month . "-01 00:00:00",  Carbon::now()->year . "-" . $month . "-" . $day . " 23:59:59"])->count();
            $master['pending_order'] = Order::where([['order_status', 'Pending'], ['organization_id', Auth::user()->id]])->whereBetween('created_at', [Carbon::now()->year . "-" . $month . "-01 00:00:00",  Carbon::now()->year . "-" . $month . "-" . $day . " 23:59:59"])->count();
            $master['complete_order'] = Order::where([['order_status', 'Complete'], ['organization_id', Auth::user()->id]])->whereBetween('created_at', [Carbon::now()->year . "-" . $month . "-01 00:00:00",  Carbon::now()->year . "-" . $month . "-" . $day . " 23:59:59"])->count();
            $master['cancel_order'] = Order::where([['order_status', 'Cancel'], ['organization_id', Auth::user()->id]])->whereBetween('created_at', [Carbon::now()->year . "-" . $month . "-01 00:00:00",  Carbon::now()->year . "-" . $month . "-" . $day . " 23:59:59"])->count();
        }

        return response()->json(['success' => true, 'data' => $master], 200);
    }

    public function settlementReport()
    {
        $data = User::role('Organizer')->orderBy('id', 'DESC')->get();
        foreach ($data as $value) {
            $value->total_orders = Order::where('organization_id', $value->id)->count();
            $value->total_commission = Order::where([['organization_id', $value->id], ['payment_status', 1]])
                ->sum(DB::raw('org_commission + tax'));
            $value->pay_commission = Order::where([['organization_id', $value->id], ['payment_status', 1], ['org_pay_status', 1]])
                ->sum(DB::raw('org_commission + tax'));
            $value->organization_commission = Order::where([['organization_id', $value->id], ['payment_status', 1], ['org_pay_status', 0]])
                ->sum(DB::raw('org_commission + tax'));
        }

        return view('admin.report.admin_settlement_report', compact('data'));
    }

    public function viewSettlement($id)
    {
        $data = Settlement::where('user_id', $id)->orderBy('id', 'DESC')->get();
        foreach ($data as $value) {
            $value->user = User::find($value->user_id);
        }
        return view('admin.report.view_settlement', compact('data'));
    }

    public function payToUser(Request $request)
    {
        $data = $request->all();
        if ($request->payment_type == "STRIPE") {
            $currency = Setting::find(1)->currency;
            $stripe_secret = OrganizerPaymentKeys::find(1)->stripeSecretKey;
            Stripe\Stripe::setApiKey($stripe_secret);
            $stripeDetail =  Stripe\Charge::create([
                "amount" => intval($request->payment) * 100,
                "currency" => $currency,
                "source" => $request->stripeToken,
            ]);
            $data['payment_token'] = $stripeDetail->id;
            $data['payment_status'] = 1;
        }
        Settlement::create($data);
        Order::where([['organization_id', $request->user_id], ['payment_status', 1], ['org_pay_status', 0]])->update(['org_pay_status' => 1]);
        return redirect()->back()->withStatus(__('Your Payment done successfully.'));
    }

    public function payToOrganization(Request $request)
    {
        Settlement::create($request->all());
        Order::where([['organization_id', $request->user_id], ['payment_status', 1], ['org_pay_status', 0]])->update(['org_pay_status' => 1]);
        return response()->json(['msg' => null, 'success' => true], 200);
    }

    public function getQrCode($id)
    {
        $ticket = OrderChild::find($id);
        $ticket->order = Order::with(['customer:id,name,last_name', 'event:id,start_time,end_time,name,type,address', 'organization:id,image,first_name,last_name'])->find($ticket->order_id);
        $ticket->qrCode = QrCode::size(200)->generate($ticket->ticket_number);
        return view('admin.order.printTicket', compact('ticket'));
    }

    public function changeStatus(Request $request)
    {
        Order::find($request->id)->update(['order_status' => $request->order_status]);
        return response()->json(['success' => true, 'msg' => 'Status Changed'], 200);
    }

    public function changePaymentStatus(Request $request)
    {
        Order::find($request->id)->update(['payment_status' => 1]);
        return response()->json(['success' => true, 'msg' => 'Status Changed'], 200);
    }

    public function orderInvoicePrint($order_id)
    {
        $order = Order::with(['customer', 'event', 'organization', 'ticket'])->find($order_id);
        $order->tax_data = OrderTax::where('order_id', $order->id)->get();
        $order->ticket_data = OrderChild::with(['ticket'])->where('order_id', $order->id)->get();
        $order->maintax = array();
        foreach ($order->tax_data as $item) {
            $tax = Tax::find($item->tax_id)->get();
            $order->maintax = $tax;
        }
        return view('admin.order.invoicePrint', compact('order'));
    }

    public function sendMail($id)
    {

        $order = Order::with(['customer', 'event', 'organization', 'ticket'])->find($id);
        $order->tax_data = OrderTax::where('order_id', $order->id)->get();
        $order->ticket_data = OrderChild::where('order_id', $order->id)->get();
        $customPaper = array(0, 0, 720, 1440);
        $pdf = FacadePdf::loadView('ticketmail', compact('order'))->save(public_path("ticket.pdf"))->setPaper($customPaper, $orientation = 'portrait');
        $data["email"] = $order->customer->email;
        $data["title"] = "Ticket PDF";
        $data["body"] = "";
        $tempp = $pdf->output();
        $pathToFile = public_path("ticket.pdf");
        $sender = Setting::select('sender_email','app_name')->first();
        try {
            Mail::send('mail', $data, function ($message) use ($data, $tempp,$sender) {
                $message->from($sender->sender_email , $sender->app_name )
                    ->to($data["email"])
                    ->subject($data["title"])
                    ->attachData($tempp, "ticket.pdf");
            });
        } catch (Throwable $th) {
            Log::info($th->getMessage());
        }
        return redirect()->back()->withStatus(__('Mail Send Successfully.'));
    }
    public function showTicket($id)
    {
        $order = Order::with(['customer', 'event', 'organization', 'ticket'])->find($id);
        $orderchild = OrderChild::where('order_id', $order->id)->get();
        return view('frontend.singleticket', compact('order', 'orderchild'));
    }
    public function ticketDownload($id)
    {
        $order = Order::with(['customer', 'event', 'organization', 'ticket'])->find($id);
        $order->tax_data = OrderTax::where('order_id', $order->id)->get();
        $order->ticket_data = OrderChild::where('order_id', $order->id)->get();
        $customPaper = array(0, 0, 720, 1440);
        $pdf = FacadePdf::loadView('ticketmail', compact('order'))->save(public_path("ticket.pdf"))->setPaper($customPaper, $orientation = 'portrait');
        $tempp = $pdf->output();
        $response = response($tempp, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="ticket.pdf"',
        ]);
        return $response;
    }
}
