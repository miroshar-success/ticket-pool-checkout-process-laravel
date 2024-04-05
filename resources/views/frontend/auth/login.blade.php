<!doctype HTML>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('Login') }}</title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link href="/applications/ticket-pool/public/admin/css/style.css" rel="stylesheet">
    <link href="/applications/ticket-pool/public/admin/css/components.css" rel="stylesheet">
    <link href="/applications/ticket-pool/public/admin/css/custom.css" rel="stylesheet">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" /> -->

    <?php $primary_color = \App\Models\Setting::find(1)->primary_color; ?>
    @php
        $favicon = \App\Models\Setting::find(1)->favicon;
    @endphp
    <meta charset="utf-8">
    <link href="{{ $favicon ? url('images/upload/' . $favicon) : asset('/images/logo.png') }}" rel="icon"
        type="image/png">
    <style>
        :root {
            --primary_color: <?php echo $primary_color; ?>;
            --light_primary_color: <?php echo $primary_color . '1a'; ?>;
            --profile_primary_color: <?php echo $primary_color . '52'; ?>;
            --middle_light_primary_color: <?php echo $primary_color . '85'; ?>;
        }

        .bg-primary {
            --tw-bg-opacity: 1;
            background-color: var(--primary_color) !important;
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

        input[type="radio"]:checked {
            background-color: var(--primary_color) !important;
            color: var(--primary_color) !important;
        }
        .text-underline {
            text-decoration: underline;
        }
        .flex-1 {
            flex: 1;
        }
        .text-white {
            color: white;
        }
        .radio-wrapper {
            padding: 5px 10px;
            margin: 0 5px;
        }
        .user-organizer-options {
            margin-left: -5px;
            margin-right: -5px;
        }
        input[type="radio"] {
            margin: 0 5px 0 10px;
        }
        
        @media (max-width: 576px) {
            .mobile-hide {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    @php
        $setting = \App\Models\Setting::find(1);
    @endphp
    <section class="section">
        <div class="mt-0 d-flex flex-wrap align-items-stretch">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-primary" style="height: 100vh;overflow-y:auto">
                <div class="p-4 m-3">
                    @if (Session::has('success'))
                        <div id="alert-3"
                            class="d-flex align-items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <svg width="20" height="20" class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium" style="margin-left: 6px">
                                {{ Session::get('success') }}
                            </div>
                            <!-- <button type="button"
                                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-3" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button> -->
                        </div>
                    @endif
                    <img src="{{ $setting->logo ? url('images/upload/' . $setting->logo) : asset('/images/logo.png') }}"
                        alt="logo" width="300" class="mb-4 mt-2 object-contain">
                    <h4 class="text-white font-weight-normal mb-4">{{ __('Sign in to your account') }}</h4>
                    <form class="need-validation" action="{{ url('user/login') }}" method="post" data-qa="form-login" name="login">
                        @csrf
                        <input type="hidden" value="{{ url()->previous() }}" name="url">

                        <div class="form-group d-flex align-items-center justify-content-center user-organizer-options">
                            <div class="radio-wrapper d-flex flex-1 border justify-content-center border border-gray-ligh rounded-lg">
                                <input id="default-radio-1" type="radio" value="user" checked name="type"
                                            class="d-block form-check-input position-relative mt-0">
                                <div style="width: 3px"></div>
                                <label for="default-radio-1" class="form-check-label text-white">{{ __('User') }}</label>
                            </div>
                            <div style="width: 15px"></div>
                            <div class="radio-wrapper d-flex flex-1 border justify-content-center border border-gray-light rounded-lg">
                                <input id="default-radio-2" type="radio" value="org" name="type"
                                            class="d-block form-check-input position-relative mt-0">
                                <div style="width: 3px"></div>
                                <label for="default-radio-2" class="form-check-label text-white">{{ __('Organizer') }}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="text-white">{{ __('Email') }}</label>
                            <input type="email" name="email" id="" class="form-control" placeholder="{{ __('Your Email') }}">
                            @error('email')
                                <div class="_2OcwfRx4" data-qa="email-status-message">{{ $message }}</div>
                            @enderror
                            @if (Session::has('error_msg'))
                                <div class="mt-1 _2OcwfRx4 text-danger" data-qa="email-status-message">
                                    <strong>{{ Session::get('error_msg') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-white">{{ __('Password') }}</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}">
                                <!-- <span class="absolute right-2.5 bottom-2.5 text-xl font-poppins font-medium text-gray px-2"><i
                                        class="fa-regular fa-eye text-primary" id="togglePassword"></i></span> -->
                                @error('password')
                                    <div class="_2OcwfRx4" data-qa="email-status-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input id="remember-me" type="checkbox" name="remember" class="custom-control-input" value="true">
                                <label class="custom-control-label text-white" for="remember-me">{{ __('Remember Me') }}</label>
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-end justify-content-between"> 
                            <a href="{{ url('/user/resetPassword') }}"
                                        class="text-xs font-medium leading-5 font-poppins text-white text-underline">{{ __('Forgot your password?') }}</a>
                            <div class="text-right">
                                <button class="btn btn-primary btn-lg btn-icon icon-right">
                                    {{ __('Sign In') }}
                                </button>                               
                            </div>
                        </div>                        
                    </form>
                    <div class="mt-5 form-group d-flex align-items-end justify-content-between">
                        <h5 class="font-medium text-left font-poppins text-white pb-0 mb-0">
                            {{ __('Don’t have an account?') }} </h5>
                        <a href="{{ url('/user/register') }}" class="text-white text-underline text-medium">{{ __('Create Account') }}</a>
                    </div>
                        <p>Powered by Warehouse Worship</p>

                </div>
            </div>

            <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 position-relative pl-0 mobile-hide">
                <video preload="auto" autoplay muted loop id="myVideo" class="position-fixed h-100">
                    <source src="/applications/ticket-pool/public/images/auth_video.mp4" type="video/mp4">
                </video>
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-4 font-weight-bold">{{ __('Welcome') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    window.addEventListener("DOMContentLoaded", function() {
        const togglePassword = document.querySelector("#togglePassword");

        togglePassword.addEventListener("click", function(e) {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // toggle the eye / eye slash icon
            this.classList.toggle("fa-eye-slash");
        });
    });
</script>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>

</html>
