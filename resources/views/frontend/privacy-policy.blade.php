@extends('frontend.master', ['activePage' => null])
@section('title', __('Privacy-policy'))
@section('content')
    <div class=" bg-scroll min-h-screen" style="background-image: url('images/events.png')">
        {{-- scroll --}}
        <div class="mr-4 flex justify-end z-30">
            <a type="button" href="{{url('#')}}" class="scroll-up-button bg-primary rounded-full p-4 fixed z-20  2xl:mt-[49%] xl:mt-[59%] xlg:mt-[68%] lg:mt-[75%] xxmd:mt-[83%] md:mt-[90%]
                    xmd:mt-[90%] sm:mt-[117%] msm:mt-[125%] xsm:mt-[160%]">
                <img src="{{asset('images/downarrow.png')}}" alt="" class="w-3 h-3 z-20">
            </a>
        </div>

        <div
            class="mt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
            <div class="space-y-10 mt-10 mb-5">
                <p class="font-semibold font-poppins text-5xl leading-10 text-black mt-10">{{__('Privacy policy')}}</p>
            </div>
            <p class="font-normal font-poppins text-xl leading-7 text-black-100">
                {!! $policy !!}
            </p>

        </div>
    </div>
@endsection
