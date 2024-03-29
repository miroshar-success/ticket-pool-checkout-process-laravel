@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
        'title' => __('Order Detail'),
        'headerData' => __('Orders') ,
        'url' => 'orders' ,
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Order Detail') }}</h2>
                </div>
            </div>
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
                        <div class="card-body order-detail">
                            <h4>{{ __('Order : ') }} <span>{{ $order->order_id }}</span></h4>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="event-detail">
                                        <img src="{{ url('images/upload/' . $order->event->image) }}">
                                        <div class="p-3">
                                            <h5 class="mb-0">{{ $order->event->name }}</h5>
                                            <p>{{ __('By') }}: {{ $order->organization->name }}</P>
                                            <h6 class="mb-0">{{ __('event on : ') }}</h6>
                                            <p>{{ $order->event->start_time->format('l') . ', ' . $order->event->start_time->format('Y-m-d h:i a') . ' to ' . $order->event->start_time->format('Y-m-d h:i a') }}
                                            </P>
                                            <h6 class="mb-0">{{ __('Ticket Number: ') }}</h6>
                                            <p class="mb-0">{{ $order->ticket->ticket_number }}</P>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-1">

                                        </div>
                                        <div class="col-3 order-left">
                                            <h6>{{ __('Total tickets') }} : </h6>
                                            <h6>{{ __('Order Status') }} :</h6>
                                            <h6>{{ __('Payment Status') }} :</h6>
                                            <h6>{{ __('Payment Gateway') }} :</h6>
                                            <h6>{{ __('Payment Token') }} :</h6>
                                            <h6>{{ __('Sub Total') }} :</h6>
                                            <h6>{{ __('Coupon Discount') }} :</h6>
                                            <h6>{{ __('Tax') }} :</h6>
                                            <h6>{{ __('Final Payment') }} :</h6>
                                        </div>

                                        <div class="col-8 order-right">
                                            <?php
                                            if ($order->order_status == 'Pending') {
                                                $status = 'badge-warning';
                                            } elseif ($order->order_status == 'Cancel') {
                                                $status = 'badge-danger';
                                            } else {
                                                $status = 'badge-success';
                                            }
                                            ?>
                                            <h6>{{ $order->quantity . ' ticket' }}</h6>
                                            <h6><span class="badge {{ $status }}">{{ $order->order_status }}</span>
                                            </h6>
                                            <h6><span
                                                    class="badge {{ $order->payment_status == 1 ? 'badge-success' : 'badge-warning' }}">{{ $order->payment_status == 1 ? 'Complete' : 'Waiting' }}</span>
                                            </h6>
                                            <h6>{{ $order->payment_type }}</h6>
                                            <h6>{{ $order->payment_type == 'LOCAL' || $order->payment_type == 'FREE' ? '-' : $order->payment_token }}
                                            </h6>
                                            @if ($order->payment_type == 'FREE')
                                                <h6>{{ __('FREE') }}</h6>
                                                <h6>{{ __('FREE') }}</h6>
                                                <h6>{{ __('FREE') }}</h6>
                                            @else
                                                <h6>{{ $currency . ($order->payment + $order->coupon_discount - $order->tax) }}
                                                </h6>
                                                <h6>(-) {{ $currency . $order->coupon_discount }}</h6>
                                                <h6>(+) {{ $currency . $order->tax }}</h6>
                                                <h6>{{ $currency . $order->payment }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
