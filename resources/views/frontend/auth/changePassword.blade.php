@extends('frontend.master', ['activePage' => 'blog'])
@section('title', 'Change Password')
@section('content')
    <div class=" bg-scroll min-h-screen" style="background-image: url('images/events.png')">
        {{-- scroll --}}
        <div class="mr-4 flex justify-end z-30">
            <a type="button" href="{{ url('#') }}"
                class="scroll-up-button bg-primary rounded-full p-4 fixed z-20  2xl:mt-[49%] xl:mt-[59%] xlg:mt-[68%] lg:mt-[75%] xxmd:mt-[83%] md:mt-[90%]
                    xmd:mt-[90%] sm:mt-[117%] msm:mt-[125%] xsm:mt-[160%]">
                <img src="{{ asset('images/downarrow.png') }}" alt="" class="w-3 h-3 z-20">
            </a>
        </div>
        <form action="{{ url('user-change-password') }}" method="post" >
            @csrf
        <div
            class="mt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
            <p class="font-semibold font-poppins text-5xl leading-10 text-black pt-5">{{ __('Change password') }}</p>
            <div
                class="space-y-5 mt-10 mb-5 1xl:w-[30%] xl:w-[35%] xlg:w-[40%] lg:w-[50%] xxmd:w-[55%] xmd:w-[64%] md:w-[70%] sm:w-[80%]">
                <div class="">
                    <label for="current_password"
                        class="font-poppins font-medium text-base leading-6 text-black">{{ __('Current Password') }}</label>
                    <div class="relative">
                        <input type="password" name="old_password" id="current_password"
                            class="w-full focus:outline-none text-sm font-poppins font-normal text-black block p-3 z-30 rounded-lg border border-gray-light"
                            placeholder="current password">
                        <span class="absolute right-2.5 bottom-2.5 text-xl font-poppins font-medium text-gray px-2"><i
                                class="fa-regular fa-eye text-primary" id="toggleCurrentPassword"></i></span>
                    </div>
                    @error('old_password')
                        <div class="_2OcwfRx4" data-qa="email-status-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="new_password"
                        class="font-poppins font-medium text-base leading-6 text-black">{{ __('New Password') }}</label>
                    <div class="relative">
                        <input type="password" name="password" id="new_password"
                            class="w-full focus:outline-none text-sm font-poppins font-normal text-black block p-3 z-30 rounded-lg border border-gray-light"
                            placeholder="new password">
                        <span class="absolute right-2.5 bottom-2.5 text-xl font-poppins font-medium text-gray px-2"><i
                                class="fa-regular fa-eye text-primary" id="toggleNewPassword"></i></span>
                    </div>
                    @error('password')
                        <div class="_2OcwfRx4" data-qa="email-status-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="confirm_password"
                        class="font-poppins font-medium text-base leading-6 text-black">{{ __('Confirm Password') }}</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="confirm_password"
                            class="w-full focus:outline-none text-sm font-poppins font-normal text-black block p-3 z-30 rounded-lg border border-gray-light"
                            placeholder="confirm password">
                        <span class="absolute right-2.5 bottom-2.5 text-xl font-poppins font-medium text-gray px-2"><i
                                class="fa-regular fa-eye text-primary " id="toggleConfirmPassword"></i></span>
                    </div>
                </div>
                <div class="">
                    <button
                        class="bg-primary text-white font-poppins font-medium text-base leading-6 px-5 py-3 rounded-md w-full">{{ __('Update') }}</button>
                </div>
            </div>
        </form>
        </div>
    </div>

@endsection
