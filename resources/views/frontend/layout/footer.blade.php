@php
    $language = \App\Models\Language::where('status', 1)->get();
@endphp
<div class="footer bg-primary py-3 bottom-0 m-0">
    <div
        class="flex xxsm:flex-wrap xsm:flex-wrap msm:flex-wrap 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 justify-between  md:mx-28 py-3 pt-4">
        <div class="flex justify-between items-center sm:items-left w-auto">
            <ul
                class="flex lg:flex-row xmd:flex-row md:flex-row md:text-xs md:-space-x-3 sm:flex-row msm:flex-row xsm:flex-col xxsm:flex-col msm:space-x-3 sm:space-x-2 lg:space-x-10 md:mt-0">
                <li class="mt-2">
                    <a href="{{ url('/') }}"
                        class="md:px-3 capitalize font-poppins font-normal text-base leading-6 text-white">{{ __('Home') }}</a>
                </li>
                <li class="mt-2">
                    <a href="{{ url('/user/login') }}"
                        class="md:px-3 capitalize font-poppins font-normal text-base leading-6 text-white">{{ __('Organizer') }}</a>
                </li>
                <li class="mt-2">
                    <a href="{{ url('/privacy_policy') }}"
                        class="md:px-3 capitalize font-poppins font-normal text-base leading-6 text-white flex">{{ __('Privacy Policy') }}

                    </a>
                </li>
                <li class="mt-2">
                    <a href="{{ url('/contact') }}"
                        class="md:px-3 capitalize font-poppins font-normal text-base leading-6 text-white">{{ __('Contact') }}</a>
                </li>
                <li class="mt-2">
                    <a href="{{ url('/user/FAQs') }}"
                        class="md:px-3 capitalize font-poppins font-normal text-base leading-6 text-white">{{ __("FAQ's") }}</a>
                </li>
            </ul>
        </div>
        <div class="sm:px-4 xmd:px-0 flex">
            <div class="relative inline-block text-left">
                @if (Session::has('local'))
                    {{ Session::get('local') }}
                @endif
                <a type="button" href="javascript:void(0);"
                    class="px-3 py-2 text-white bg-primary-dark text-center font-poppins font-normal text-base leading-6 rounded-md flex language">
                    {{ __('Language') }}<img src="{{ asset('images/downwhite.png') }}"
                        class="w-3 h-2 mx-2 mt-2 language" alt="">
                </a>

                <div
                    class="languageClass hidden rigin-top-left absolute left-0 w-44 rounded-md shadow-2xl z-10 bottom-12">
                    <div class="rounded-md bg-white shadow-lg p-3">
                        @foreach ($language as $item)
                            <div class="">
                                <div class="p-2 flex items-left justify-left">
                                    <a type="button" href="{{ url('change-language/' . $item->name) }}"
                                        class="hover:text-primary capitalize p-2 hover:bg-primary-light text-black w-full text-center font-poppins font-normal text-base leading-6 rounded-md flex language">
                                        <img src="{{ asset('images/upload/' . $item->image) }}"
                                            class="w-5 h-5 mx-2 language" alt="">{{ $item->name }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
