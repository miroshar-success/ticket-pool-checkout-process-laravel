@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
        'title' => __('Ticket Detail'),
        'headerData' => __('Orders') ,
        'url' => 'orders' ,
        ])

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="ticket-header mb-4 text-center text-primary">
                        <h2>{{ App\Models\Setting::find(1)->app_name }}</h2>
                    </div>
                    <div class="row ticket-header pb-3 mb-3">
                        <div class="col-lg-6 print-left">
                            <h5 class="mb-3 text-dark">{{ $ticket->order->event->name }}</h5>

                            <p><span>{{ __('Start Date:') }} </span>{{ $ticket->order->event->start_time->format('d F Y') . ', ' . $ticket->order->event->start_time->format('h:i a') }}
                            </p>
                            <p><span>{{ __('End Date:') }} </span>{{ $ticket->order->event->end_time->format('d F Y') . ', ' . $ticket->order->event->end_time->format('h:i a') }}
                            </p>
                            <p><span>{{ __('Address:') }} </span>{{ $ticket->order->event->type == 'online' ? 'Online Event' : $ticket->order->event->address }}
                            </p>
                            <p><span>{{ __('Organizer:') }} </span>{{ $ticket->order->organization->first_name . ' ' . $ticket->order->organization->last_name }}
                            </p>
                        </div>
                        <div class="col-lg-3 print-left print-right text-right ">
                            <h5 class="text-dark">{{ __('Ticket:') }} {{ $ticket->ticket_number }}</h5>
                            <h5 class="text-dark">
                                {{ $ticket->order->customer->name . ' ' . $ticket->order->customer->last_name }}</h5>
                            <p><span>{{ __('Payment method:') }}</span>{{ $ticket->order->payment_type }}</p>
                            @if ($ticket->status == 1)
                                <img src="{{ url('images/scan.png') }}" alt="Qr">
                               
                            @endif
                        </div>
                        <div class="col-lg-3 text-center">
                            {!! $ticket->qrCode !!}
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
