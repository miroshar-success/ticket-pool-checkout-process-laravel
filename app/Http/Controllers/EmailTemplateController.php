<?php

namespace App\Http\Controllers;

use App\Helpers\Misc;
use App\Models\AppUser;
use App\Models\Category;
use App\Models\Email;
use App\Models\Event;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class EmailTemplateController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('email_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('Organizer')) {
            $timezone = Setting::find(1)->timezone;
            $date = Carbon::now($timezone);
            $emails  = Email::with(['toUser:id,name,last_name']);
            $chip = array();
            if ($request->has('title') && $request->type != null) {
                $chip['title'] = $request->type;
                $emails = $emails->where('title', $request->type);
            }
            if ($request->has('subject') && $request->type != null) {
                $chip['subject'] = $request->type;
                $emails = $emails->where('subject', $request->subject);
            }
            if ($request->has('to_user') && $request->category != null) {
                $chip['to_user'] = AppUser::find($request->user_id)->name;
                $emails = $emails->where('to_user', $request->to_user);
            }
            $emails = $emails->orderBy('created_at', 'ASC')->get();
        } else {
            $emails = Email::orderBy('start_time', 'ASC')->get();
            foreach ($emails as $value) {
                $value->scanner = User::find($value->scanner_id);
            }
        }
        $events = $emails;
        return view('admin.email.index', compact('events'));
    }


    public function create()
    {
        abort_if(Gate::denies('email_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $appUsers = AppUser::orderBy('id', 'DESC')->get();
        return view('admin.email.create', compact('appUsers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required',
            'subject' => 'bail|required',
            'to_user' => 'required|array',
            'description' => 'bail|required',
        ]);

        $data = $request->all();
        $data['to_user'] = implode(',',$request['to_user']);
        $toUsers = $request['to_user'];
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('Organizer')) {
            $data['by_user'] = Auth::user()->id;
        }
        $email = Email::create($data);
        $this->sendEmailToRecipients($email, $data['subject'], $data['description'], $request['to_user']);


        return redirect()->route('email.index')->withStatus(__('Emails have been sent successfully.'));
    }

    public function show($event)
    {
        $event = Event::with(['category', 'organization'])->find($event);
        $event->ticket = Ticket::where([['event_id', $event->id], ['is_deleted', 0]])->orderBy('id', 'DESC')->get();
        (new AppHelper)->eventStatusChange();
        $event->sales = Order::with(['customer:id,name', 'ticket:id,name'])->where('event_id', $event->id)->orderBy('id', 'DESC')->get();
        foreach ($event->ticket as $value) {
            $value->used_ticket = Order::where('ticket_id', $value->id)->sum('quantity');
        }
        return view('admin.email.view', compact('event'));
    }

    public function edit(Email $email)
    {
        abort_if(Gate::denies('email_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $email = Email::findOrFail($email->id);
        $toUserArray = explode(',', $email->to_user);

        $appUsers = AppUser::all();
        return view('admin.email.edit', compact('email', 'appUsers','toUserArray'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'to_user' => 'required|array',
            'description' => 'nullable|string',
        ]);

        // Convert the 'to_user' array to a comma-separated string
        $toUser = implode(',', $validatedData['to_user']);

        // Find the email by its ID
        $email = Email::findOrFail($id);

        // Update the email data
        $email->title = $validatedData['title'];
        $email->subject = $validatedData['subject'];
        $email->to_user = $toUser;
        $email->description = $validatedData['description'];

        // Save the updated email
        $email->save();

        // Redirect back to the email edit page with a success message
        return redirect()->route('email.index', $email->id)->withStatus('Email updated successfully');
    }

    public function destroy(Event $event)
    {
        try {
            Event::find($event->id)->update(['is_deleted' => 1, 'event_status' => 'Deleted']);
            $ticket = Ticket::where('event_id', $event->id)->update(['is_deleted' => 1]);
            return true;
        } catch (Throwable $th) {
            return response('Data is Connected with other Data', 400);
        }
    }


    public function testEmail(): bool
    {
            $setting = Setting::find(1);
            try {
                $config = array(
                    'driver'     => $setting->mail_mailer,
                    'host'       => $setting->mail_host,
                    'port'       => $setting->mail_port,
                    'encryption' => $setting->mail_encryption,
                    'username'   => $setting->mail_username,
                    'password'   => $setting->mail_password
                );


            if (in_array(null, $config, true)) {
                Log::error('Mail configuration is incomplete');
                return false;
            }
                Config::set('mail', $config);

                Mail::send([], [], function ($message) {
                    $emailBody = 'Body of Email';
                    $subject = 'Test Email';
                    $recipient = 'faisal.bluehorntech@gmail.com';
                    $senderAddress = env('MAIL_FROM_ADDRESS');
                    $senderName = env('MAIL_FROM_NAME');

                    $message->from($senderAddress, $senderName);
                    $message->to($recipient);
                    $message->subject($subject);
                    $message->setBody($emailBody);
                });


                dd(123);

        } catch (\Swift_TransportException $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
            dd($e);
        } catch (\Exception $e) {
            Log::error('An unexpected error occurred while sending email: ' . $e->getMessage());
            dd($e);
        }
    }

    public function resendEmail($id): RedirectResponse
    {
       $email = Email::findOrFail($id);
       $toUsers = explode(',', $email->to_user);

       // Resend email to each recipient
       $this->sendEmailToRecipients($email, $email->subject, $email->description, $toUsers);

       return redirect()->route('email.edit', $id)->with('success', 'Email resent successfully');
   }
    private function sendEmailToRecipients($email, $subject, $emailBody, $recipientIds): void
    {
        foreach ($recipientIds as $recipientId) {
            $recipientUser = AppUser::find($recipientId);
            if ($recipientUser) {
                $recipient = $recipientUser->email;
                if (Misc::sendEmail($recipient, $subject, $emailBody)) {
                    Log::error('Failed to send email to ' . $recipient);
                }
            } else {
                Log::error('Recipient with ID ' . $recipientId . ' not found.');
            }
        }
    }
}
