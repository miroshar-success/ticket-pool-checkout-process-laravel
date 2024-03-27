@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Book Ticket'),
    ])
    <div class="section-body">


        <div class="row">
            <div class="col-12">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <div class="row mb-4 mt-2">
                        <div class="col-lg-8"><h2 class="section-title mt-0"> {{__('View Event')}}</h2></div>

                    </div>
                    <div class="container">

                        <input type="hidden" id="razor_key" name="razor_key" value="{{ \App\Models\PaymentSetting::find(1)->razorPublishKey }}">

                        <input type="hidden" id="stripePublicKey" name="stripePublicKey" value="{{ \App\Models\PaymentSetting::find(1)->stripePublicKey }}">

                        <form action="{{ url('organizerCreateOrder') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-lg-7">
                                    <div class="card">
                                        <div class="card-body single-ticket">
                                            <h5 class="mb-4">{{ __('Additional info and quantity') }}</h5>
                                            <div class="quantity-section text-center mb-4">
                                                <p class="mb-1">{{ __('Quantity') }}</p>
                                                <input type="hidden" value="{{ $data->ticket_per_order }}" name="tpo" id="tpo">
                                                <input type="hidden" value="{{ $data->available_qty }}" name="available" id="available">
                                                <div class="quantity">
                                                    <div class="pro-qty mt-3">
                                                        <span class="dec qtybtn" id="dec-{{ $data->id }}">-</span>
                                                        <input type="number" readonly name="quantity" value="1">
                                                        <span class="inc qtybtn" id="inc-{{ $data->id }}">+</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <article class="ticket mb-4">
                                                <header class="ticket__wrapper">
                                                    <div class="ticket__header">
                                                        <span>{{ $data->ticket_number }}</span>
                                                    </div>
                                                </header>

                                                <div class="ticket__divider">
                                                    <div class="ticket__notch"></div>
                                                    <div class="ticket__notch ticket__notch--right"></div>
                                                </div>

                                                <div class="ticket__body">
                                                    <section class="ticket__section">
                                                        <h3>{{ $data->name }}</h3>
                                                        <p>{{ $data->description }}</p>
                                                    </section>

                                                    <section class="ticket__section">
                                                        @if ($data->type == 'free')
                                                            <h2>{{ __('Free') }}</h2>
                                                        @else
                                                            <h3>{{ $currency . $data->price }}</h3>
                                                        @endif
                                                    </section>

                                                    <section class="ticket__section">
                                                        <h3>{{ __('Sales') }}</h3>
                                                        <p class="mb-0"><span>{{ __('Start') }} :
                                                            </span>{{ $data->start_time->format('Y-m-d h:i a') }}</p>
                                                        <p class="mb-0"><span>{{ __('end') }} :
                                                            </span>{{ $data->end_time->format('Y-m-d h:i a') }}</p>
                                                        <p><span>{{ __('Quantity') }} :
                                                            </span>{{ $data->available_qty . ' pcs left' }}
                                                        </p>
                                                    </section>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <label for="user">Choose User:</label>
                                    <select name="user" id="user" class="js-states form-control select2">

                                        @foreach ($data->user as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <input type="hidden" name="price" id="ticket_price" value="{{ $data->price }}">
                                <input type="hidden" name="tax" id="tax_total" value="{{ $data->type == 'free' ? 0 : $data->tax_total }}">
                                @php
                                    $price = $data->price + $data->tax_total;
                                    if($data->currency_code == 'USD' || $data->currency_code == 'EUR' || $data->currency_code == 'INR')
                                        $price = $price * 100;
                                @endphp
                                <input type="hidden" name="payment" id="payment" value="{{ $data->type == 'free' ? 0 : $data->price + $data->tax_total }}">
                                <input type="hidden" name="stripe_payment" id="stripe_payment" value="{{ $data->type == 'free' ? 0 : $price }}">
                                <input type="hidden" name="currency_code" id="currency_code" value="{{ $data->currency_code }}">
                                <input type="hidden" name="payment_token" id="payment_token">
                                <input type="hidden" name="ticket_id" id="ticket_id" value="{{ $data->id }}">
                                <input type="hidden" name="coupon_id" id="coupon_id" value="">
                                <div class="col-lg-5">
                                    <div class="card checkout-right mb-4">
                                        <img src="{{ url('images/upload/' . $data->event->image) }}">
                                        <div class="card-body">
                                            <div class="event-top text-center">
                                                <h5>{{ $data->event->name }}</h5>
                                                @if ($data->event->type == 'online')
                                                    <p>{{ __('Online Event') }}</p>
                                                @else
                                                    <p>{{ $data->event->address }}</p>
                                                @endif
                                            </div>

                                            <div class="event-middle">
                                                <div class="middle">
                                                    <p><span>{{ $data->name }}</span> </p>
                                                    <p>
                                                        @if ($data->type == 'free')
                                                            <span>{{ __('FREE') }}</span>
                                                        @else
                                                            <span class="qty">1</span>
                                                            <span class="px-2"> X </span>
                                                            <span class="price">{{ $data->price }}</span>
                                                        @endif
                                                    </p>
                                                </div>

                                                @if ($data->type == 'paid')
                                                    <input type="hidden" class="tax_data" name="tax_data" value="{{ $data->tax }}">
                                                    @foreach ($data->tax as $item)
                                                    <input type="hidden"  class="amount_type" name="amount_type" value="{{ $item->amount_type }}">

                                                    <div class="middle">
                                                        <p><span>{{ $item->name }}</span> </p>
                                                        <p>
                                                            <span class=""></span>
                                                            <span class="px-2"></span>
                                                            @if ($item->amount_type == 'percentage')
                                                            <span class="">(+) {{ $item->price }}{{ '%' }}</span>
                                                            @else
                                                            <span class="">(+) {{ $item->price }}</span>
                                                            @endif

                                                        </p>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <div class="event-total">
                                                <p class="mb-0"><span>{{ __('Total') }}</span></p>
                                                @if ($data->type == 'free')
                                                    <p class="mb-0"><span>{{ $currency }}0.00</span></p>
                                                @else
                                                    <p class="mb-0">{{ $currency }}<span class="org_total">{{ ($data->price + $data->tax_total) }}</span>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <?php $setting = App\Models\PaymentSetting::find(1); ?>
                                    <div class="card checkout-right">
                                        <div class="card-body">
                                            <h5 class="mb-4"> {{ __('Choose Payment') }}</h5>
                                            <div class="payments">
                                                @if ($data->type == 'free')
                                                    <label class="chk-container">{{ __('FREE') }}
                                                        <input type="radio" name="payment_type" value="FREE" checked>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                @else

                                                    @if ($setting->cod == 1 || ($setting->flutterwave == 0 && $setting->stripe == 0 && $setting->paypal == 0 && $setting->razor == 0))
                                                        <label class="chk-container">{{ __('Cash On Delivery') }}
                                                            <input type="radio" name="payment_type" value="LOCAL" checked>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    @endif

                                                    <div class="paypal-button-section hide mt-4">
                                                        <div id="paypal-button-container"> </div>
                                                    </div>

                                                @endif
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <div class="stripe-form-section hide mt-4">

                                        <div class="stripe-form"> </div>

                                    </div>

                                    <button type="submit" id="form_submit" class="btn btn-a w-100 mt-4 place_order"><i
                                        class="fa pr-2 fa-check-square"></i>{{ __('Place Order') }}</button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection
