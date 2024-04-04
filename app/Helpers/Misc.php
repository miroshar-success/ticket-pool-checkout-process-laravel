<?php

namespace App\Helpers;

use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\Email;

class Misc
{
    public static function sendEmail($recipient, $subject, $emailBody): bool
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
            Mail::send([], [], function ($message) use ($recipient, $subject, $emailBody) {
                $senderAddress = env('MAIL_FROM_ADDRESS');
                $senderName = env('MAIL_FROM_NAME');

                $message->from($senderAddress, $senderName);
                $message->to($recipient);
                $message->subject($subject);
                $message->setBody($emailBody, 'text/html');
            });

            return true;
        } catch (\Swift_TransportException $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
            return false;
        } catch (\Exception $e) {

            Log::error('An unexpected error occurred while sending email: ' . $e->getMessage());
            return false;
        }
    }
}
