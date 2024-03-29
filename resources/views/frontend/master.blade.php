<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $favicon = \App\Models\Setting::find(1)->favicon;
    @endphp
    <meta charset="utf-8">
    <link href="{{ $favicon ? url('images/upload/' . $favicon) : asset('/images/logo.png') }}" rel="icon"
        type="image/png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ \App\Models\Setting::find(1)->app_name }} | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <input type="hidden" name="base_url" id="base_url" value="{{ url('/') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}?<?php echo time();?>" rel="stylesheet">
    {!! JsonLdMulti::generate() !!}
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <!-- Favicons -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- Vendor CSS Files -->
    <link href="{{ url('frontend/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="{{ url('frontend/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ url('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/event.css') }}?<?php echo time();?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <!-- Template Main CSS File -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"
        integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (session('direction') == 'rtl')
        <link rel="stylesheet" href="{{ url('frontend/css/rtl.css') }}">
    @endif
</head>

<body>
    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>

    <div id="app">


        <?php $primary_color = \App\Models\Setting::find(1)->primary_color; ?>

        <style>
            :root {
                --primary_color: <?php echo $primary_color; ?>;
                --light_primary_color: <?php echo $primary_color . '1a'; ?>;
                --profile_primary_color: <?php echo $primary_color . '52'; ?>;
                --middle_light_primary_color: <?php echo $primary_color . '85'; ?>;
            }

            .bg-primary {
                --tw-bg-opacity: 1;
                background-color: var(--primary_color);
            }

            .bg-primary-dark {
                --tw-bg-opacity: 1;
                background-color: var(--profile_primary_color);
                /* Use the profile_primary_color variable */
            }

            .navbar-nav>.active>a {
                color: var(--primary_color);
            }

            .text-primary {
                --tw-text-opacity: 1;
                color: var(--primary_color);
            }

            .border-primary {
                --tw-border-opacity: 1;
                border-color: var(--primary_color);
            }

            .carousel-indicators button[aria-current=true] {
                background: var(--primary_color) !important;
            }

            .profile button[aria-selected=true] {
                background: var(--primary_color) !important;
                color: #FFFFFF !important;
            }
        </style>

        <input type="hidden" name="currency" id="currency" value="{{ $currency }}">
        <input type="hidden" name="default_lat" id="default_lat"
            value="{{ \App\Models\Setting::find(1)->default_lat }}">
        <input type="hidden" name="default_long" id="default_long"
            value="{{ \App\Models\Setting::find(1)->default_long }}">
        <div class="site-wrapper">
            @include('frontend.layout.header')
            <div class="min-h-screen flex flex-col">
                <main class="flex-grow">
                    @yield('content')
                </main>
                <footer class="mt-auto">
                    @include('frontend.layout.footer')
                </footer>
            </div>
        </div>

        <script src="https://checkout.flutterwave.com/v3.js"></script>
        <script src="{{ url('frontend/js/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
        <script src="{{ url('frontend/js/jquery.easing.min.js') }}"></script>
        <script src="{{ url('frontend/js/validate.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
        <script src="{{ url('frontend/js/scrollreveal.min.js') }}"></script>
        <script src="{{ url('frontend/js/map.js') }}"></script>

        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <?php $client_id = \App\Models\PaymentSetting::find(1)->paypalClientId;
        $cur = \App\Models\Setting::find(1)->currency;
        $map_key = \App\Models\Setting::find(1)->map_key;
        ?>
        @if ($client_id != null)
            <script src="https://www.paypal.com/sdk/js?client-id={{ $client_id }}&currency={{ $cur }}"
                data-namespace="paypal_sdk"></script>
        @endif
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
        <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
        <script src="{{ url('frontend/js/qrcode.min.js') }}"></script>
        <script src="{{ url('frontend/js/main.js') }}"></script>
        <script src="{{ url('frontend/js/custom.js') }}"></script>
        <script src="{{ url('js/custom.js') }}"></script>
        <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/datepicker.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    </div>
</body>

</html>
