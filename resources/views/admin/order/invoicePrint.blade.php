<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ \App\Models\Setting::find(1)->app_name }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- General CSS Files -->
    <link href="{{ url('images/upload/' . \App\Models\Setting::find(1)->favicon) }}" rel="icon" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- CSS Libraries -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Template CSS -->

    <link rel="stylesheet" href="{{ url('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/custom.css') }}">
    @if (session('direction') == 'rtl')
     <link rel="stylesheet" href="{{ url('admin/css/rtl.css') }}">
    @endif
</head>

<body>
    <?php $primary_color = \App\Models\Setting::find(1)->primary_color; ?>

    <style>
        :root {
            --primary_color: <?php echo $primary_color; ?>;
            --light_primary_color: <?php echo $primary_color . '1a'; ?>;
            --middle_light_primary_color: <?php echo $primary_color . '85'; ?>;
        }
    </style>
    <script>
        window.print();
    </script>

    <div class="main-wrapper">
        <div class="p-5">
            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h3>{{ __('Order') }} {{ $order->order_id }}</h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>{{ __('Event') }}:</strong>
                                        </address>
                                        <div class="media mb-3">
                                            <img alt="image" class="mr-3"
                                                src="{{ url('images/upload/' . $order->event->image) }}" width="50"
                                                height="50">
                                            <div class="media-body">
                                                <div class="media-title mb-0">
                                                    {{ $order->event->name }}
                                                </div>
                                                <div class="media-description text-muted">
                                                    {{ $order->event->start_time->format('l') . ', ' . $order->event->start_time->format('d M Y') }}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>{{ __('Organizer') }}:</strong><br>
                                            {{ $order->organization->first_name . ' ' . $order->organization->last_name }}<br>
                                            {{ $order->organization->email }}<br>
                                            {{ $order->organization->country }}
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <address>
                                            <strong>{{ __('Attendee') }}:</strong><br>
                                            {{ $order->customer->name . ' ' . $order->customer->last_name }}<br>
                                            {{ $order->customer->email }}<br>
                                        </address>


                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>{{ __('Order Date') }}:</strong><br>
                                            {{ $order->created_at->format('d F, Y') }}<br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">{{ __('Order Summary') }}</div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">{{ __('Ticket Name') }}</th>
                                            <th class="text-center">{{ __('Ticket Number') }}</th>
                                            @if (!empty($order->ticket_id_mutiple))
                                                <th class="text-center">{{ __('Seat Number') }}</th>
                                            @endif
                                            <th class="text-center">{{ __('Price') }}</th>
                                        </tr>
                                        @foreach ($order->ticket_data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-center">
                                                    @if (!empty($item->ticket_number_seatsio))
                                                        {{ $item->ticket->name }}
                                                    @else
                                                        {{ $order->ticket->name }}
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $item->ticket_number }}</td>
                                                @if (!empty($item->ticket_number_seatsio))
                                                    <td class="text-center">{{ $item->ticket_number_seatsio }}</td>
                                                @endif
                                                <td class="text-center">                                                    
                                                    @if (!empty($item->ticket_number_seatsio))
                                                        {{ $currency . $item->ticket->price }}
                                                    @else
                                                        {{ $currency . $order->ticket->price }}
                                                    @endif
                                                </td>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <div class="section-title">{{ __('Payment Method') }}</div>
                                        <address>
                                            <strong>{{ $order->payment_type }}</strong><br>
                                            @if ($order->payment_type != 'FREE')
                                                <span
                                                    class="badge mt-1 mb-1 {{ $order->payment_status == 1 ? 'badge-success' : 'badge-warning' }}">{{ $order->payment_status == 1 ? 'Paid' : 'waiting' }}</span><br>
                                                {{ __('Token:') }}
                                                {{ $order->payment_token == null ? '-' : $order->payment_token }}<br>
                                            @endif
                                        </address>
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">{{ __('Subtotal') }}</div>
                                            <div class="invoice-detail-value">
                                                {{ $currency . ($order->payment + $order->coupon_discount - $order->tax) }}
                                            </div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">{{ __('Coupon Discount') }}</div>
                                            <div class="invoice-detail-value">
                                                {{ $currency . $order->coupon_discount }}
                                            </div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">{{ __('Total Tax') }}</div>
                                            <div class="invoice-detail-value">
                                                {{ $currency . $order->tax }}
                                            </div>
                                        </div>

                                        <hr class="mt-2 mb-2">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">{{ __('Total') }}</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">
                                                {{ $currency . $order->payment }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="card right-data ">
                            <div class="card-header">
                                <h2>{{__('QR Code')}}</h2>
                            </div>
                            <div class="card-body">
                                @foreach ($order->ticket_data as $item)
                                    {!! QrCode::size(150)->generate($item->ticket_number) !!}
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="button"><a class="text-decoration-none text-white"
                                    href="{{ url('/send-mail' . '/' . $order->id) }}">{{__('Email PDF')}}</a></button>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

</body>

</html>
