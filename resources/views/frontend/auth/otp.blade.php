<!doctype HTML>
<html>

<head>
    <title>{{ __('OTP Verification') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
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
        
    </style>
</head>
@php
    $setting = \App\Models\Setting::find(1);
@endphp

<body>
    <div class="flex justify-center mt-16">
        <div
            class="bg-white shadow-2xl rounded-md p-5 mt-10 1xl:w-[40%] xl:w-[45%] lg:w-[45%] xmd:w-[55%] md:w-[65%] sm:w-[75%] xxsm:w-full">
            <div class="flex justify-center mt-5">
                <img src="{{ $setting->logo ? url('images/upload/' . $setting->logo) : asset('/images/logo.png') }}"
                    alt="" class="h-20 w-auto object-cover">
            </div>
            <p class="font-poppins font-bold text-3xl leading-9 text-black text-center pt-6">
                {{ __('OTP Verification') }}
            </p>
            @if (session('error'))
                <div class="_2OcwfRx4 text-danger mt-1 text-center" data-qa="email-status-message">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <div class="_2OcwfRx4 text-danger mt-1 text-center" data-qa="email-status-message">
                                    <p>{{ $error }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('user/otp-verify') }}" method="post">
                @csrf
                <input type="hidden" name='id' value="{{ $user->id }}">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-1 msm:grid-cols-1 xxsm:grid-cols-1">
                    <div class="pt-5">
                        <label for="name"
                            class="font-poppins font-medium text-base leading-6 text-black">{{ __('OTP') }}</label>
                        <input type="text" name="otp" required
                            id=""class="w-full text-sm font-poppins font-normal text-black block p-3 z-20 rounded-lg border border-gray-light focus:outline-none"
                            placeholder="{{ __('OTP') }}">
                    </div>
                </div>
                <div class="pt-7">
                    <button
                        class="font-poppins text-white bg-primary leading-4 w-full text-sm font-medium py-4 rounded-lg focus:outline-none">{{ __('Verify OTP') }}</button>
                </div>
            </form>
            <div class="pt-6 flex justify-center">
                <h1 class="font-poppins font-medium text-base leading-5 pt-4 text-left text-gray">
                    {{ __('Already have an account?') }}
                    <a href="{{ url('/user/login') }}"
                        class="text-primary text-medium text-base">{{ __('Login') }}</a>
                </h1>
            </div>
        </div>
    </div>
</body>

</html>
