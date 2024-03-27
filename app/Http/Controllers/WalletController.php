<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use App\Models\PaymentSetting;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;


class WalletController extends Controller
{
    public function __construct()
    {
        $wallet = PaymentSetting::first()->wallet;
        if ($wallet == 0) {
            return redirect()->back();
        }
    }
    public function wallet()
    {
        $wallet = PaymentSetting::first()->wallet;
        if ($wallet == 0) {
            return redirect()->back();
        }
        $user = Auth::guard('appuser')->user();
        $user = AppUser::find($user->id);
        $transactions = $user->transactions()->latest()->get();
        $balance = $user->balance;
        return view('frontend.wallet.index', compact('transactions', 'balance'));
    }
    public function addToWallet()
    {
        $wallet = PaymentSetting::first()->wallet;
        if ($wallet == 0) {
            return redirect()->back();
        }
        $payment = PaymentSetting::first();
        $walletCurrency = Setting::first()->currency;
        return view('frontend.wallet.add', compact('payment', 'walletCurrency'));
    }
    public function deposite(Request $request)
    {
        $user = Auth::guard('appuser')->user();
        $user = AppUser::find($user->id);
        $user->deposit($request->amount, ['payment_mode' => $request->payment_type, 'currency' => $request->currency, 'token' => $request->token]);
        return response()->json(['success' => true]);
    }
    public function checkoutSession(Request $request)
    {
        $request->session()->put('walletDetails', $request->all());
        $key = PaymentSetting::first()->stripeSecretKey;
        Stripe::setApiKey($key);
        $supportedCurrency = [
            "EUR",   # Euro
            "GBP",   # British Pound Sterling
            "CAD",   # Canadian Dollar
            "AUD",   # Australian Dollar
            "JPY",   # Japanese Yen
            "CHF",   # Swiss Franc
            "NZD",   # New Zealand Dollar
            "HKD",   # Hong Kong Dollar
            "SGD",   # Singapore Dollar
            "SEK",   # Swedish Krona
            "DKK",   # Danish Krone
            "PLN",   # Polish Złoty
            "NOK",   # Norwegian Krone
            "CZK",   # Czech Koruna
            "HUF",   # Hungarian Forint
            "ILS",   # Israeli New Shekel
            "MXN",   # Mexican Peso
            "BRL",   # Brazilian Real
            "MYR",   # Malaysian Ringgit
            "PHP",   # Philippine Peso
            "TWD",   # New Taiwan Dollar
            "THB",   # Thai Baht
            "TRY",   # Turkish Lira
            "RUB",   # Russian Ruble
            "INR",   # Indian Rupee
            "ZAR",   # South African Rand
            "AED",   # United Arab Emirates Dirham
            "SAR",   # Saudi Riyal
            "KRW",   # South Korean Won
            "CNY"    # Chinese Yuan
        ];
        $amount = $request->amount;
        if (!in_array($request->currency, $supportedCurrency)) {
            $amount = $amount * 100;
        }
        $currencyCode = Setting::first()->currency;
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => $currencyCode,
                        'product_data' => [
                            'name' => "Payment"
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('walletStripe.success'),
            'cancel_url' => route('walletStripe.cancel'),
        ]);
        return response()->json(['id' => $session->id, 'status' => 200]);
    }
    public function stripeSuccess()
    {
        $request = Session::get('walletDetails');
        $user = Auth::guard('appuser')->user();
        $user = AppUser::find($user->id);
        $user->deposit($request['amount'], ['payment_mode' => 'STRIPE', 'currency' => $request['currency']]);
        Session::forget('walletDetails');
        return redirect()->route('myWallet');
    }
    public function striepCancel()
    {
        return redirect()->back();
    }
    // Admin  

    public function allTransactions()
    {
        $transactions = Transaction::with(['wallet.user'])->orderBy('id', 'desc')->get();
        return view('admin.wallet.index', compact('transactions'));
    }
}
