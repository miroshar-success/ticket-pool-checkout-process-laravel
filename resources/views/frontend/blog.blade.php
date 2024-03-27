@extends('frontend.master', ['activePage' => 'blog'])
@section('title', __('Our Latest Blog'))
@section('content')
    <div class="pb-20 bg-scroll min-h-screen" style="background-images: url('images/events.png')">

        <div
            class="mt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
            <div
                class="absolute bg-warning blur-3xl opacity-10 s:bg-opacity-10 3xl:w-[370px] 3xl:h-[370px] 2xl:w-[300px] 2xl:h-[300px] 1xl:w-[300px] xmd:w-[300px] xmd:h-[300px] sm:w-[200px] sm:h-[300px] xxsm:w-[300px] xxsm:h-[300px] rounded-full -mt-5 2xl:-ml-20 1xl:-ml-20 sm:ml-2 xxsm:-ml-7">
            </div>

            <div class="flex justify-start pt-5 z-10">
                <p
                    class="font-poppins font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl text-warning leading-10 ">
                    {{ __('Blogs') }}</p>&nbsp;&nbsp;
                <p
                    class="font-poppins font-medium md:text-2xl xxsm:text-xl xsm:text-xl sm:text-xl text-warning leading-10 pt-3">
                    ({{ count($blogs) }})</p>
            </div>
            <div class="mb-4 pt-4">
                <ul class="flex flex-wrap -mb-px text-lg font-medium text-center blogs xmd:space-y-0 md:space-y-2 sm:space-y-2 xxsm:space-y-2"
                    id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2 ">
                        <button
                            class="inline-block p-4 px-6 py-3 rounded-md z-20 font-poppins shadow-md focus:outline-none relative"
                            id="all_events" data-tabs-target="#events_all" type="button" role="tab"
                            aria-controls="events_all" aria-selected="false">{{ __('All Blogs') }}</button>
                    </li>
                    @foreach ($category as $item)
                        <li class="mr-2">
                            <button
                                class="inline-block z-20 px-5 py-3 rounded-md font-poppins shadow-md focus:outline-none relative"
                                id="{{ $item->id }}" data-tabs-target="#{{ Str::slug($item->name) }}" type="button"
                                role="tab" aria-controls="{{ Str::slug($item->name) }}"
                                aria-selected="false">{{ $item->name }}</button>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if (count($blogs) == 0)
                <div class="font-poppins font-medium text-lg leading-4 text-black mt-10  capitalize">
                    {{ __('There are no blogs added yet') }}
                </div>
            @endif
            <div id="myTabContent">
                <div class="hidden" id="events_all" role="tabpanel" aria-labelledby="all_events">
                    <div
                        class="flex  2xl:flex-nowrap 1xl:flex-nowrap xl:flex-nowrap xlg:flex-wrap flex-wrap justify-between 3xl:pt-5 xl:pt-5 gap-x-5 xl:w-full xlg:w-full">
                        <div class="grid xl:grid-cols-2 gap-5 lg:grid-cols-1 xxsm:grid-cols-1">
                            @foreach ($blogs as $item)
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
                                                    class="px-3 py-1 text-success bg-success-light rounded-full">{{ $item->category->name }}</button>
                                                <p class="font-poppins font-medium text-base  leading-6 text-gray">
                                                    {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }} </p>
                                            </div>
                                            <p class="font-popping font-bold capitalize text-xl  leading-8 text-left pt-3">
                                                {{ $item->title }}</p>
                                            <p class="font-popping font-normal text-base !leading-7 text-gray text-left">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 150, $end = '...') }}

                                            </p>
                                            <a type="button"
                                                href="{{ url('/blog-detail/' . $item->id . '/' . str::slug($item->title)) }}"
                                                class="mt-5 text-primary font-poppins font-medium text-base leading-7 flex pt-1 justify-end">{{ __('Read More') }}
                                                <i class="fa-solid fa-arrow-right w-3 h-3 mt-1.5 ml-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @foreach ($category as $item)
                    @php
                        $i = 0;
                    @endphp
                    <div class="hidden" id="{{ Str::slug($item->name) }}" role="tabpanel"
                        aria-labelledby="{{ $item->id }}">
                        <div class="grid xl:grid-cols-2 gap-5 lg:grid-cols-1 xxsm:grid-cols-1">
                            @foreach ($blogs as $blog)
                                @if ($blog->category_id == $item->id)
                                    <div
                                        class="flex 3xl:flex-row 2xl:flex-nowrap 1xl:flex-nowrap xl:flex-nowrap xlg:flex-wrap flex-wrap justify-between 3xl:pt-5 xl:pt-5 gap-x-5 xl:w-full xlg:w-full">
                                        <div
                                            class="w-full shadow-lg p-5 rounded-lg flex 3xl:flex-nowrap md:flex-nowrap sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap bg-white xlg:w-full xmd:w-full 3xl:mb-0 xl:mb-0 xlg:mb-5 xxsm:mb-5">
                                            <div
                                                class="relative 3xl:w-[60%] xl:w-[60%] xlg:w-[30%] xmd:w-[60%] xxmd:w-[20%]">
                                                <img src="{{ asset('images/upload/' . $blog->image) }}" alt=""
                                                    class="rounded-lg h-56 w-full">
                                                @if (Auth::guard('appuser')->user())
                                                    <div
                                                        class="shadow-lg rounded-lg w-10 h-10 text-center absolute bg-white top-3 left-3">
                                                        @if (Str::contains($user->favorite_blog, $blog->id))
                                                            <a href="javascript:void(0);" class="like"
                                                                onclick="addFavorite('{{ $blog->id }}','{{ 'blog' }}')"><img
                                                                    src="{{ url('images/heart-fill.svg') }}" alt=""
                                                                    class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                                        @else
                                                            <a href="javascript:void(0);" class="like"
                                                                onclick="addFavorite('{{ $blog->id }}','{{ 'blog' }}')"><img
                                                                    src="{{ url('images/heart.svg') }}" alt=""
                                                                    class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ml-4 3xl:w-full xl:w-full xlg:w-full xmd:w-full xxmd:w-[80%]">
                                                <div class="flex justify-between">
                                                    <button
                                                        class="px-3 py-1 text-success bg-success-light rounded-full">{{ $blog->category->name }}</button>
                                                    <p class="font-poppins font-medium text-base  leading-6 text-gray">
                                                        {{ Carbon\Carbon::parse($blog->created_at)->format('d M Y') }} </p>
                                                </div>
                                                <p
                                                    class="font-popping font-bold capitalize text-xl  leading-8 text-left pt-3">
                                                    {{ $blog->title }}</p>
                                                <p
                                                    class="font-popping font-normal text-base !leading-7 text-gray text-left">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 150, $end = '...') }}
                                                </p>
                                                <a type="button"
                                                    href="{{ url('/blog-detail/' . $blog->id . '/' . str::slug($blog->title)) }}"
                                                    class="mt-5 text-primary font-poppins font-medium text-base leading-7 flex pt-1 justify-end">{{ __('Read More') }}
                                                    <i class="fa-solid fa-arrow-right w-3 h-3 mt-1.5 ml-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $i = 1;
                                    @endphp
                                @endif
                            @endforeach
                            @if ($i == 0)
                                <p class="font-poppins font-normal text-lg leading-7 text-gray-300 pt-5">
                                    {{ __('There is no blog post available in this category') }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
