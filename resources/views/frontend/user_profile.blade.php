@extends('frontend.master', ['activePage' => 'profile'])
@section('title', __('Update Profile'))
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

        <div
            class="mt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
            <div
                class="space-y-5 mt-10 mb-5 1xl:w-[30%] xl:w-[35%] xlg:w-[40%] lg:w-[50%] xxmd:w-[55%] xmd:w-[64%] md:w-[70%] sm:w-[80%]">
                <p class="font-semibold font-poppins text-5xl leading-10 text-black">{{ __('Edit Profile') }}</p>
                <div class="flex justify-left">
                    <img src="{{ asset('images/upload/' . $user->image) }}" alt=""
                        class="bg-cover object-cover rounded-full h-40 w-40 ">
                    <div class="absolute xsm:top-44 left-32 xxsm:top-56">
                        <form method="post" action="#" id="imageUploadForm" enctype="multipart/form-data"
                            style="display: none">
                            @csrf
                            <input type="file" name="image" id="imgUpload" class="hide">
                        </form>
                        <span id="OpenImgUpload">
                            <img src="{{ asset('images/camera.png') }}" alt=""
                                class="bg-cover object-cover bg-primary p-2 rounded-full">
                        </span>
                    </div>
                </div>
                <form action="{{ url('update_user_profile') }}" method="post">
                    @csrf
                    <div class="">
                        <label for="fname"
                            class="font-poppins font-medium text-base leading-6 text-black">{{ __('First Name') }}</label>
                        <input required type="text" name="name" id="" value="{{ $user->name }}"
                            class="w-full text-sm font-poppins font-normal text-black block p-3 z-20 rounded-md border border-gray-light focus:outline-none"
                            placeholder="Deo">
                    </div>
                    <div class="">
                        <label for="lname"
                            class="font-poppins font-medium text-base leading-6 text-black">{{ __('Last Name') }}</label>
                        <input type="text" name="last_name" id="" value="{{ $user->last_name }}"
                            class="w-full text-sm font-poppins font-normal text-black block p-3 z-20 rounded-md border border-gray-light focus:outline-none"
                            placeholder="Deo">
                    </div>
                    <label for="number"
                        class="font-poppins font-medium text-base leading-6 text-black">{{ __('Contact Number') }}</label>
                    <div class="flex space-x-3">
                        <div class="w-[100%]">
                            <input type="text" name="phone" id="" value="{{ $user->phone }}"
                                class="w-full text-sm font-poppins font-normal text-black block p-3 z-20 rounded-md border border-gray-light focus:outline-none"
                                placeholder="john@gmail.com">
                        </div>

                    </div>
                    <div class="">
                        <label for="email"
                            class="font-poppins font-medium text-base leading-6 text-black">{{ __('Email address') }}</label>
                        <input type="email" name="email" id="" value="{{ $user->email }}" disabled
                            class="w-full text-sm font-poppins font-normal text-black block p-3 z-20 rounded-md border border-gray-light focus:outline-none"
                            placeholder="john@gmail.com">
                    </div>
                    <div class="">
                        <label for="bio"
                            class="font-poppins font-medium text-base leading-6 text-black">{{ __('Address') }}</label>
                        <textarea id="message" rows="4" name="address"
                            class="block p-2.5 w-full focus:outline-none text-base leading-6 font-poppins font-normal text-gray-100
                    border border-gray-light rounded-md "
                            placeholder="Type your bio">{{ $user->address }}</textarea>
                    </div>
                    <div class="">
                        <label for="bio"
                            class="font-poppins font-medium text-base leading-6 text-black">{{ __('Bio') }}</label>
                        <textarea id="message" rows="4" name="bio"
                            class="block p-2.5 w-full focus:outline-none text-base leading-6 font-poppins font-normal text-gray-100
                    border border-gray-light rounded-md "
                            placeholder="Type your bio">{{ $user->bio }}</textarea>
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
