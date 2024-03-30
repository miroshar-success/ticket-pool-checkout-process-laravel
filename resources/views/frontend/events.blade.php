@extends('frontend.master', ['activePage' => 'event'])
@section('title', __('All Events'))
@section('content')

    <div class="pb-20 bg-scroll min-h-screen">

        {{-- scroll --}}

        <div
            class="pt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-5 xxsm:mx-5 z-10 relative">
            <div class="flex justify-start pt-5 z-10">
                <p
                    class="font-poppins font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl text-primary leading-10 ">
                    {{ __('Events') }}</p>&nbsp;&nbsp;
                <p
                    class="font-poppins font-medium md:text-xl xxsm:text-xl xsm:text-xl sm:text-xl text-primary leading-10 pt-1">
                    ( {{ $events->count() }} )</p>
            </div>
            <div class="mb-4 pt-4">
                <ul class="flex flex-wrap -mb-px text-lg font-medium text-center events xmd:space-y-0 md:space-y-2 sm:space-y-2 xxsm:space-y-2"
                    id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2 ">
                        <button
                            class="inline-block px-2 py-1 rounded-md z-20 font-poppins shadow-md focus:outline-none relative"
                            id="all_events" data-tabs-target="#events" type="button" role="tab" aria-controls="events"
                            aria-selected="false">{{ __('All Events') }}</button>
                    </li>
                    <li class="mr-2">
                        <button
                            class="inline-block z-20 px-2 py-1 rounded-md font-poppins shadow-md focus:outline-none relative"
                            id="online_events" data-tabs-target="#online" type="button" role="tab"
                            aria-controls="online"
                            aria-selected="false">{{ __('Online Events') }}({{ $onlinecount }})</button>
                    </li>
                    <li class="mr-2">
                        <button
                            class="inline-block z-20 px-2 py-1 rounded-md font-poppins shadow-md focus:outline-none relative"
                            id="venue_events" data-tabs-target="#venue" type="button" role="tab" aria-controls="venue"
                            aria-selected="false">{{ __('Venue Events') }}({{ $offlinecount }})</button>
                    </li>
                </ul>
            </div>
            @if (count($events) == 0)
                <div class="font-poppins font-medium text-lg leading-4 text-black mt-10  capitalize">
                    {{ __('There are no events added yet') }}
                </div>
            @endif
            <div id="myTabContent">
                <div class="hidden" id="events" role="tabpanel" aria-labelledby="all_events">
                    <div
                        class="grid gap-x-7 1xl:grid-cols-4 xl:grid-cols-4 xlg:grid-cols-4 xmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-5 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10 z-30 relative">
                        @foreach ($events as $item)
                            <div class="discover-vertical-event-card cursor-pointer relative">
                                <div class="relative">
                                    <a href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}" class="event-card-image__aspect-container cursor-pointer"> 
                                        <img src="{{ url('images/upload/' . $item->image) }}" alt="" class="event-card-image" width="512" height="256">
                                    </a>
                                    
                                    @if (Auth::guard('appuser')->user())
                                        @if (Str::contains($user->favorite, $item->id))
                                            <div class="like cursor-pointer"
                                                onclick="addFavorite('{{ $item->id }}','{{ 'event' }}')"><img
                                                    src="{{ url('images/heart-fill.svg') }}" alt=""
                                                    class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></div>
                                        @else
                                            <div class="like cursor-pointer"
                                                onclick="addFavorite('{{ $item->id }}','{{ 'event' }}')"><img
                                                    src="{{ url('images/heart.svg') }}" alt=""
                                                    class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></div>
                                        @endif
                                    @endif
                                </div>
                                <div class="event-card-details">
                                    <div class="stack">
                                        <a class="event-card-link" href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}">
                                            <h2 class="font-popping font-semibold text-xl leading-8 pt-2">{{ $item->name }}</h2>
                                        </a>
                                        <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1">
                                            {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') }} - {{ Carbon\Carbon::parse($item->start_time)->format('g:i A') }}
{{--                                            {{ Carbon\Carbon::parse($item->end_time)->format('d M Y') }}--}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="hidden" id="online" role="tabpanel" aria-labelledby="online_events">
                    <div
                        class="grid gap-x-7 1xl:grid-cols-4 xl:grid-cols-4 xlg:grid-cols-4 xmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10 z-30 relative">
                        @foreach ($events as $item)
                            @if ($item->type == 'online')
                                <div class="discover-vertical-event-card cursor-pointer relative">
                                    <div class="relative">
                                        <a href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}" class="event-card-image__aspect-container cursor-pointer"> 
                                            <img src="{{ url('images/upload/' . $item->image) }}" alt="" class="event-card-image" width="512" height="256">
                                        </a>
                                        
                                        @if (Auth::guard('appuser')->user())
                                            @if (Str::contains($user->favorite, $item->id))
                                                <div class="like cursor-pointer"
                                                    onclick="addFavorite('{{ $item->id }}','{{ 'event' }}')"><img
                                                        src="{{ url('images/heart-fill.svg') }}" alt=""
                                                        class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></div>
                                            @else
                                                <div class="like cursor-pointer"
                                                    onclick="addFavorite('{{ $item->id }}','{{ 'event' }}')"><img
                                                        src="{{ url('images/heart.svg') }}" alt=""
                                                        class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="event-card-details">
                                        <div class="stack">
                                            <a class="event-card-link" href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}">
                                                <h2 class="font-popping font-semibold text-xl leading-8 pt-2">{{ $item->name }}</h2>
                                            </a>
                                            <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1">
                                                {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') }} -
                                                {{ Carbon\Carbon::parse($item->end_time)->format('d M Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                    </div>
                </div>
                <div class="hidden" id="venue" role="tabpanel" aria-labelledby="venue_events">
                    <div
                        class="grid gap-x-7 1xl:grid-cols-4 xl:grid-cols-4 xlg:grid-cols-4 xmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10 z-30 relative">
                        @foreach ($events as $item)
                            @if ($item->type == 'offline')
                                <div class="discover-vertical-event-card cursor-pointer relative">
                                    <div class="relative">
                                        <a href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}" class="event-card-image__aspect-container cursor-pointer"> 
                                            <img src="{{ url('images/upload/' . $item->image) }}" alt="" class="event-card-image" width="512" height="256">
                                        </a>
                                        
                                        @if (Auth::guard('appuser')->user())
                                            @if (Str::contains($user->favorite, $item->id))
                                                <div class="like cursor-pointer"
                                                    onclick="addFavorite('{{ $item->id }}','{{ 'event' }}')"><img
                                                        src="{{ url('images/heart-fill.svg') }}" alt=""
                                                        class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></div>
                                            @else
                                                <div class="like cursor-pointer"
                                                    onclick="addFavorite('{{ $item->id }}','{{ 'event' }}')"><img
                                                        src="{{ url('images/heart.svg') }}" alt=""
                                                        class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="event-card-details">
                                        <div class="stack">
                                            <a class="event-card-link" href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}">
                                                <h2 class="font-popping font-semibold text-xl leading-8 pt-2">{{ $item->name }}</h2>
                                            </a>
                                            <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1">
                                                {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') }} -
                                                {{ Carbon\Carbon::parse($item->end_time)->format('d M Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
