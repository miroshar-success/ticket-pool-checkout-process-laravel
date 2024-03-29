@extends('frontend.master', ['activePage' => 'orgDetail'])
@section('title', __('Organizer Details'))
@section('content')

    <div class="pb-20 bg-scroll min-h-screen" style="background-image: url('images/events.png')">

        {{-- scroll --}}
        {{-- <div class="mr-4 flex justify-end z-20">
            <a type="button" href="{{ url('#') }}" class="back-to-top bg-primary rounded-full p-4 fixed z-20  mt-72">
                <img src="{{ asset('images/downarrow.png') }}" alt="" class="w-3 h-3 z-20">
            </a>
        </div> --}}

        {{-- main --}}
        <div
            class=" 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-0 z-10 relative mt-10">
            <div class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                <div class="flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                    <img src="{{ asset('images/upload/' . $data->image) }}" alt=""
                        class="h-32 w-32 object-cover bg-cover  rounded-full">
                    <div class="mt-4 ml-3 mr-3">
                        <p class="font-poppins font-semibold text-4xl leading-7 text-black">{{ ($data->first_name ?? '') . ' ' .( $data->last_name ?? '')}}</p>
                        <div class="flex mt-8 lg:flex-wrap md:flex-wrap xxsm:flex-wrap">
                            <div class="">
                                <p class="font-poppins font-normal text-lg leading-7 text-gray-200">{{ __('Phone Number') }}
                                </p>
                                <p class="font-poppins font-medium text-xl leading-7 text-black">{{ $data->phone }}</p>
                            </div>
                            @if ($data->country)
                            <div class="sm:mx-10 border-l border-r border-gray-light px-10  xsm:mx-0 xxsm:mx-0">
                                <p class="font-poppins font-normal text-lg leading-7 text-gray-200">{{ __('From') }}</p>
                                <p class="font-poppins font-medium text-xl leading-7 text-black">{{ $data->country }}</p>
                            </div>
                            @else
                            <div class="sm:mx-10 border-l border-gray-light xsm:mx-0 xxsm:mx-0">
                            </div>
                            @endif
                            <div class="">
                                <p class="font-poppins font-normal text-lg leading-7 text-gray-200">
                                    {{ __('Email address') }}</p>
                                <p class="font-poppins font-medium text-xl leading-7 text-black">{{ $data->email }}</p>
                            </div>
                        </div>
                        @if ( $data->bio)
                        <div class="mt-8 ">
                            <p class="font-poppins font-normal text-sm leading-7 text-gray-200">{{ __('Bio') }}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray">{{ $data->bio }}</p>
                        </div>
                        @endif
                    </div>
                    @if (Auth::guard('appuser')->user())
                        <div class="">
                            <button type="button" onclick="follow({{ $data->id }})"
                                class="px-10 py-3 text-white bg-primary text-center font-poppins font-normal text-base leading-6 rounded-md">{{ in_array($data->id, array_filter(explode(',', Auth::guard('appuser')->user()->following))) == true ? __('Unfollow') : __('Follow') . ' +' }}</button>
                        </div>
                    @endif
                </div>

            </div>
            {{-- Latest Events --}}
            <p class="font-poppins font-semibold text-2xl leading-6 text-black pt-10">{{ __('Events') }}&nbsp;( {{count($data->events)}} )</p>
            <div
                class="grid gap-x-7 3xl:grid-cols-4 xl:grid-cols-4 xlg:grid-cols-2 xxmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-5">
                @foreach ($data->events as $item)
                    <div class="shadow-2xl p-5 rounded-lg bg-white">
                        <img src="{{ asset('images/upload/' . $item->image) }}" alt=""
                            class="rounded-lg w-full h-40 bg-cover object-cover ">
                        <p class="font-popping font-semibold text-xl leading-8 pt-2">{{ $item->name }}</p>
                        <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1">
                            {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') }} -
                            {{ Carbon\Carbon::parse($item->end_time)->format('d M Y') }}</p>
                        <div class="flex justify-between mt-7">
                            @php
                                $user = Auth::guard('appuser')->user();
                            @endphp
                            @if (Auth::guard('appuser')->user())
                                @if (Str::contains($user->favorite, $item->id))
                                    <a href="javascript:void(0);" class="like"
                                        onclick="addFavorite('{{ $item->id }}','{{ 'event' }}')"><img
                                            src="{{ url('images/heart-fill.svg') }}" alt=""
                                            class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                @else
                                    <a href="javascript:void(0);" class="like"
                                        onclick="addFavorite('{{ $item->id }}','{{ 'event' }}')"><img
                                            src="{{ url('images/heart.svg') }}" alt=""
                                            class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                @endif
                            @endif
                            <a type="button" 
                                href="{{ url('/event/' . $item->id . '/' . Str::slug($item->name)) }}"
                                class="text-primary text-center font-poppins font-medium text-base leading-7 flex">{{ __('View Details') }}
                                <i class="fa-solid fa-arrow-right w-3 h-3 mt-1.5 ml-2"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
