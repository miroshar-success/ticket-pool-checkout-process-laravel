<?php

namespace App\Http\Controllers;


use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;
use Illuminate\Support\Facades\Route;

class CheckoutController extends Controller
{
    public function index()
    {
        // Verify if user is already authenticated
        $user = Auth::user();

        if (Auth::guard('appuser')->check()) {
            return view('frontend.checkout.paymentDetail');
        } else {
            return view('frontend.checkout.expressCheckout');
        }
    }

    public function detail_view(Request $request)
    {
        if (Auth::guard('appuser')->check()) {
            return view('frontend.checkout.paymentDetail');
        }
        // Validate the form data
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        if (!$validatedData) {
            return redirect()->back()->withErrors('Validation failed. Please check your input.')->withInput();
        }

        $email = $request->input('email');

        $user = AppUser::where('email', $email)->first();

        if ($user) {
            // Email already exists, redirect to signin page
            return redirect()->route('login');
        } else {
            $request->session()->put('email', $email);
            // Email is new, move to detail page
            return view('frontend.checkout.detail');
        }
    }

    public function additional_detail_view(Request $request)
    {
        if (Auth::guard('appuser')->check()) {
            return view('frontend.checkout.paymentDetail');
        }

        $phone = Country::get();

        return view('frontend.checkout.additionalDetail', compact('phone'));
    }


    public function payment_detail_view(Request $request)
    {
        if (Auth::guard('appuser')->check()) {
            return view('frontend.checkout.paymentDetail');
        }
        return redirect()->route('login');
    }

    public function detail_post(Request $request)
    {
        // Validate the form data
        $validatedData  = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'gender'    => ['required', Rule::in(['male', 'female', 'other'])],
            'birthday'  => 'required|date',
            'postcode'  => 'required|string|max:10',
            'password'  => 'required|string|min:8',
            'tos'       => 'required|array',
        ]);

        if (!$validatedData) {
            return redirect()->back()->withErrors('Validation failed. Please check your input.')->withInput();
        }

        // Hash the password
        $hashedPassword = Hash::make($request->input('password'));

        // Save to session
        $request->session()->put('user_details', [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'gender' => $request->input('gender'),
            'birthday' => $request->input('birthday'),
            'postcode' => $request->input('postcode'),
            'password' => $hashedPassword, // Save the hashed password
            'tos' => $request->input('tos'),
        ]);

        // Move to the detail page
        return redirect()->route('additional_detail_view');
    }

    public function register_process(Request $request)
    {
        // Validate the form data
        $validatedData  = $request->validate([
            'country'       => 'required|string|max:255',
            'city'          => 'required|string|max:255',
            'contactNumber' => ['required', 'regex:/^\+(?:[0-9] ?){6,14}[0-9]$/'],
            'howtoknow'     => 'required|string|max:255',
        ]);

        if (!$validatedData) {
            return redirect()->back()->withErrors('Validation failed. Please check your input.')->withInput();
        }

        // merge to session user_details and save
        $userDetails = $request->session()->get('user_details', []);
        $userDetails = array_merge($userDetails, $validatedData);
        $request->session()->put('user_details', $userDetails);

        // register process
        $userDetails = $request->session()->get('user_details', []);
        $response = Route::dispatch(
            Request::create('/user/register', 'POST', [
                'first_name'    => $userDetails['firstname'],
                'last_name'     => $userDetails['lastname'],
                'email'         => $request->session()->get('email'),
                'password'      => $userDetails['password'],
                'phone'         => $userDetails['contactNumber'],
                'Countrycode'   => '0',
                'Country'       => $userDetails['country'],
                'Gender'        => $userDetails['gender'],
                'DateOfBirth'   => $userDetails['birthday'],
                'city'          => $userDetails['city'],
                'checkout_process' => 1,
            ])
        );

        $jsonResponse = json_decode($response->content(), true);
        // Use the response data
        if ($response->getStatusCode() === 200) {
            return redirect()->route('payment_detail_view');
        } else {
            $errorMessage = $jsonResponse['error']['message'];
            return redirect()->back()->withErrors($errorMessage)->withInput();
        }
    }

    public function checkout_process(Request $request)
    {
        // Validate the form data
        $request->validate([
            // Add validation rules for your form fields here
        ]);

        // user session info

        // payment process with API

        // Move to homepage
        return redirect()->route('home');
    }
}
