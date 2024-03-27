<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use App\Models\NotificationTemplate;
use App\Models\Category;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OneSignal;

class NotificationTemplateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('notification_template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = NotificationTemplate::OrderBy('id', 'DESC')->get();
        return view('admin.template.index', compact('data'));
    }

    public function create()
    {
        abort_if(Gate::denies('notification_template_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.template.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required',
            'subject' => 'bail|required',
        ]);
        $data = $request->all();
        NotificationTemplate::create($data);
        return redirect()->route('notification-template.index')->withStatus(__('Template has added successfully.'));
    }

    public function edit(NotificationTemplate $notificationTemplate)
    {
        abort_if(Gate::denies('notification_template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return response()->json(['success' => true, 'data' => $notificationTemplate], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'bail|required',
        ]);
        $data = $request->all();
        NotificationTemplate::find($id)->update($data);
        return redirect()->route('notification-template.index')->withStatus(__('Template has update successfully.'));
    }


    public function notification()
    {
        $notification = Notification::orderBy('id', 'DESC')->get();
        return view('admin.notification', compact('notification'));
    }
    public function getNotification()
    {
        $user = User::get();
        $appuser = AppUser::get();
        return view('admin.getNotification',compact('user','appuser'));
    }
    public function sendNotification(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);

        $userId = User::whereNotNull('device_token')->pluck('device_token')->all();

        if ($request->has('organizer_ids')) {
            foreach ($request->organizer_ids as $org) {
                $organizer = User::find($org);
                if ($organizer) {
                    (new AppHelper)->sendOneSignal('organizer', $organizer->device_token, $request->description);
                }
            }
        }

        if ($request->has('user_ids')) {
            foreach ($request->user_ids as $user) {
                $appUser = AppUser::find($user);
                if ($appUser) {
                    (new AppHelper)->sendOneSignal('organizer', $appUser->device_token, $request->description);
                }
            }
        }
        return redirect()->back()->withStatus(__('Notification sent successfully.'));

        $data = [
            "registration_ids" => $userId,
            "notification" => [
                "title" => $request->title,
                "description" => $request->description,
                "image" => $request->image,
            ]
        ];

        try {
            OneSignal::sendNotificationToAll(null, $url = null, $data, $buttons = null, $schedule = null);
            return redirect()->back()->withStatus(__('Notification sent successfully.'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Error: ' . $e->getMessage()]);
        }
    }
    public function deleteNotification($id)
    {
        $data = Notification::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function markAllAsRead()
    {
        $notification = Notification::where('status', 1)->get();
        if (isset($notification)) {
            DB::table('notification')->update(['status' => 0]);
            return redirect()->back();
        }
    }
}
