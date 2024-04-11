<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Verify if user is already authenticated using user session info

        // If verified, redirect to payment detail page
        // return view('frontend.checkout.paymentDetail');

        //If not verified, Move to express_checkout page
        return view('frontend.checkout.expressCheckout');
    }

    public function detail_view(Request $request)
    {
        // Validate the form data
        $request->validate([
            // Add validation rules for your form fields here
        ]);

        // Save session

        // Move to the detail page
        return view('frontend.checkout.detail');
    }

    public function additional_detail_view(Request $request)
    {
        // Validate the form data
        $request->validate([
            // Add validation rules for your form fields here
        ]);

        // Save session

        // Move to the detail page
        return view('frontend.checkout.additionalDetail');
    }

    public function register_process(Request $request)
    {
        // Validate the form data
        $request->validate([
            // Add validation rules for your form fields here
        ]);

        // Save session

        // register process

        // if register process is success, Move to payment detail page

        return view('frontend.checkout.paymentDetail');

        // if register process is fail, redirect to additional detail page
        // return view('frontend.checkout.additionalDetail');
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
