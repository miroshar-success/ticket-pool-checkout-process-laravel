@extends('frontend.master', ['activePage' => 'home'])
@section('title', __('Home'))
@section('content')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <div class="bg-scroll h-full">
        <div class="w-full h-full m-auto hidden">
{{--            <img src="{{ url('images/downarrow.png') }}" alt="" class="w-3 h-3 z-20">--}}


{{--            <section class="iconCategoryBrowse" data-testid="icon-category-browse">--}}
{{--            <div class="iconCategoryWrapper">--}}

{{--                @foreach ($category as $item)--}}
{{--                <a href="/b/local/music" data-testid="category-card" data-heap-id="homepage-category-tiles">--}}
{{--                    <div class="iconCategoryCard">--}}
{{--                        <div class="iconCategoryCardImageWrapper">--}}
{{--                            <img src="{{ asset('/images/upload/' . $item->image) }}" class="object-cover h-[600px] w-full mx-auto xxsm:max-msm:h-full" alt="Image 1">--}}
{{--                        </div>--}}
{{--                        <p class="iconCategoryCardTitle eds-text-weight--heavy">{{ $item->name }}</p>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                @endforeach--}}
{{--                --}}
{{--            </div>--}}

{{--            </section>--}}
        </div>

            @if (count($category) == 0)
                <div class="font-poppins font-medium text-lg leading-4 text-black mt-5 ml-5 capitalize">
                    {{ __('There are no category added yet') }}
                </div>
            @endif

