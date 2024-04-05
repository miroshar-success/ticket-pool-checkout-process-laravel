<!doctype HTML>
<html>

<head>
    <title>{{ __('Register Page') }}</title>
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link href="/applications/ticket-world/admin/css/style.css" rel="stylesheet">
    <link href="/applications/ticket-world/admin/css/components.css" rel="stylesheet">
    <link href="/applications/ticket-world/admin/css/custom.css" rel="stylesheet">
    <link href="/applications/ticket-world/admin/css/countrySelect.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/applications/ticket-world/admin/js/countrySelect.min.js"></script>

    @php
        $favicon = \App\Models\Setting::find(1)->favicon;
    @endphp
    <meta charset="utf-8">
    <link href="{{ $favicon ? url('images/upload/' . $favicon) : asset('/images/logo.png') }}" rel="icon"
        type="image/png">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" /> -->

    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {                
            $('#DateOfBirth').flatpickr({
                maxDate: "today",
                enableTime: false,
                dateFormat: "Y-m-d",
            });

            $("#country").countrySelect({
                // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
				// responsiveDropdown: true,
				defaultCOuntry: 'us',
				preferredCountries: ['us', 'gb', 'ca']
			});
        })
    </script>

    <?php $primary_color = \App\Models\Setting::find(1)->primary_color; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            background-color: var(--profile_primary_color) !important;
            /* Use the profile_primary_color variable */
        }

        .navbar-nav>.active>a {
            color: var(--primary_color);
        }

        .text-primary {
            --tw-text-opacity: 1;
            color: var(--primary_color) !important;
        }

        .border-primary {
            --tw-border-opacity: 1;
            border-color: var(--primary_color) !important;
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
        .country-select {
            width: 100%;
        }
        .hidden {
            display: none !important;
        }
        
        @media (max-width: 576px) {
            .mobile-hide {
                display: none !important;
            }
        }
    </style>
</head>
@php
    $setting = \App\Models\Setting::find(1);
@endphp

<body>
<section class="section">
        <div class="mt-0 d-flex flex-wrap align-items-stretch">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-primary" style="overflow-y: auto;height: 100vh;">
                <div class="p-4 m-3">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div id="alert-2"
                                class="d-flex align-items-center mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg width="20" height="20" class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium" style="margin-left: 8px">
                                    {{ $error }}
                                </div>
                                <!-- <button type="button"
                                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                    data-dismiss-target="#alert-2" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button> -->
                            </div>
                        @endforeach
                    @endif
                    @if (Session::has('error'))
                        <div id="alert-2"
                            class="d-flex align-items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg width="20" height="20" class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium" style="margin-left: 6px">
                                {{ Session::get('error') }}
                            </div>
                            <!-- <button type="button"
                                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-2" aria-label="Close">
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
                    <h4 class="text-white font-weight-normal mb-4">{{ __('Create an account') }}</h4>
                    <form class="need-validation" action="{{ url('user/register') }}" method="post">
                        @csrf                        
                        <div class="form-group d-flex align-items-center justify-content-center user-organizer-options">
                            <div class="radio-wrapper d-flex flex-1 border justify-content-center border border-gray-ligh rounded-lg">
                                <input id="default-radio-1" type="radio" value="user" checked name="user_type"
                                            class="user d-block form-check-input position-relative mt-0">
                                <div style="width: 3px"></div>
                                <label for="default-radio-1" class="form-check-label text-white">{{ __('User') }}</label>
                            </div>
                            <div style="width: 15px"></div>
                            <div class="radio-wrapper d-flex flex-1 border justify-content-center border border-gray-light rounded-lg">
                                <input id="default-radio-2" type="radio" value="organizer" name="user_type"
                                            class="org d-block form-check-input position-relative mt-0">
                                <div style="width: 3px"></div>
                                <label for="default-radio-2" class="form-check-label text-white">{{ __('Organizer') }}</label>
                            </div>
                        </div>

                        <div class="form-group orginput">
                            <label for="name" class="text-white">{{ __('First Name') }}</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="{{ __('First Name') }}">
                        </div>
                        <div class="form-group orginput">
                            <label for="last_name" class="text-white">{{ __('Last Name') }}</label>
                            <input type="text" name="last_name" id="" class="form-control" placeholder="{{ __('Last Name') }}">
                        </div>

                        <div class="userinput">
                            <div class="form-group">
                                <label for="gender"
                                    class="text-white">{{ __('Gender') }}</label>
                                <select id="gender" name="Gender" class="w-100 form-control">
                                    <option value="" disabled selected>{{ __('Select Gender') }}</option>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="DateOfBirth">{{ __('Date Of Birth') }}</label>
                                <input type="text" name="DateOfBirth" id="DateOfBirth"
                                    placeholder="{{ __('Choose Date Of Birth') }}"
                                    class="form-control date">
                            </div>
                            <div class="form-group">
                                <label for="Country" class="text-white d-block">{{ __('Country') }}</label>
                                <div>
                                    <input class="form-control" id="country" name="Country" type="text">
                                    <input type="hidden" id="country_selector_code" name="country_selector_code" data-countrycodeinput="1" readonly="readonly" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="text-white">{{ __('City') }}</label>
                                <input type="text" name="City" id="" class="form-control" placeholder="{{ __('City') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="number"
                                class="text-white">{{ __('Contact Number') }}</label>
                            <div class="d-flex space-x-3">
                                <div style="width: 35%">
                                    <select id="countries" name="Countrycode" class="w-100 form-control">
                                        <option value="" disabled selected>{{ __('Select Country') }}</option>
                                        @foreach ($phone as $item)
                                            <option class=" " value="{{ $item->phonecode }}">
                                                {{ $item->name . '(+' . $item->phonecode . ')' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="width: 5px"></div>
                                <div style="width: 65%">                               
                                    <input type="number" name="phone" id="" class="form-control" placeholder="{{ __('Number') }}">                                        
                                </div>
                            </div>
                        </div>
                        <div class="form-group orginput hidden">
                            <label for="organize" class="text-white">{{ __('Organization Name') }}</label>
                            <input type="text" name="organize" id="" class="form-control" placeholder="{{ __('Organization Name') }}">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-white">{{ __('Email Address') }}</label>
                            <input required type="email" name="email" id="" class="form-control" placeholder="{{ __('Email Address') }}">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-white">{{ __('Password') }}</label>
                            <input required type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}">
                        </div>
                        
                        <div class="form-group">
                            <div class="text-right">
                                <button class="btn btn-primary btn-lg btn-icon icon-right">
                                    {{ __('Create') }}
                                </button>                               
                            </div>
                        </div> 
                    </form>
                    <div class="mt-5 form-group d-flex align-items-end justify-content-between">
                        <h5 class="font-medium text-left font-poppins text-white pb-0 mb-0">
                            {{ __('Already have an account?') }} </h5>
                        <a href="{{ url('/user/login') }}" class="text-white text-underline text-medium">{{ __('Login') }}</a>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 position-relative pl-0 mobile-hide">
                <!-- <video preload="auto" autoplay muted loop id="myVideo" class="position-fixed h-100">
                    <source src="/applications/ticket-world/public/images/auth_video.mp4" type="video/mp4">
                </video> -->
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-4 font-weight-bold">{{ __('Welcome') }}</h1>
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
    $('.user').on('click', function() {
        $('.orginput').addClass('hidden')
        $('.userinput').removeClass('hidden')
    });
    $('.org').on('click', function() {
        $('.orginput').removeClass('hidden')
        $('.userinput').addClass('hidden')
    });
</script>
<script>
    $('#location').select2();
</script>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</html>
