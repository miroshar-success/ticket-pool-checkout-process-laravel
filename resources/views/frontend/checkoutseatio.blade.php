@extends('frontend.master', ['activePage' => 'checkout'])
@section('title', __('Checkout'))
@section('content')
    {{-- content --}}
    <div class="event-detail-page checkout-page pb-20 bg-scroll min-h-screen" style="background-image: url('images/events.png')">
        {{-- scroll --}}
        <div id="stripe_message" class="bg-danger text-white text-center p-2 hidden"></div>
        <div class="mr-4 flex justify-end z-30">
            <a type="button" href="{{ url('#') }}"
                class="scroll-up-button bg-primary rounded-full p-4 fixed z-20  2xl:mt-[49%] xl:mt-[59%] xlg:mt-[68%] lg:mt-[75%] xxmd:mt-[83%] md:mt-[90%]
                xmd:mt-[90%] sm:mt-[117%] msm:mt-[125%] xsm:mt-[160%]">
                <img src="{{ asset('images/downarrow.png') }}" alt="" class="w-3 h-3 z-20">
            </a>
        </div>
       
        <input type="hidden" name="totalAmountTax" id="totalAmountTax" value="{{ $data->totalAmountTax }}">
        <input type="hidden" name="totalPersTax" id="totalPersTax" value="{{ $data->totalPersTax }}">
        <input type="hidden" name="flutterwave_key" value="{{ \App\Models\PaymentSetting::find(1)->ravePublicKey }}">
        <input type="hidden" name="email" value="{{ auth()->guard('appuser')->user()->email }}">
        <input type="hidden" name="phone" value="{{ auth()->guard('appuser')->user()->phone }}">
        <input type="hidden" name="name" value="{{ auth()->guard('appuser')->user()->name }}">
        <input type="hidden" name="flutterwave_key" value="{{ \App\Models\PaymentSetting::find(1)->ravePublicKey }}">
        <input type="hidden" name="seatsIoIds" id="seatsIoIds" value="{{ $data->seatsIoIds }}">
        <input type="hidden" name="selectedSeatsIo" id="selectedSeatsIo" value="{{ $data->selectedSeatsIo }}">
        <div id="ticketorder" class="content max-width-100">
            @csrf
            <input type="hidden" id="razor_key" name="razor_key"
                value="{{ \App\Models\PaymentSetting::find(1)->razorPublishKey }}">

            <input type="hidden" id="stripePublicKey" name="stripePublicKey"
                value="{{ \App\Models\PaymentSetting::find(1)->stripePublicKey }}">
            {{-- <input type="hidden" value="{{ $data->ticket_per_order }}" name="tpo" id="tpo"> --}}
            <input type="hidden" value="" name="tpo" id="tpo">
            {{-- <input type="hidden" value="{{ $data->available_qty }}" name="available" id="available"> --}}
            <input type="hidden" value="" name="available" id="available">
            {{-- <input type="hidden" name="price" id="ticket_price" value="{{ $data->price }}"> --}}
            <input type="hidden" name="price" id="ticket_price" value="">

            {{-- <input type="hidden" name="tax" id="tax_total" value="{{ $data->type == 'free' ? 0 : $data->tax_total }}"> --}}
            <input type="hidden" name="tax" id="tax_total" value="{{ $data->tax_total }}">
            <input type="hidden" name="payment" id="payment"
                value="{{ $data->price_total + $data->tax_total }}">
            @php
                $price = $data->price_total + $data->tax_total;
                if ($data->currency_code == 'USD' || $data->currency_code == 'EUR' || $data->currency_code == 'INR') {
                    $price = $price * 100;
                }
            @endphp
            <input type="hidden" name="stripe_payment" id="stripe_payment"
                value="{{ $price }}">

                
            <input type="hidden" name="currency_code" id="currency_code" value="{{ $data->currency_code }}">
            <input type="hidden" name="currency" id="currency" value="{{ $data->currency }}">
            <input type="hidden" name="payment_token" id="payment_token">
            @php 
                $ticketIdsArray = array_column($data->ticket,'id');
                $ticketIds =  implode(",",$ticketIdsArray);                
            @endphp
            <input type="hidden" name="ticket_id" id="ticket_id" value="{{ $ticketIds }}">
            <input type="hidden" name="selectedSeats" id="selectedSeats">
            <input type="hidden" name="selectedSeatsId[]" id="selectedSeatsId">
            
            <input type="hidden" name="coupon_id" id="coupon_id" value="">
            <input type="hidden" name="coupon_discount" id="coupon_discount" value="0">
            <input type="hidden" name="subtotal" id="subtotal" value="">
            <input type="hidden" name="add_ticket" value="">
            {{-- <input type="hidden" class="tax_data" id="tax_data" name="tax_data" value="{{ $data->tax }}"> --}}
            <input type="hidden" class="tax_data" id="tax_data" name="tax_data" value="">
            <input type="hidden" name="event_id" value="{{ $data->event->event_id }}">
            {{-- <input type="hidden" name="ticketname" id="ticketname" value="{{ $data->name }}"> --}}
            <input type="hidden" name="ticketname" id="ticketname" value="">
            
            <div
                class="mt-10 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
                <div
                    class="flex sm:space-x-6 msm:space-x-0 xxsm:space-x-0 xlg:flex-row lg:flex-col xmd:flex-col xxsm:flex-col">
                    <div class="xlg:w-[75%] xxmd:w-full xxsm:w-full">

                        <div
                            class="flex 3xl:flex-row 2xl:flex-nowrap 1xl:flex-nowrap xl:flex-nowrap xlg:flex-wrap flex-wrap justify-between 3xl:pt-5 xl:pt-5 gap-x-5 xl:w-full xlg:w-full">
                            <div class="w-full mr-10">
                                <div
                                    class="w-full shadow-lg p-5 rounded-lg flex 3xl:flex-nowrap md:flex-wrap xxmd:flex-nowrap sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap bg-white xlg:w-full xmd:w-full 3xl:mb-0 xl:mb-0 xlg:mb-5 xxsm:mb-5">
                                    <img src="{{ asset('images/upload/' . $data->event->image) }}" alt=""
                                        class="rounded-lg object-cover" width="230" height="230">
                                    <div class="ml-4 2xl:w-[60%] xl:w-full xlg:w-full xmd:w-full xxmd:w-[80%]">

                                        <p class="event-title font-bold text-4xl leading-8 text-left pt-3 text-black-100">
                                            {{ $data->event->name }}</p>
                                            <div class="bg-white">
                                                <p class="mt-5 section-title font-semibold text-2xl leading-8 text-black">{{ __('Date and time') }}</p>
                                                <div>
                                                    <div class="pt-2 flex space-x-3 md:flex-nowrap sm:flex-wrap xxsm:flex-wrap">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3A3247" viewBox="0 0 24 24"><path d="M17 11h2V6h-2V4h-2v2H9V4H7v2H5v13h6v-2H7v-7h10zm0 1c2.2 0 4 1.8 4 4s-1.8 4-4 4-4-1.8-4-4 1.8-4 4-4m-.6 5.9 2.9-2.9-.9-.9-2.1 2.1-.7-.8-.8.8z" clip-rule="evenodd"></path></svg>
                                                        <div class="flex space-x-2 pl-3">
                                                            <p class="datetime">
                                                                {{ Carbon\Carbon::parse($data->event->start_time)->format('d') }}
                                                            </p>
                                                            <p class="datetime">
                                                                {{ Carbon\Carbon::parse($data->event->start_time)->format('M y') }}</p>
                                                        </div>
                                                        <p class="datetime">-</p>
                                                        <div class="flex space-x-2">
                                                            <p class="datetime">
                                                                {{ Carbon\Carbon::parse($data->event->end_time)->format('d') }}
                                                            </p>
                                                            <p class="datetime">
                                                                {{ Carbon\Carbon::parse($data->event->end_time)->format('M y') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-5 bg-white location-section">
                                                <p class="section-title font-semibold text-2xl leading-8 text-black">{{ __('Location') }}</p>
                                                <div>
                                                    <div class="pt-2 flex space-x-6 md:flex-nowrap sm:flex-wrap xxsm:flex-wrap">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3A3247" viewBox="0 0 24 24"><path d="M12.067 4C8.934 4 6.4 6.504 6.4 9.6c0 4.2 5.667 10.4 5.667 10.4s5.667-6.2 5.667-10.4c0-3.096-2.534-5.6-5.667-5.6m0 7.6c-1.117 0-2.024-.896-2.024-2s.907-2 2.024-2 2.024.896 2.024 2-.907 2-2.024 2" clip-rule="evenodd"></path></svg>
                                                        <div class="">
                                                            <p class="datetime">
                                                                @if ($data->event->type == 'online')
                                                                    {{ __('Online Event') }}
                                                                @else
                                                                    {{ $data->event->address }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        {{-- @if ($data->allday == 0)
                                            <div>
                                                <input type="date" name="ticket_date" id="onetime"
                                                    data-date="{{ $data->event->end_time }}" placeholder="mm/dd/yy"
                                                    class="mt-3 border p-2 border-gray-light">
                                                @if ($errors->has('ticket_date'))
                                                    <div class="text-danger">{{ $errors->first('ticket_date') }}</div>
                                                @endif
                                                <div class="ticket_date text-danger"></div>
                                            </div>
                                        @endif --}}
                                    </div>
                                </div>
                                <div
                                    class="w-full shadow-lg p-5 rounded-lg flex 3xl:flex-nowrap md:flex-wrap xxmd:flex-nowrap sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap bg-white xlg:w-full xmd:w-full 3xl:mb-0 xl:mb-0 xlg:mb-5 xxsm:mb-5">
                                    <div class="md:w-[100%] sm:w-full">
                                            <div class="ticket-price">
                                                <p class="font-semibold text-3xl leading-7 text-primary text-left pt-5">{{ $data->currency }}<span style="margin-left: -6px">{{$data->price_total}}</span></p>
                                            </div>
                                            <p class="font-medium text-base leading-7 text-black text-left pt-10">
                                                {{ __('Quantity') }}</p>
                                            <input type="hidden" id="quantity" name="quantity"
                                                value="{{$data->totalTickets}}">
                                            <div class="bg-transparent mt-1">
                                                @foreach($data->ticket as $ticket)
                                                    <p class="datetime"> {{$ticket->selectedseatsCount}} * {{$ticket->name}} </p>
                                                @endforeach
                                            </div>

                                    </div>
                                </div>
                                {{-- @if ($data->available_qty > 0) --}}
                                    <div
                                        class="w-full shadow-lg p-5 rounded-lg  bg-white xlg:w-full xmd:w-full 3xl:mb-0 xl:mb-0 xlg:mb-5 xxsm:mb-5 mt-5">
                                        <p class="section-title font-semibold text-2xl leading-8 text-black pb-3 pt-10">
                                            {{ __('Payment Methods') }}</p>

                                        <div
                                            class="flex md:space-x-5 md:flex-row md:space-y-0 sm:flex-col sm:space-x-0 sm:space-y-5 xxsm:flex-col xxsm:space-x-0 xxsm:space-y-5 mb-5 payments">
                                            <?php $setting = App\Models\PaymentSetting::find(1); ?>
                                            {{-- @if ($data->type == 'free')
                                                <div
                                                    class="border border-gray-light  p-5 rounded-lg text-gray-100 w-full font-normal text-base leading-6 flex">
                                                    {{ __('FREE') }}
                                                    <input id="default-radio-1" required type="radio" value="FREE"
                                                        name="payment_type" 
                                                        class="ml-2 h-5 w-5 mr-2 border border-gray-light  hover:border-gray-light focus:outline-none">
                                                </div>
                                            @else --}}
                                                @if ($setting->paypal == 1)
                                                    <div
                                                        class="border border-gray-light  p-5 rounded-lg text-gray-100 w-full font-normal text-base leading-6 flex align-middle">
                                                        <input id="Paypal" required type="radio" value="PAYPAL"
                                                            name="payment_type"
                                                            class="h-5 w-5 mr-2 border border-gray-light  hover:border-gray-light focus:outline-none">
                                                        <label for="Paypal"><img
                                                                src="{{ asset('images/payments/paypal.svg') }}"
                                                                alt="" class="object-contain"></label>
                                                    </div>
                                                @endif

                                                @if ($setting->razor == 1)
                                                    <div
                                                        class="border border-gray-light p-5 rounded-lg text-gray-100 w-full font-normal text-base leading-6 flex items-center">
                                                        <input id="Razor" required type="radio" value="RAZOR"
                                                            name="payment_type"
                                                            class="h-5 w-5 mr-2 border border-gray-light  hover:border-gray-light focus:outline-none">
                                                        <label for="Razor"><img
                                                                src="{{ asset('images/payments/razorpay.svg') }}"
                                                                alt="" class="object-contain"></label>
                                                    </div>
                                                @endif

                                                @if ($setting->stripe == 1)
                                                    <div
                                                        class="border border-gray-light p-5 rounded-lg text-gray-100 w-full font-normal text-base leading-6 flex items-center">
                                                        <input id="Stripe" required type="radio" value="STRIPE"
                                                            name="payment_type"
                                                            class="h-5 w-5 mr-2 border border-gray-light  hover:border-gray-light focus:outline-none">
                                                        <label for="Stripe"><img
                                                                src="{{ url('images/payments/stripe.svg') }}"
                                                                alt="" class="object-contain"></label>
                                                    </div>
                                                @endif

                                                @if ($setting->flutterwave == 1)
                                                    <div
                                                        class="border border-gray-light p-5 rounded-lg text-gray-100 w-full font-normal text-base leading-6 flex">
                                                        <input id="Flutterwave" required type="radio"
                                                            value="FLUTTERWAVE" name="payment_type"
                                                            class="h-5 w-5 mr-2 border border-gray-light  hover:border-gray-light focus:outline-none">
                                                        <label for="Flutterwave"><img
                                                                src="{{ url('images/payments/flutterwave.svg') }}"
                                                                alt="" class="object-contain"></label>
                                                    </div>
                                                @endif

                                                @if (
                                                    $setting->cod == 1 ||
                                                        ($setting->flutterwave == 0 && $setting->stripe == 0 && $setting->paypal == 0 && $setting->razor == 0))
                                                    <div
                                                        class="items-center border border-gray-light p-5 rounded-lg text-gray-100 w-full font-normal text-base leading-6 flex">
                                                        <input id="Cash" type="radio" value="LOCAL"
                                                            name="payment_type"
                                                            class="h-5 w-5 mr-3 border border-gray-light  hover:border-gray-light focus:outline-none">
                                                        <label for="Cash"><img
                                                                src="{{ url('images/payments/cash.svg') }}"
                                                                alt="" class="object-contain"></label>
                                                    </div>
                                                @endif
                                                @if ($setting->wallet == 1)
                                                    <div
                                                        class="border border-gray-light p-5 rounded-lg text-gray-100 w-full font-normal text-base leading-6 flex">
                                                        <input id="wallet" type="radio" value="wallet"
                                                            name="payment_type"
                                                            class="h-5 w-5 mr-2 border border-gray-light  hover:border-gray-light focus:outline-none">
                                                        <label for="wallet"><img
                                                                src="{{ url('images/payments/wallet.svg') }}"
                                                                alt="" class="object-contain"></label>
                                                    </div>
                                                @endif

                                            {{-- @endif --}}
                                        </div>
                                        <div class="paypal-button-section  mt-4 mx-auto">
                                            <div id="paypal-button-container" class="hidden">

                                            </div>
                                        </div>
                                        <!-- <div class="stripe-form-section hidden mt-4  mx-auto"> -->
                                        <div class="card stripeCard hidden" id="stripeform">
                                            <div class="bg-danger text-white hidden stripe_alert rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full"
                                                role="alert">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="times-circle" class="w-4 h-4 mr-2 fill-current"
                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512">
                                                    <path fill="currentColor"
                                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z">
                                                    </path>
                                                </svg>
                                                <div class="stripeText"></div>
                                            </div>
                                            <div class="card-body">
                                                <form method="post"
                                                    class="require-validation customform xxxl:w-[680px] s:w-[225px] m:w-[300px] l:w-[400px] sm:w-[320px] md:w-[450px] lg:w-[300px] xl:w-[540px] xxl:w-[550px]"
                                                    data-cc-on-file="false" id="stripe-payment-form">
                                                    @csrf
                                                    <div>
                                                        <div class="mb-3">
                                                            <div class="form-group">
                                                                <label for="email"
                                                                    class="font-medium text-black text-base tracking-wide">{{ __('Email') }}</label>
                                                                <input type="email" name="card_email"
                                                                    title="Enter Your Email" placeholder="Email"
                                                                    class="email form-control required border border-gray-light focus:outline-none rounded-lg p-3 w-full mt-3" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="form-group">
                                                                <label for="card-number"
                                                                    class="font-medium text-black text-base tracking-wide">{{ __('Card Information') }}</label>
                                                                <div class="form-group">
                                                                    <div id="card-number"></div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div id="card-expiry"></div>
                                                                </div>
                                                                <input type="hidden"
                                                                    class="card-expiry-month required form-control"
                                                                    name="card-expiry-month" />
                                                                <input type="hidden"
                                                                    class="card-expiry-year required form-control"
                                                                    name="card-expiry-year" />
                                                                <div class="form-group">
                                                                    <div id="card-cvc"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <label
                                                                    class="font-medium text-black text-base tracking-wide ">{{ __('Name on card') }}</label>
                                                                <input type="text"
                                                                    class="required form-control border border-gray-light focus:outline-none rounded-lg p-3 w-full mt-3"
                                                                    name="card_name" placeholder="Name"
                                                                    title="Name on Card" required />
                                                            </div>
                                                        </div>
                                                        <div class="form-group text-start">
                                                            <button type="submit"
                                                                class="bg-primary l:w-[250px] h-[47px] s:w-full px-5 p-2 rounded-md cursor-pointer font-medium text-white text-lg mt-4 btn-submit">{{ __('Pay with stripe') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- </div> -->
                                        <div class="mt-3">
                                            <button type="submit" id="form_submit"
                                                class="font-medium text-lg leading-6 text-white bg-primary w-full rounded-md py-3"
                                                <?php
                                        if(!isset($_REQUEST['payment_type'])&&$setting->cod == 0 && $setting->wallet ==0 ){ ?> disabled <?php
                                        } ?>>
                                                <div id="formtext">
                                                    <!-- <i class="fa pr-2 fa-check-square"></i> -->
                                                    {{ __('Place Order') }}
                                                </div>
                                                <div id="formloader"
                                                    class="hidden mx-auto animate-spin rounded-full border-t-2 border-blue-500 border-solid h-7 w-7">
                                                </div>
                                            </button>

                                        </div>
                                    </div>
                                {{-- @endif --}}
                                
                            </div>
                        </div>
                    </div>
                    {{-- @if (isset($data->type) && $data->type == 'paid') --}}

                        <div class="xlg:w-[25%] xxmd:w-full xxsm:w-full">
                            <div class="p-4 bg-white shadow-lg rounded-md space-y-5">
                                <p class="section-title font-semibold text-2xl leading-8 text-black pb-0">
                                    {{ __('Payment Summary') }}</p>
                                <div
                                    class="flex justify-between border border-primary rounded-md py-5 xxsm:flex-wrap sm:flex-nowrap xlg:px-0">
                                    <input type="text" value="" name="coupon_code" id="coupon_id"
                                        class="focus:outline-none font-normal text-base leading-6 text-white-100 ml-5 1xl:w-44 xl:w-36
                            xlg:w-28"
                                        placeholder="{{ __('Coupon Code') }}">
                                    <button type="button" id="apply" name="apply"
                                        class="font-medium text-base leading-6 text-primary focus:outline-none mr-5">{{ __('Apply') }}</button>
                                </div>
                                <div class="couponerror"></div>
                                <p class="font-semibold text-base leading-8 text-black ">
                                    {{ __('Taxes and Charges') }}</p>
                                @foreach($data->ticket as $ticket)
                                    @if (count($ticket->tax) > 0)
                                        <div class="taxes  border border-primary rounded-md p-2">

                                            @foreach ($ticket->tax as $key => $item)
                                                <input type="hidden" class="amount_type" name="amount_type"
                                                    value="{{ $item->amount_type }}">
                                                <div class="flex justify-between">
                                                    <p class="font-normal text-lg leading-7 text-gray-200 ">
                                                        {{ $item->name }}
                                                        @if ($item->amount_type == 'percentage')
                                                            ({{ $item->price . '%' }})
                                                        @endif
                                                    </p>
                                                    <p class="font-medium text-lg leading-7 text-gray-300">
                                                        @if ($item->amount_type == 'percentage')
                                                            @php
                                                                $result = ($ticket->price * $item->price) / 100;
                                                                $formattedResult = round($result, 2);
                                                            @endphp
                                                            {{ $currency }} {{ $formattedResult }}
                                                        @else
                                                            {{ $currency }} {{ $item->price }}
                                                        @endif
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                                <div class="flex justify-between">
                                    <p class="font-normal text-lg leading-7 text-gray-200">
                                        {{ __('Total Tax amount') }}</p>
                                    <p class="font-medium text-lg leading-7 text-gray-300 totaltax">
                                        {{ $currency }} {{ $data->tax_total }}
                                    </p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="font-normal text-lg leading-7 text-gray-200">
                                        {{ __('Tickets amount') }}</p>
                                    <p class="font-medium text-lg leading-7 text-gray-300">
                                        {{-- @if ($data->seatmap_id == null) --}}
                                        {{ $currency }} {{ $data->price_total }}
                                        {{-- @endif --}}
                                    </p>
                                </div>

                                <div class="flex justify-between border-dashed border-b border-gray-light pb-5">
                                    <p class="font-normal text-lg leading-7 text-gray-200">
                                        {{ __('Coupon discount') }}</p>
                                    <p class="font-medium text-lg leading-7 text-gray-300 discount">00.00</p>
                                </div>
                                <div class="flex justify-between">
                                    <p
                                        class="font-semibold text-xl leading-7 text-primary xlg:text-lg 1xl:text-xl">
                                        {{ __('Total amount') }}</p>
                                    <p
                                        class="font-semibold text-2xl leading-7 text-primary xlg:text-lg 1xl:text-2xl subtotal">
                                        {{-- @if ($data->seatmap_id == null || $data->module->is_enable == 0) --}}
                                            {{ $currency }} {{ $data->price_total + $data->tax_total }}
                                        {{-- @endif --}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    {{-- @endif --}}
                </div>

            </div>
        </div>
    </div>
@endsection
