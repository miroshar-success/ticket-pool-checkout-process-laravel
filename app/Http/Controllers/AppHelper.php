<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class AppHelper extends Controller

{
    public function deleteFile($fileName)
    {
        if ($fileName != "default.jpg") {
            $filePath = "images/upload/" . $fileName;
            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    return true;
                } else {
                   return false;
                }
            } else {
                return false;
            }
            
        }
    }
    public function saveImage($request)
    {
        $image = $request->file('image');
        $name = uniqid() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images/upload');
        $image->move($destinationPath, $name);
        return $name;
    }

    public function saveApiImage($request)
    {
        $img = $request->image;
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $img_code = base64_decode($img);
        $Iname = uniqid();
        $file = public_path('/images/upload/') . $Iname . ".png";
        $success = file_put_contents($file, $img_code);
        $image_name = $Iname . ".png";
        return $image_name;
    }

    public function saveEnv($envData)
    {
        $envFile = app()->environmentFilePath();
        if ($envFile) {
            $str = file_get_contents($envFile);
            if (count($envData) > 0) {
                foreach ($envData as $envKey => $envValue) {
                    $keyPosition = strpos($str, "{$envKey}=");
                    $endOfLinePosition = strpos($str, "\n", $keyPosition);
                    $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                    if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                        $str .= "{$envKey}={$envValue}\n";
                    } else {
                        $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                    }
                }
            }
            $str = substr($str, 0, -1);
            try {
                if (file_put_contents($envFile, $str)) {
                    return true;
                }
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return redirect()->route('admin-setting')->with('Exception', $e->getMessage());

                return $e;
            }
        }
    }

    public function mailConfig()
    {
        $setting = Setting::first();
        if ($setting->mail_notification) {
            Config::set('mail.default', $setting->mail_mailer);
            Config::set('mail.mailers.smtp.host', $setting->mail_host);
            Config::set('mail.mailers.smtp.port', $setting->mail_port);
            Config::set('mail.mailers.smtp.username', $setting->mail_username);
            Config::set('mail.mailers.smtp.password', $setting->mail_password);
            Config::set('mail.mailers.smtp.encryption', $setting->mail_encryption);
            Config::set('mail.from',  ['address' => $setting->sender_email, 'name' => $setting->app_name]);
        }
        return true;
    }

    public function sendOneSignal($for, $device_token, $message)
    {
        $setting = Setting::first();
        if ($for == 'organizer')
            $app_id = $setting->or_onesignal_app_id;
        else
            $app_id = $setting->onesignal_app_id;

        try {
            $content1 = array("en" => $message);
            $fields1 = array(
                'app_id' => $app_id,
                'include_player_ids' => array($device_token),
                'data' => null,
                'contents' => $content1
            );
            $fields1 = json_encode($fields1);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $response = curl_exec($ch);
            curl_close($ch);
        } catch (\Throwable $th) {
        }
        return true;
    }

    public function eventStatusChange()
    {
        Order::with('event')->whereOrderStatus('Pending')->whereHas('event', function ($q) {
            $date = Carbon::now()->format('Y-m-d h:i');
            $date = $date . '.00';
            $q->where('end_time', '<=', $date);
        })->get()->each->update(['order_status' => 'Complete']);
        return true;
    }
}
