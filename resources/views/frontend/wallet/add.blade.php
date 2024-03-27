@extends('frontend.master', ['activePage' => 'home'])
@section('title', __('Add to Wallet'))
@section('content')
    {{-- Payments Keys --}}
    <input type="hidden" id="razor_key" name="razor_key" value="{{ $payment->razorPublishKey }}">
    <input type="hidden" id="walletCur" name="walletCur" value="{{ $walletCurrency }}">
    <input type="hidden" id="stripePublicKey" name="stripePublicKey" value="{{ $payment->stripePublicKey }}">
    <input type="hidden" id="flutterwave_key" name="flutterwave_key" value="{{ $payment->ravePublicKey }}">
    <input type="hidden" name="email" value="{{ auth()->guard('appuser')->user()->email }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <div class="pb-20 bg-scroll min-h-screen" style="background-image: url('{{ asset('images/events.png') }}')">
        <div class="container mx-auto mt-8">
            <div class="pt-10">
                <div class="flex justify-center gap-10">
                    <div>
                        <div class="mb-5">
                            <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('Amount') }}
                            </label>
                            <input type="number" id="amount" name="amount" min="5"
                                class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="{{ __('Enter Amount') }}" required>
                        </div>
                        <button type="button" id="paymentbtn"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('Proceed to Pay') }}</button>
                        <a href="{{ route('myWallet') }}"
                            class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:focus:ring-blue-800 font-poppins leading-6 bg-primary">
                            {{ __('Back') }}</a>
                    </div>
                    <div class="payments hidden">
                        @if ($payment->paypal == 1)
                            <div
                                class="border mb-3 border-gray-light  p-5 rounded-lg text-gray-100 w-full font-normal font-poppins text-base leading-6 flex align-middle">
                                <button id="paypalWallet">
                                    <img src="{{ asset('images/payments/paypal.svg') }}" alt=""
                                        class="object-contain">
                                </button>
                            </div>
                        @endif

                        @if ($payment->razor == 1)
                            <div
                                class="border mb-3 border-gray-light p-5 rounded-lg text-gray-100 w-full font-normal font-poppins text-base leading-6 flex">
                                <button id="razorpayWallet">
                                    <img src="{{ asset('images/payments/razorpay.svg') }}" alt=""
                                        class="object-contain">
                                </button>
                            </div>
                        @endif

                        @if ($payment->stripe == 1)
                            <div
                                class="border mb-3 border-gray-light p-5 rounded-lg text-gray-100 w-full font-normal font-poppins text-base leading-6 flex">
                                <button id="stripeWallet">
                                    <img src="{{ url('images/payments/stripe.svg') }}" alt=""
                                        class="object-contain">
                                </button>
                            </div>
                        @endif

                        @if ($payment->flutterwave == 1)
                            <div
                                class="border mb-3 border-gray-light p-5 rounded-lg text-gray-100 w-full font-normal font-poppins text-base leading-6 flex">
                                <button id="flutterwaveWallet">
                                    <img src="{{ url('images/payments/flutterwave.svg') }}" alt=""
                                        class="object-contain">
                                </button>
                            </div>
                        @endif
                        <div class="paypal-button-section  mt-4 mx-auto">
                            <div id="paypal-button-container">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('amount').addEventListener('input', function() {
            var min = 5;
            var input = this;

            if (input.value < min) {
                input.setCustomValidity('Please enter a value greater than or equal to ' + min);
            } else {
                input.setCustomValidity('');
            }
        });
    </script>
@endsection
