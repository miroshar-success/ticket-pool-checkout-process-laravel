@extends('frontend.master', ['activePage' => 'ticket'])
@section('title', __('My Tickets'))
@section('content')
    @php
        $user = Auth::guard('appuser')->user();
    @endphp
    <div class="pb-20 bg-scroll min-h-screen" style="background-image: url('images/events.png')">
        <div
            class="mt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
            <img src="{{ asset('images/topbanner.png') }}" alt="" class="object-cover w-full">
        </div>
        {{-- scroll --}}
        <div class="mr-4 flex justify-end z-20">
            <a type="button" href="{{ url('#') }}" class="back-to-top bg-primary rounded-full p-4 fixed z-20  mt-72">
                <img src="{{ asset('images/downarrow.png') }}" alt="" class="w-3 h-3 z-20">
            </a>
        </div>
        {{-- main --}}
        <div
            class="3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">

            <div class="flex xl:flex-nowrap xlg:flex-wrap xmd:flex-wrap sm:flex-wrap xxsm:flex-wrap">
                <div
                    class="xl:w-[424px] xlg:w-full xmd:w-full rounded-lg shadow-lg -mt-[10%] md:-mt-[5%] sm:-mt-[2%] msm:mt-0 xxsm:mt-0 relative bg-white xl:ml-24 xlg:mx-10 xmd:mx-10 sm:mx-10 h-fit">
                    <div class="p-8">
                        <div class="flex justify-center">
                            <img src="{{ asset('images/upload/' . $user->image) }}" alt=""
                                class="bg-cover object-cover rounded-full h-36 w-36">
                        </div>
                        <p class="font-poppins font-semibold text-2xl leading-8 text-black text-center">{{ $user->name }}
                        </p>
                        <p class="font-poppins font-normal text-base leading-6 text-gray-200 text-center">
                            {{ $user->email }}</p>
                        <div class="flex justify-between pt-7">
                            <p class="font-poppins font-medium text-lg leading-6 text-gray-100">{{ __('Bio') }}</p>
                            <a href="{{ url('/update_profile') }}"><img src="{{ asset('images/edit.png') }}" alt=""
                                    class="bg-cover object-cover"></a>
                        </div>
                        <div class="pt-2">
                            <p class="font-poppins font-normal text-base leading-6 text-gray">{{ $user->bio }}</p>
                        </div>
                        @if ($wallet == 1)
                            <p class="font-poppins font-semibold text-xl">
                                {{ __('Available Wallet Balance') }} : <span class="text-primary">
                                    {{ $user->balance }}</span>
                            </p>
                        @endif
                    </div>
                </div>
                <div class="xl:w-[758px] xlg:w-full xmd:w-full xl:ml-5 xlg:ml-0 xmd:ml-0 pt-10">
                    <div class="mb-4">
                        <ul class="flex flex-wrap text-lg font-medium text-center profile 2xl:space-x-5 1xl:space-x-2 xl:space-x-1 xlg:space-x-6 xmd:space-x-6 md:space-x-1 msm:space-y-0 xxsm:space-y-2"
                            id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                            <li class=" ">
                                <button
                                    class="inline-block  px-2 mb-1 py-1 rounded-md z-20 font-poppins font-normal text-base leaading-6 border border-gray-light focus:outline-none relative"
                                    id="upcoming_events" data-tabs-target="#events" type="button" role="tab"
                                    aria-controls="events"
                                    aria-selected="true">{{ __('Upcoming Event') }}({{ count($ticket['upcoming']) }})</button>
                            </li>
                            <li class="">
                                <button
                                    class="inline-block z-20 px-2 mb-1 py-1 rounded-md font-poppins font-normal text-base leaading-6 border border-gray-light focus:outline-none relative"
                                    id="past_events" data-tabs-target="#past" type="button" role="tab"
                                    aria-controls="past"
                                    aria-selected="false">{{ __('Past Events') }}({{ count($ticket['past']) }})</button>
                            </li>
                            <li class="">
                                <button
                                    class="inline-block z-20 px-2 mb-1 py-1 rounded-md font-poppins font-normal text-base leaading-6 border border-gray-light focus:outline-none relative"
                                    id="saved_blog" data-tabs-target="#blog" type="button" role="tab"
                                    aria-controls="blog" aria-selected="false">{{ __('Liked Blogs') }}
                                    (
                                    {{ count($likedBlogs) }}
                                    )
                                </button>
                            </li>
                            <li class="">
                                <button
                                    class="inline-block z-20 px-2 mb-1 py-1 rounded-md font-poppins font-normal text-base leaading-6 border border-gray-light focus:outline-none relative"
                                    id="follow" data-tabs-target="#following" type="button" role="tab"
                                    aria-controls="following" aria-selected="false">{{ __('Following') }}
                                    (
                                    {{ count($userFollowing) }}
                                    )
                                </button>
                            </li>
                            <li class="">
                                <button
                                    class="inline-block z-20 px-2 mb-1 py-1 rounded-md font-poppins font-normal text-base leaading-6 border border-gray-light focus:outline-none relative"
                                    id="follow" data-tabs-target="#favorite" type="button" role="tab"
                                    aria-controls="favorite" aria-selected="false">{{ __('Liked Events') }}
                                    (
                                    {{ count($likedEvents) }}
                                    )
                                </button>
                            </li>
                        </ul>
                    </div>
                    {{-- scroll --}}
                    <div id="myTabContent">
                        <div class="hidden space-y-5" id="events" role="tabpanel" aria-labelledby="upcoming_events">
                            @forelse ($ticket['upcoming'] as $item)
                                <div
                                    class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                    <div>
                                        <img src="{{ url('images/upload/' . $item->event->image) }}" alt=""
                                            class="h-40 w-40 object-cover bg-cover rounded-lg">
                                    </div>
                                    <a href="{{ url('/my-ticket/' . $item->id) }}">
                                        <div class="sm:ml-5 msm:ml-0 xxsm:ml-0 msm:mt-3 xxsm:mt-3 sm:mt-0">
                                            <p class="font-poppins font-semibold text-2xl leading-8 text-black">
                                                {{ $item->event->name }}</p>

                                            <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">
                                                {{ __('Event Start Date') }}
                                            </p>
                                            <p class="font-poppins font-medium text-base leading-6 text-black pt-1">
                                                {{ Carbon\Carbon::parse($item->event->start_time)->format('d M Y g:i A') }}
                                            </p>
                                            <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">
                                                {{ __('Ticket valid from') }}
                                            </p>
                                            <p class="font-poppins font-medium text-base leading-6 text-black pt-1">
                                                {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') . ' To ' . Carbon\Carbon::parse($item->end_time)->format('d M Y') }}
                                            </p>

                                            <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">
                                                {{ __('Ticket Purchased on.') }}
                                            </p>
                                            <p class="font-poppins font-medium text-base leading-6 text-black pt-1">
                                                {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                            </p>
                                            <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">
                                                {{ __('No. of Tickets') }}
                                            </p>
                                            <p class="font-poppins font-medium text-lg leading-5 text-black pt-2">
                                                {{ $item->quantity }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div
                                    class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                    <p class="font-poppins font-semibold text-xl text-primary">
                                        {{ __('There is no data to show.') }}
                                    </p>
                                </div>
                            @endforelse
                            {{ $ticket['upcoming']->links() }}
                        </div>
                        <div class="hidden space-y-5" id="past" role="tabpanel" aria-labelledby="past_events">
                            @forelse ($ticket['past'] as $item)
                                <div
                                    class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap ">
                                    <div>
                                        <img src="{{ url('images/upload/' . $item->event->image) }}" alt=""
                                            class="h-40 w-40 object-cover bg-cover rounded-lg">
                                    </div>
                                    <a href="{{ url('/my-ticket/' . $item->id) }}">
                                        <div class="sm:ml-5 msm:ml-0 xxsm:ml-0 msm:mt-3 xxsm:mt-3 sm:mt-0">
                                            <div class="sm:ml-5 msm:ml-0 xxsm:ml-0 msm:mt-3 xxsm:mt-3 sm:mt-0">
                                                <p class="font-poppins font-semibold text-2xl leading-8 text-black">
                                                    {{ $item->event->name }}</p>

                                                <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">
                                                    {{ __('Event Start Date') }}
                                                </p>
                                                <p class="font-poppins font-medium text-base leading-6 text-black pt-1">
                                                    {{ Carbon\Carbon::parse($item->event->start_time)->format('d M Y g:i A') }}
                                                </p>
                                                <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">
                                                    {{ __('Ticket valid from') }}
                                                </p>
                                                <p class="font-poppins font-medium text-base leading-6 text-black pt-1">
                                                    {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') . ' To ' . Carbon\Carbon::parse($item->end_time)->format('d M Y') }}
                                                </p>

                                                <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">
                                                    {{ __('Ticket Purchased on.') }}
                                                </p>
                                                <p class="font-poppins font-medium text-base leading-6 text-black pt-1">
                                                    {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                                </p>
                                                <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">
                                                    {{ __('No. of Tickets') }}
                                                </p>
                                                <p class="font-poppins font-medium text-lg leading-5 text-black pt-2">
                                                    {{ $item->quantity }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div
                                    class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                    <p class="font-poppins font-semibold text-xl text-primary">
                                        {{ __('There is no data to show.') }}
                                    </p>
                                </div>
                            @endforelse
                            {{ $ticket['past']->links() }}
                        </div>
                        <div class="hidden space-y-5" id="blog" role="tabpanel" aria-labelledby="saved_blog">
                            @forelse ($likedBlogs as $item)
                                <div
                                    class="flex 3xl:flex-row 2xl:flex-nowrap 1xl:flex-nowrap xl:flex-nowrap xlg:flex-wrap flex-wrap justify-between 3xl:pt-5 xl:pt-5 gap-x-5 xl:w-full xlg:w-full">
                                    <div
                                        class="w-full shadow-lg p-5 rounded-lg flex 3xl:flex-nowrap md:flex-nowrap sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap bg-white xlg:w-full xmd:w-full 3xl:mb-0 xl:mb-0 xlg:mb-5 xxsm:mb-5">
                                        <div class="relative 3xl:w-[60%] xl:w-[60%] xlg:w-[30%] xmd:w-[60%] xxmd:w-[20%]">
                                            <img src="{{ asset('images/upload/' . $item->image) }}" alt=""
                                                class="rounded-lg h-56 w-full">
                                            @if (Auth::guard('appuser')->user())
                                                <div
                                                    class="shadow-lg rounded-lg w-10 h-10 text-center absolute bg-white top-3 left-3">
                                                    @if (Str::contains($user->favorite_blog, $item->id))
                                                        <a href="javascript:void(0);" class="like"
                                                            onclick="addFavorite('{{ $item->id }}','{{ 'blog' }}')"><img
                                                                src="{{ url('images/heart-fill.svg') }}" alt=""
                                                                class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                                    @else
                                                        <a href="javascript:void(0);" class="like"
                                                            onclick="addFavorite('{{ $item->id }}','{{ 'blog' }}')"><img
                                                                src="{{ url('images/heart.svg') }}" alt=""
                                                                class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-4 3xl:w-full xl:w-full xlg:w-full xmd:w-full xxmd:w-[80%]">
                                            <div class="flex justify-between">
                                                <button
                                                    class="px-3 py-1 text-success bg-success-light rounded-full">{{ $item->title }}</button>
                                            </div>
                                            <p class="font-popping font-semibold text-xl leading-8 text-left pt-3">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 150, $end = '...') }}
                                            </p>
                                            <a type="button"
                                                href="{{ url('/blog-detail/' . $item->id . '/' . $item->title) }}"
                                                class=" text-primary font-poppins font-medium text-base leading-7 flex pt-1 justify-end">{{ __('Read More') }}
                                                <i class="fa-solid fa-arrow-right w-3 h-3 mt-1.5 ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                    <p class="font-poppins font-semibold text-xl text-primary">
                                        {{ __('There is no data to show.') }}
                                    </p>
                                </div>
                            @endforelse
                        </div>
                        <div class="hidden space-y-5" id="following" role="tabpanel" aria-labelledby="follow">
                            @forelse ($userFollowing as $item)
                                <div
                                    class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                    <div class="flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                        <img src="{{ asset('images/upload/' . $item->image) }}" alt=""
                                            class="h-32 w-32 object-cover bg-cover rounded-lg">
                                        <div class="mt-4 ml-3 mr-3">
                                            <p class="font-poppins font-semibold text-xl leading-7 text-black">
                                                {{ $item->name }}</p>
                                            <p class="font-poppins font-normal text-base leading-6 text-gray">
                                                {{ $item->bio }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-10">
                                        <button
                                            class="font-poppins font-normal text-base leading-6 text-primary border border-primary-light py-1 px-3 rounded-lg"
                                            onclick="follow({{ $item->id }})">{{ __('Unfollow') }}</button>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                    <p class="font-poppins font-semibold text-xl text-primary">
                                        {{ __('There is no data to show.') }}
                                    </p>
                                </div>
                            @endforelse
                        </div>
                        <div class="hidden space-y-5" id="favorite" role="tabpanel" aria-labelledby="follow">
                            @forelse ($likedEvents as $item)
                                <div
                                    class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                    <div class="flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                        <img src="{{ asset('images/upload/' . $item->image) }}" alt=""
                                            class="h-32 w-32 object-cover bg-cover rounded-lg">
                                        <div class="mt-4 ml-3 mr-3">
                                            <p class="font-poppins font-semibold text-xl leading-7 text-black">
                                                {{ $item->name }}</p>
                                            <p class="font-poppins font-normal text-base leading-6 text-gray">

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                    <p class="font-poppins font-semibold text-xl text-primary">
                                        {{ __('There is no data to show.') }}
                                    </p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