{{--            <div class="iconCategoryBrowse">--}}
{{--                <div class="iconCategoryWrapper z-10 relative">--}}
{{--                    @foreach ($category as $item)--}}
{{--                        <a href="{{ url('events-category/' . $item->id) . '/' . Str::slug($item->name) }}">--}}
{{--                            <div class="iconCategoryCard">--}}
{{--                                <div class="iconCategoryCardImageWrapper">--}}
{{--                                    <img src="{{ url('images/upload/' . $item->image) }}" alt="" class="w-full bg-cover object-cover">--}}
{{--                                </div>--}}
{{--                                <p class="iconCategoryCardTitle eds-text-weight--heavy">{{ $item->name }}</p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
        <img src="{{ url('images/topbanner.png') }}" alt="">


        <div id="default-carousel" class="relative" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="your-carousel relative w-full mx-auto overflow-hidden h-1/2">
                    @forelse ($banner as $item)
                        <div class="h-1/2 relative">
                            <a href="{{ url('event/' . $item->event->id . '/' . Str::slug($item->event->name)) }}">
                                <div class="h-1/2 relative">
                                    <img src="{{ asset('/images/upload/' . $item->image) }}"
                                        class="object-cover h-[600px] w-full mx-auto xxsm:max-msm:h-full" alt="Image 1">
                                    <h1
                                        class="font-poppins font-medium leading-6 text-center absolute inset-0 flex items-center justify-center text-5xl text-white drop-shadow-[1px_1px_1px_rgba(0,0,0,0.5)]">
                                        {{ $item->event->name }}</h1>
                                </div>
                            </a>
                        </div>
                    @empty
                    @endforelse
                </div>
                <!-- Custom privious/next button -->
                <!-- <button type="button"
                    class="hidden absolute hs-carousel-prev left-2 top-1/2 md:max-xxmd:top-1/3 transform -translate-y-1/2 bg-primary text-white rounded-full w-10 h-10 md:flex justify-center items-center hover:bg-gray-600">
                    <i class="fas fa-chevron-left opacity-100"></i>
                </button>
                <button type="button"
                    class="hidden absolute hs-carousel-next right-2 top-1/2 md:max-xxmd:top-1/3 transform -translate-y-1/2 bg-primary text-white rounded-full w-10 h-10 md:flex justify-center items-center hover:bg-gray-600">
                    <i class="fas fa-chevron-right"></i>
                </button> -->
                <!-- Carousel wrapper end -->
                {{-- Searchbar --}}
                <div class="main-search-wrapper">
                    <div
                        class="home-events-container search-form">
                        <div
                            class="shadow-md xlg:ml-[7%] xxmd:max-lg:mt-[50%] xxsm:ml-[0%] bg-white rounded-lg flex p-6 justify-between lg:mt-0 md:mt-[5rem] xlg:mt-8 3xl:flex-nowrap 1xl:flex-nowrap xxmd:flex-nowrap md:flex-wrap sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap">
                            <div
                                class=" xmd:w-1/2 md:w-full sm:w-full msm:w-full xsm:w-full xxsm:w-full xmd:mx-0 xmd:py-3 xxmd:py-0 xxmd:mx-5 sm:py-3 msm:py-3 xsm:py-3 xxsm:py-3 md:mx-0 md:py-3 sm:mx-0 msm:mx-0 xsm:mx-0 xxsm:mx-0">
                                <div class="flex">
                                    <label for="category"
                                        class="font-poppins font-medium  leading-4 text-black">{{ __('Category') }}</label>
                                </div>
                                <div class="pt-3">
                                    <form method="post" action="{{ url('all-events') }}">
                                        @csrf
                                        <select id="category" name="category" class="select2 z-20 w-full">
                                            <option
                                                class="text-black font-poppins hover:text-primary hover:bg-primary-light p-2"
                                                value="">
                                                {{ __('All') }}</option>
                                            @foreach ($category as $item)
                                                <option
                                                    class="text-black font-poppins hover:text-primary hover:bg-primary-light p-2"
                                                    value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="xmd:w-1/2 md:w-full sm:w-full msm:w-full xsm:w-full xxsm:w-full">
                                <div class="flex">
                                    <label for="event"
                                        class="font-poppins font-medium  leading-4 text-black">{{ __('Event Type') }}</label>
                                </div>
                                <div class="pt-3 ">
                                    <select id="event" name="type" class="select2 z-20 w-full">
                                        <option class="font-poppins font-normal text-sm text-black leading-6" selected
                                            value="">
                                            {{ __('All') }}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6"
                                            value="online">
                                            {{ __('Online') }}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6"
                                            value="offline">
                                            {{ __('Venue') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div
                                class="xmd:w-1/2 md:w-full sm:w-full msm:w-full xsm:w-full xxsm:w-full xmd:mx-0 xmd:py-0 xxmd:py-0 xxmd:mx-5 sm:py-3 msm:py-3 xsm:py-3 xxsm:py-3 md:mx-0 md:py-3 sm:mx-0 msm:mx-0 xsm:mx-0 xxsm:mx-0">
                                <div class="flex">
                                    <label for="duration"
                                        class="font-poppins font-medium  leading-4 text-black">{{ __('Duration') }}</label>
                                </div>
                                <div class="pt-3">
                                    <select id="duration" name="duration"
                                        class="select2 z-20 w-full border border-gray-300">
                                        <option class="font-poppins font-normal text-sm text-black leading-6 " selected
                                            value="">
                                            {{ __('All') }}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6"
                                            value="Today">
                                            {{ __('Today') }}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6"
                                            value="Tomorrow">
                                            {{ __('Tomorrow') }}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6"
                                            value="ThisWeek">
                                            {{ __('This week') }}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6"
                                            value="date">
                                            {{ __('Choose Date') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div
                                class="xmd:w-1/2 md:w-full sm:w-full msm:w-full xsm:w-full xxsm:w-full xmd:mx-0 xmd:py-0 xxmd:py-0 xxmd:mx-5 sm:py-3 msm:py-3 xsm:py-3 xxsm:py-3 md:mx-0 md:py-3 sm:mx-0 msm:mx-0 xsm:mx-0 xxsm:mx-0 date-section hidden">
                                <div class="flex">
                                    <label for="date"
                                        class="font-poppins font-medium  leading-4 text-black">{{ __('Choose date') }}</label>
                                </div>
                                <div class="pt-3">
                                    <input class=" border rounded form-control form-control-a date"
                                        placeholder="{{ __('Choose date') }}" name="date" id="date">
                                </div>
                            </div>
                            <div class="pt-2">
                                <button type="submit"
                                    class="px-10 py-2 text-white text-sm bg-primary text-center font-poppins font-normal text-base leading-6 rounded-md">
                                    {{ __('Search') }}
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            {{-- </div>  --}}
            {{-- scroll --}}
            <div class="mr-4 flex justify-end">
                <a type="button" href="{{ url('#') }}"
                    class="back-to-top bg-primary rounded-full p-4 fixed z-20  mt-72">
                    <img src="{{ url('images/downarrow.png') }}" alt="" class="w-3 h-3 z-20">
                </a>
            </div>
            {{-- main --}}
            <div
                class="home-events-container latest-events">

                {{-- Feature Categories --}}
            <!-- <div
                class="absolute bg-success blur-3xl opacity-10 s:bg-opacity-10 3xl:w-[370px] 3xl:h-[370px] 2xl:w-[300px] 2xl:h-[300px] 1xl:w-[300px] xmd:w-[300px] xmd:h-[300px] sm:w-[200px] sm:h-[300px] xxsm:w-[300px] xxsm:h-[300px] rounded-full -mt-5 2xl:-ml-20 1xl:-ml-20 sm:ml-2 xxsm:-ml-7">
            </div> -->
            
                {{-- Latest Events --}}            
                <div class="flex sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap justify-between pt-10 z-10">
                    <div class="flex items-center">
                        <p class="home-section-title"> {{ __('Latest Events') }}</p>
                    </div>
                    <div>
                    <!-- class=" xxsm:max-sm:hidden"> -->
                        <a type="button" href="{{ url('/all-events') }}" class="see-all-events">
                            {{ __('Browse events') }}
                            <i class="eds-vector-image">
                                <svg width="24" height="24" class="arrow-right-chunky_svg__eds-icon--arrow-right-chunky_svg" viewBox="0 0 24 24"><path class="arrow-right-chunky_svg__eds-icon--arrow-right-chunky_base" fill-rule="evenodd" clip-rule="evenodd" d="M10.5 5.5L16 11H4v2h12l-5.5 5.5L12 20l8-8-8-8z"></path></svg>
                            </i>
                        </a>
                    </div>
                </div>
                @if (count($events) == 0)
                    <div class="font-poppins font-medium text-lg leading-4 text-black mt-5 ml-5 capitalize">
                        {{ __('There are no events added yet') }}
                    </div>
                @endif
                <div
                    class=" grid gap-x-7 3xl:grid-cols-4 xl:grid-cols-4 xlg:grid-cols-2 xxmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-5 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-6">
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
                                        {{ Carbon\Carbon::parse($item->start_time)->format('jS') }} {{ \Carbon\Carbon::parse($item->start_time)->format('M Y') }} - {{ \Carbon\Carbon::parse($item->start_time)->format('g:i A') }}
{{--                                        {{ Carbon\Carbon::parse($item->end_time)->format('d M Y') }}--}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @if ($loop->iteration == 30)
                        @break
                    @endif
                @endforeach
            </div>            
    </div>
</div>
@endsection
