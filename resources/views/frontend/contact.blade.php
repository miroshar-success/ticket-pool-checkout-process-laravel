@extends('frontend.master', ['activePage' => 'contact'])
@section('title', __('Contact Us'))
@section('content')
    @php
        $social = \App\Models\Setting::find(1);
        $logo = \App\Models\Setting::find(1)->logo;
        $admin = \App\Models\User::find(1);
    @endphp

    <div class="pb-20 bg-scroll min-h-screen" style="background-image: url('images/events.png')">
        {{-- scroll --}}
        <div class="mr-4 flex justify-end z-30">
            <a type="button" href="{{ url('#') }}"
                class="scroll-up-button bg-primary rounded-full p-4 fixed z-20  2xl:mt-[49%] xl:mt-[59%] xlg:mt-[68%] lg:mt-[75%] xxmd:mt-[83%] md:mt-[90%]
                xmd:mt-[90%] sm:mt-[117%] msm:mt-[125%] xsm:mt-[160%]">
                <img src="{{ asset('images/downarrow.png') }}" alt="" class="w-3 h-3 z-20">
            </a>
        </div>
        <div
            class="mt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
            <div class="mt-10 pb-5">
                <p class="font-poppins font-semibold text-5xl leading-10 text-primary">{{ __('Contact us') }}</p>
            </div>
            @if (!isset($data->lat))
                <div class="font-poppins font-medium text-lg leading-4 text-black mt-5 capitalize ">
                    {{ __('Google Map is not configured by the admin yet') }}
                </div>
            @endif
            <div class="flex sm:space-x-6 msm:space-x-0 xxsm:space-x-0 xxmd:flex-row xmd:flex-col xxsm:flex-col">
                <div class="xxmd:w-2/3 xmd:w-full xxsm:w-full" style="background-image: url('images/contact-us.jpg');background-size: 100% 100%;">
                    <div id="" style="width:100%;height:500px;">
                    </div>
                </div>
                <div class="xxmd:w-1/3 xmd:w-full xxsm:w-full">
                    <div class="p-4 bg-primary shadow-lg rounded-md">
                        <div class="flex justify-center border-b border-gray-light pb-8">
                            <img src="{{ $logo ? url('images/upload/' . $logo) : asset('/images/logo.png') }}"
                                alt="" class="z-20 h-20 w-40 object-contain">
                        </div>
                        <div class="flex pt-8 flex-wrap 1xl:flex-nowrap">
                            <div class="mr-5 bg-white rounded-full h-10 overflow-hidden flex justify-center items-center">
                                <i class="fa-solid fa-envelope w-10 text-center align-middle text-primary"></i>
                            </div>
                            <div>
                                <p
                                    class="font-poppins font-normal 1xl:text-xl xxmd:text-xl lg:text-base sm:text-base xxsm:text-base leading-7 text-white">
                                    {{ __('Email') }}</p>
                                <p
                                    class="font-poppins font-medium 1xl:text-xl xxmd:text-xl lg:text-base sm:text-base xxsm:text-base leading-7 text-white pt-1">
                                    {{ $data->email ?? '' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex pt-8 flex-wrap 1xl:flex-nowrap">
                            <div class="mr-5 bg-white rounded-full h-10 overflow-hidden flex justify-center items-center">
                                <i class="fa-solid fa-phone w-10 text-center align-middle text-primary"></i>
                            </div>
                            <div>
                                <p
                                    class="font-poppins font-normal 1xl:text-xl xxmd:text-xl lg:text-base sm:text-base xxsm:text-base leading-7 text-white">
                                    {{ __('Phone') }}</p>
                                <p
                                    class="font-poppins font-medium 1xl:text-xl xxmd:text-xl lg:text-base sm:text-base xxsm:text-base leading-7 text-white pt-1">
                                    {{ $data->phone ?? '' }}</p>
                            </div>
                        </div>
                        <div class="flex pt-8 flex-wrap 1xl:flex-nowrap">
                            <div class="mr-5 bg-white rounded-full h-10 overflow-hidden flex justify-center items-center">
                                <i class="fa-solid fa-location-dot w-10 text-center align-middle text-primary"></i>
                            </div>
                            <div>
                                <p class="font-poppins font-normal 1xl:text-xl xxmd:text-xl lg:text-base sm:text-base xxsm:text-base leading-7 text-white">
                                    {{ __('Address') }}
                                </p>
                                <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                    <p class="font-poppins font-medium 1xl:text-xl xxmd:text-xl lg:text-base sm:text-base xxsm:text-base leading-7 text-white pt-1">
                                        {{ $data->address ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex pt-8 pb-5 flex-wrap 1xl:flex-nowrap">
                            <div class="mr-5 bg-white rounded-full h-10 overflow-hidden flex justify-center items-center">
                                <i class="fa-solid fa-at w-10 text-center align-middle text-primary"></i>
{{--                                <i class="fa-solid fa-at"></i>--}}
                            </div>
                            <div>
                                <p
                                    class="font-poppins font-normal 1xl:text-xl xxmd:text-xl lg:text-base sm:text-base xxsm:text-base leading-7 text-white">
                                    {{ __('Social') }}</p>
                                <div class="flex mt-2">
                                    @php
                                        $social = \App\Models\Setting::find(1);
                                    @endphp
                                    <a href="{{ $social->Facebook }}" target="blank" class="link-one">
                                        <i class="fa-brands fa-facebook fa-2x  mr-5 z-20 text-white"></i>
                                    </a>
                                    <a href="{{ $social->Twitter }}" target="blank" class="link-one">
                                        <i class="fa-brands fa-twitter fa-2x  mr-5 z-20 text-white"></i>
                                    </a>
                                    <a href="{{ $social->Instagram }}" target="blank" class="link-one">
                                        <i class="fa-brands fa-instagram fa-2x  mr-5 z-20 text-white"></i>
                                    </a>
{{--                                    <a href="{{ $social->Pinterest }}" target="blank" class="link-one">--}}
{{--                                        <i class="fa fa-pinterest-p text-white fa-2x " aria-hidden="true"></i>--}}
{{--                                    </a>--}}
                                    <style>
                                        .fa-2x {
                                            font-size: 24px;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            {{-- Contact Us --}}
            <div class="bg-white shadow-lg rounded-md p-4 mt-10">
                <form action="{{ url('/send-to-admin') }}" method="post" class="php-email-form">
                    <p class="font-poppins font-semibold text-2xl leading-8 text-black">{{ __('Contact Us') }}</p>
                    <div class="">
                        <div class="grid md:grid-cols-2 sm:grid-cols-1 xxsm:grid-cols-1 mt-5 gap-5">
                            <form action="{{ url('/send-to-admin') }}" method="post" class="php-email-form">
                                @csrf
                                <div class=" ">
                                    <label for="firstname"
                                        class="font-poppins font-medium text-base leading-6 text-black-100 pb-2">{{ __('First Name') }}</label>
                                    <input type="text" name="name" required
                                        class="focus:outline-none text-base leading-6 font-poppins font-normal text-black-100 block p-3 rounded-md z-20 
                                border border-gray-light w-full"
                                        placeholder="{{ __('Your Name') }}">
                                </div>
                                <div class="">
                                    <label for="lastname"
                                        class="font-poppins font-medium text-base leading-6 text-black-100 pb-2">{{ __('Your Email') }}</label>
                                    <input type="text" name="email" required
                                        class="focus:outline-none text-base leading-6 font-poppins font-normal text-black-100 block p-3 rounded-md z-20 
                                border border-gray-light w-full"
                                        placeholder="{{ __('Your Email') }}">
                                </div>
                        </div>
                        <div class="mt-5">
                            <div class=" ">
                                <label for="subject"
                                    class="font-poppins font-medium text-base leading-6 text-black-100 pb-2">{{ __('Subject') }}</label>
                                <input type="text" required name="subject"
                                    class="focus:outline-none text-base leading-6 font-poppins font-normal text-black-100 block p-3 rounded-md z-20 
                                border border-gray-light w-full"
                                    placeholder="{{ __('Subject Message') }}">
                            </div>
                        </div>
                        <div class="mt-5">
                            <textarea id="message" rows="4" name="msg"
                                class="block p-2.5 w-full focus:outline-none text-base leading-6 font-poppins font-normal text-gray-100
                            border border-gray-light rounded-md "
                                required placeholder="{{ __('Describe your message...') }}"></textarea>

                        </div>
                        <div class="mt-5 flex justify-end">
                            <button
                                class="bg-primary text-white font-poppins font-medium text-base leading-6 px-5 py-2 rounded-md">{{ __('Send Message') }}</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: {{ $data->lat ?? '' }},
                    lng: {{ $data->long ?? '' }}
                },
                zoom: 13
            });
            let marker = new google.maps.Marker({
                position: {
                    lat: {{ $data->lat ?? '' }},
                    lng: {{ $data->long ?? '' }}
                },
                map: map
            });
        }
    </script>

    @php
        $gmapkey = \App\Models\Setting::find(1)->map_key;
    @endphp
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $gmapkey }}&callback=initMap"></script>
@endsection
