<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use LicenseBoxExternalAPI;
use Illuminate\Support\Facades\Redirect;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Language;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Routing\Route;

use function GuzzleHttp\Promise\all;

class LicenseController extends Controller
{
    use AuthenticatesUsers;
    public function saveEnvData(Request $request)
    {
        $data['DB_HOST'] = $request->db_host;
        $data['DB_DATABASE'] = $request->db_name;
        $data['DB_USERNAME'] = $request->db_user;
        $data['DB_PASSWORD'] = $request->db_pass;

        $envFile = app()->environmentFilePath();
        if ($envFile) {
            $str = file_get_contents($envFile);
            if (count($data) > 0) {
                foreach ($data as $envKey => $envValue) {
                    $str .= "\n"; // In case the searched variable is in the last line without \n
                    $keyPosition = strpos($str, "{$envKey}=");
                    $endOfLinePosition = strpos($str, "\n", $keyPosition);
                    $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                    // If key does not exist, add it
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
                    return response()->json(['data' => null, 'success' => true], 200);
                };
            } catch (Exception $e) {
                return response()->json(['data' => $e->getMessage(), 'success' => false], 200);
            }
        }
    }

    public function saveAdminData(Request $request)
    {
        $data = $request->all();
        try {
            $user = User::create($data);
            $user->password =  Hash::make($request->password);
            $user->assignRole('admin');
            $user->update();
            Setting::find(1)->update(['license_status' => 1, 'license_key' => $request->license_code, 'license_name' => $request->client_name]);
            return response()->json(['data' => url('login'), 'success' => true], 200);
        } catch (Exception $e) {
            return response()->json(['data' => $e->getMessage(), 'success' => false], 200);
        }
    }

    public function installer()
    {
        return view("installer");
    }

    public function adminLogin(Request $request)
    {

        $request->validate([
            'email' => 'bail|required|email',
            'password' => 'bail|required',
        ]);
        $userdata = array(
            'email' => $request->email,
            'password' => $request->password,
        );
        $remember = $request->get('remember');
        if (Auth::attempt($userdata, $remember)) {
            if (Auth::user()->hasRole('admin')) {

                // $api = new LicenseBoxExternalAPI ();
                // $res = $api->verify_license();
                // if ($res['status'] !== true) {
                //     Setting::find(1)->update(['license_status'=>0]);
                // }
                // else{
                //     Setting::find(1)->update(['license_status'=>1]);
                // }

                // $this->setLanguage(Auth::user());
                return redirect('admin/home');
            } elseif (Auth::user()->hasRole('Organizer')) {
                if (Auth::user()->status == 1) {
                    $this->setLanguage(Auth::user());
                    return redirect('organization/home');
                } else {
                    Auth::logout();
                    return Redirect::back()->with('error_msg', 'Only authorized person can login.');
                }
            } else {
                Auth::logout();
                return Redirect::back()->with('error_msg', 'Only authorized person can login.');
            }
        } else {
            return Redirect::back()->with('error_msg', 'Invalid Username or Password');
        }
    }
    public function adminLogout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('/login');
        }
    }
    public function licenseSetting()
    {
        $setting = Setting::find(1);
        return view('admin.license', compact('setting'));
    }
    public function saveLicenseSetting(Request $request)
    {

        $request->validate([
            'license_key' => 'bail|required',
            'license_name' => 'bail|required',
        ]);

        $api = new LicenseBoxExternalAPI();
        $result =  $api->activate_license($request->license_key, $request->license_name);
        if ($result['status'] === true) {
            Setting::find(1)->update(['license_status' => 1, 'license_key' => $request->license_key, 'license_name' => $request->license_name]);
            return redirect('admin/home');
        } else {
            Setting::find(1)->update(['license_status' => 0]);
            return redirect()->back()->withStatus(__($result['message']));
        }
    }
    public function setLanguage($user)
    {
        $name = $user->language;
        if (!$name) {
            $name = 'English';
        }
        App::setLocale($name);
        session()->put('locale', $name);
        $direction = Language::where('name', $name)->first()->direction;
        session()->put('direction', $direction);
        return true;
    }
}
