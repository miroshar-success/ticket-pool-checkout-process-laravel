<!doctype html>
<html lang="en">
<head>
    <title>{{__('Event Right Revamped')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" name="base_url" value="{{ url('/') }}">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}?<?php echo time();?>" rel="stylesheet">

</head>
<body>
    <div class="site-wrapper">
        @include('layout.navbar')
        @yield('content')
        @include('layout.footer')
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</html>
