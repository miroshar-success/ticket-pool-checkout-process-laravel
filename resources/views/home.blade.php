@extends('layout.app',['activePage' => 'home'])

@section('content')

    {{-- content --}}
    <div class="pb-20 bg-scroll" style="background-image: url('image/Eventright Background.png')">
            <div class="w-full h-full m-auto">
                <div id="default-carousel" class="relative h-full" data-carousel="slide" >
                    <!-- Carousel wrapper -->
                    <div class="overflow-hidden relative h-96" style="height:50vh;">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('image/boys.png')}}" class="block top-1/2 left-1/2 w-full min-h-[500px] object-cover" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('image/home.png')}}" class="block top-1/2 left-1/2 w-full min-h-[500px] object-cover" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('image/home2.png')}}" class="block top-1/2 left-1/2 w-full min-h-[500px] object-cover" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="flex absolute bottom-5 left-3/4  3xl:ml-64 xl:ml-60 xl:-pt-20  z-30 space-x-3">
                        <ol class="carousel-indicators">
                            <li class="inline-block mr-2">
                                <button type="button" class="w-3 h-3 rounded-full text-white" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                            </li>
                            <li class="inline-block mr-2">
                                <button type="button" class="w-3 h-3 rounded-full text-white" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                            </li>
                            <li class="inline-block mr-2">
                                <button type="button" class="w-3 h-3 rounded-full text-white" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </li>
                        </ol>
                    </div>

                    <div class="absolute z-30 3xl:top-1/2 2xl:top-1/2 2xl:mt-2 3xl:mx-52 2xl:mx-60 1xl:top-1/2 1xl:mt-0 1xl:mx-36 xl:top-1/2 xl:mt-3 xl:mx-36 xlg:top-60
                        xlg:mx-32 lg:top-60 lg:mx-36 xxmd:top-60 xxmd:mx-24 xmd:top-12 xmd:mx-32 md:top-20 md:mx-28 sm:top-10 sm:flex-wrap sm:mx-20 msm:flex-wrap msm:mx-16 msm:top-5 xsm:flex-wrap xsm:mx-10 xxsm:flex-wrap xxsm:top-0 xxsm:mx-5 shadow-lg
                        3xl:w-[74%] 1xl:w-[81%] xl:w-[75%] xlg:w-[77%] lg:w-[70%] xxmd:w-[80%] xmd:w-[70%] md:w-[70%] sm:w-[70%] msm:w-[70%] xsm:w-[80%] xxsm:w-[80%]">
                        <p class="text-white font-poppins font-semibold md:text-6xl xxsm:text-4xl pb-5">{{__('Ballet and B-Boys.')}}</p>
                        <a type="button" href="{{url('#')}}" class="px-10 py-3 text-primary bg-white text-center font-poppins font-medium text-lg leading-6 rounded-md">{{__('Book Now')}}</a>
                        <div class="bg-white rounded-lg flex p-6 justify-between mt-8 3xl:flex-nowrap 1xl:flex-nowrap xxmd:flex-nowrap md:flex-wrap sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap">
                            <div class="xmd:w-1/2 md:w-full sm:w-full msm:w-full xsm:w-full xxsm:w-full xmd:py-3 xxmd:py-0">
                                <div class="flex">
                                    <label for="location" class="font-poppins font-medium text-lg leading-4 text-black">{{__('Location')}}</label>
                                </div>
                                <div class="pt-3">
                                    <select id="location" name="location" class="select2 z-10 w-full">
                                        <option class="" selected>{{__('All')}}</option>
                                        <option class=" " value="newyork">{{__('New york')}}</option>
                                        <option class="" value="chicago">{{__('Chicago')}}</option>
                                        <option class="" value="california">{{("California")}}</option>
                                        <option class="" value="portland">{{__('Portland')}}</option>
                                        <option class="" value="oakridge">{{__('Oak Ridge')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="xmd:w-1/2 md:w-full sm:w-full msm:w-full xsm:w-full xxsm:w-full xmd:mx-0 xmd:py-3 xxmd:py-0 xxmd:mx-5 sm:py-3 msm:py-3 xsm:py-3 xxsm:py-3 md:mx-0 md:py-3 sm:mx-0 msm:mx-0 xsm:mx-0 xxsm:mx-0">
                                <div class="flex">
                                    <label for="category" class="font-poppins font-medium text-lg leading-4 text-black">{{__('Category')}}</label>
                                </div>
                                <div class="pt-3">
                                    <select id="category" name="category" class="select2 z-20 w-full">
                                        <option class="text-black font-poppins hover:text-primary hover:bg-primary-light p-2">{{__('All')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="music">{{__('Music')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="party">{{__('Party')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="festival">{{("Festival")}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="learning">{{__('Learning')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="food">{{__('Foods and drinks')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="travel">{{__('Travel and camp')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="health">{{__('Health and fitness')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="film">{{__('Film and media')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="xmd:w-1/2 md:w-full sm:w-full msm:w-full xsm:w-full xxsm:w-full">
                                <div class="flex">
                                    <label for="event" class="font-poppins font-medium text-lg leading-4 text-black">{{__('Event Type')}}</label>
                                </div>
                                <div class="pt-3 ">
                                    <select id="event" name="event" class="select2 z-20 w-full">
                                        <option class="font-poppins font-normal text-sm text-black leading-6" selected>{{__('All')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="online">{{__('Online')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="venue">{{__('Venue')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="xmd:w-1/2 md:w-full sm:w-full msm:w-full xsm:w-full xxsm:w-full xmd:mx-0 xmd:py-0 xxmd:py-0 xxmd:mx-5 sm:py-3 msm:py-3 xsm:py-3 xxsm:py-3 md:mx-0 md:py-3 sm:mx-0 msm:mx-0 xsm:mx-0 xxsm:mx-0">
                                <div class="flex">
                                    <label for="duration" class="font-poppins font-medium text-lg leading-4 text-black">{{__('Duration')}}</label>
                                </div>
                                <div class="pt-3">
                                    <select id="duration" name="duration" class="select2 z-20 w-full">
                                        <option class="font-poppins font-normal text-sm text-black leading-6" selected>{{__('All')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="today">{{__('Today')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="tomorrow">{{__('Tomorrow')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="week">{{("This week")}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="month">{{__('This Month')}}</option>
                                        <option class="font-poppins font-normal text-sm text-black leading-6" value="date">{{__('Choose Date')}}</option>
                                    </select>                            </div>
                            </div>
                            <div class="pt-7">
                                <a type="button" href="{{url('#')}}" class="px-10 py-3 text-white bg-primary text-center font-poppins font-normal text-base leading-6 rounded-md">{{__('Search')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="mr-4 flex justify-end z-20">
            <a type="button" href="{{url('#')}}" class="back-to-top bg-primary rounded-full p-4 fixed z-20  mt-72">
                <img src="{{asset('image/downarrow.png')}}" alt="" class="w-3 h-3 z-20">
            </a>
        </div>

        {{-- main --}}
        <div class="xxmd:mt-20 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 xmd:mt-60 xxmd:pt-0 xxsm:pt-32 xxsm:mt-96 z-10 relative">
            {{-- Latest Events --}}
            <div class="absolute bg-blue blur-3xl opacity-10 s:bg-opacity-10 3xl:w-[370px] 3xl:h-[370px] 2xl:w-[300px] 2xl:h-[300px] 1xl:w-[300px] xmd:w-[300px] xmd:h-[300px] sm:w-[200px] sm:h-[300px] xxsm:w-[300px] xxsm:h-[300px] rounded-full -mt-5 2xl:-ml-20 1xl:-ml-20 sm:ml-2 xxsm:-ml-7"></div>

            <div class="flex sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap justify-between pt-20 mx-5 z-10">
                <div class="">
                    <p class="font-poppins font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl text-blue leading-1 ">{{__('Latest Event')}}</p>
                </div>
                <div>
                    <a type="button" href="{{url('#')}}" class="px-10 py-3 text-blue border border-blue text-center font-poppins font-normal text-base leading-6 rounded-md flex">{{__('See all')}}
                        <img src="{{asset('image/right.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                </div>
            </div>
            <div class="grid gap-x-7 3xl:grid-cols-4 xl:grid-cols-4 xlg:grid-cols-2 xxmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10">
                <div class="shadow-2xl p-5 rounded-lg bg-white">
                    <img src="{{asset('image/himalay.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Adventure in Himalayas')}}</p>
                    <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1">{{__('19 Dec 2021 - 26 Dec 2021')}}</p>
                    <div class="flex justify-between mt-7">
                        <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                        <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}}
                            <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                    </div>
                </div>
                <div class="shadow-2xl p-5 rounded-lg bg-white">
                    <img src="{{asset('image/celebration.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Bye bye 2021 celebration')}}</p>
                    <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('30 Dec 2021')}}</p>
                    <div class="flex justify-between mt-7">
                        <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                        <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}}
                            <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                    </div>
                </div>
                <div class="shadow-2xl p-5 rounded-lg bg-white">
                    <img src="{{asset('image/welcome.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Welcome 2022')}}</p>
                    <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('01 Jan 2022')}}</p>
                    <div class="flex justify-between mt-7">
                        <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                        <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}}
                            <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                    </div>
                </div>
                <div class="shadow-2xl p-5 rounded-lg bg-white">
                    <img src="{{asset('image/holi.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Holi Celebration 2022')}}</p>
                    <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('10 Jan 2021')}}</p>
                    <div class="flex justify-between mt-7">
                        <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                        <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}}
                            <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                    </div>
                </div>
            </div>

            {{-- Feature Categories --}}
            <div class="absolute bg-success blur-3xl opacity-10 s:bg-opacity-10 3xl:w-[370px] 3xl:h-[370px] 2xl:w-[300px] 2xl:h-[300px] 1xl:w-[300px] xmd:w-[300px] xmd:h-[300px] sm:w-[200px] sm:h-[300px] xxsm:w-[300px] xxsm:h-[300px] rounded-full -mt-5 2xl:-ml-20 1xl:-ml-20 sm:ml-2 xxsm:-ml-7"></div>

            <div class="flex sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap justify-between pt-20 mx-5 z-10">
                <div class="">
                    <p class="font-poppins font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl text-success leading-1 ">{{__('Feature Categories')}}</p>
                </div>
                <div>
                    <a type="button" href="{{url('#')}}" class="px-10 py-3 text-success border border-success text-center font-poppins font-normal text-base leading-6 rounded-md flex">{{__('See all')}}
                        <img src="{{asset('image/right-success.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                </div>
            </div>
            <div class="grid gap-x-7 3xl:grid-cols-4 xl:grid-cols-4 xlg:grid-cols-2 xxmd:grid-cols-2 xxmd:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 msm:gapy-7 xxsm:gap-y-7 justify-between pt-10 z-10 relative">
                <div class="shadow-2xl bg-white p-5 rounded-lg">
                    <img src="{{asset('image/music.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 text-center pt-3">{{__('Music')}}</p>
                </div>
                <div class="shadow-2xl bg-white p-5 rounded-lg">
                    <img src="{{asset('image/party.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 text-center pt-3">{{__('Party')}}</p>
                </div>
                <div class="shadow-2xl bg-white p-5 rounded-lg">
                    <img src="{{asset('image/festival.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 text-center pt-3">{{__('Festival')}}</p>
                </div>
                <div class="shadow-2xl bg-white p-5 rounded-lg">
                    <img src="{{asset('image/learning.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 text-center pt-3">{{__('Learning')}}</p>
                </div>
            </div>
            <div class="grid gap-x-7 3xl:grid-cols-4 xl:grid-cols-4 xlg:grid-cols-2 xxmd:grid-cols-2 xxmd:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 msm:gapy-7 xxsm:gap-y-7 justify-between pt-7 z-10 relative">
                <div class="shadow-2xl p-5 rounded-lg bg-white">
                    <img src="{{asset('image/travel.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 text-center pt-3">{{__('Travel and camping')}}</p>
                </div>
                <div class="shadow-2xl p-5 rounded-lg bg-white">
                    <img src="{{asset('image/food.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 text-center pt-3">{{__('Foods and drinks')}}</p>
                </div>
                <div class="shadow-2xl p-5 rounded-lg bg-white">
                    <img src="{{asset('image/health.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 text-center pt-3">{{__('Health and fitness')}}</p>
                </div>
                <div class="shadow-2xl p-5 rounded-lg bg-white">
                    <img src="{{asset('image/film.png')}}" alt="" class="rounded-lg w-full">
                    <p class="font-popping font-semibold text-xl leading-8 text-center pt-3">{{__('Film and media')}}</p>
                </div>
            </div>

            {{-- Latest blogs --}}
            <div class="absolute bg-warning blur-3xl opacity-10 s:bg-opacity-10 3xl:w-[370px] 3xl:h-[370px] 2xl:w-[300px] 2xl:h-[300px] 1xl:w-[300px] xmd:w-[300px] xmd:h-[300px] sm:w-[200px] sm:h-[300px] xxsm:w-[300px] xxsm:h-[300px] rounded-full -mt-5 2xl:-ml-20 1xl:-ml-20 sm:ml-2 xxsm:-ml-7"></div>
            <div class="flex sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap justify-between pt-20 mx-5 z-0">
                <div>
                    <p class="font-poppins font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl text-warning leading-10">{{__('Latest blogs')}}</p>
                </div>
                <div>
                    <a type="button" href="{{url('#')}}" class="px-10 py-3 text-warning border border-warning text-center font-poppins font-normal text-base leading-6 rounded-md flex">{{__('See all')}}
                        <img src="{{asset('image/right-warning.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                </div>
            </div>
            <div class="flex 2xl:flex-nowrap 1xl:flex-nowrap xl:flex-nowrap xlg:flex-wrap flex-wrap justify-between pt-10 z-10 relative gap-x-5">
                <div class="shadow-2xl p-5 rounded-lg flex 3xl:flex-nowrap md:flex-nowrap sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap bg-white xlg:w-full xmd:w-full 3xl:mb-0 xl:mb-0  xlg:mb-5 xxsm:mb-5">
                    <div class="relative 3xl:w-full xl:w-full xlg:w-[20%] xmd:w-full xxmd:w-[20%]">
                        <img src="{{asset('image/blog1.png')}}" alt="" class="rounded-lg">
                        <div class="shadow-2xl rounded-lg w-10 h-10 text-center absolute bg-white top-3 left-3">
                            <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>

                        </div>
                    </div>
                    <div class="ml-4 3xl:w-full xl:w-full xlg:w-[80%] xmd:w-full xxmd:w-[80%]">
                        <div class="flex justify-between bg-white">
                            <button class="px-3 py-1 text-primary bg-primary-light rounded-full">{{__('Music')}}</button>
                            <p class="font-poppins font-medium text-base leading-6 text-gray">{{__('30 Jan 2022')}}</p>
                        </div>
                        <p class="font-popping font-semibold text-xl leading-8 text-left pt-3">{{__('Oscars 2023: LCD Soundsystem, Taylor')}}</p>
                        <p class="font-popping font-semibold text-xl leading-8 text-left">{{__('Swift...')}}</p>
                        <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('It is a long established fact that a will')}}</p>
                        <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('be distracted by the')}}</p>
                        <a type="button" href="{{url('#')}}" class=" text-primary font-poppins font-medium text-base leading-7 flex pt-1 justify-end">{{__('Read More')}}
                            <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                    </div>
                </div>
                <div class="shadow-2xl p-5 rounded-lg flex 3xl:flex-nowrap md:flex-nowrap  sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap bg-white xlg:w-full xmd:w-full 3xl:mb-0 xl:mb-0  xlg:mb-5 xxsm:mb-5">
                    <div class="relative 3xl:w-full xl:w-full xlg:w-[20%] xmd:w-full xxmd:w-[20%]">
                        <img src="{{asset('image/blog1.png')}}" alt="" class="rounded-lg">
                        <div class="shadow-2xl rounded-lg w-10 h-10 text-center absolute bg-white top-3 left-3">
                            <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>

                        </div>
                    </div>
                    <div class="ml-4 3xl:w-full xl:w-full xlg:w-[80%] xmd:w-full xxmd:w-[80%]">
                        <div class="flex justify-between">
                            <button class="px-3 py-1 text-success bg-success-light rounded-full">{{__('Dance')}}</button>
                            <p class="font-poppins font-medium text-base leading-6 text-gray">{{__('30 Jan 2022')}}</p>
                        </div>
                        <p class="font-popping font-semibold text-xl leading-8 text-left pt-3">{{__('Oscars 2023: LCD Soundsystem, Taylor')}}</p>
                        <p class="font-popping font-semibold text-xl leading-8 text-left">{{__('Swift...')}}</p>
                        <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('It is a long established fact that a will')}}</p>
                        <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('be distracted by the')}}</p>
                        <a type="button" href="{{url('#')}}" class=" text-primary font-poppins font-medium text-base leading-7 flex pt-1 justify-end">{{__('Read More')}}
                            <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                    </div>
                </div>
            </div>
            <div class="flex 2xl:flex-nowrap 1xl:flex-nowrap xl:flex-nowrap xlg:flex-wrap flex-wrap justify-between 3xl:pt-5 xl:pt-5 gap-x-5">
                <div class="shadow-2xl p-5 rounded-lg flex 3xl:flex-nowrap md:flex-nowrap sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap bg-white xlg:w-full xmd:w-full 3xl:mb-0 xl:mb-0 xlg:mb-5 xxsm:mb-5">
                    <div class="relative 3xl:w-full xl:w-full xlg:w-[20%] xmd:w-full xxmd:w-[20%]">
                        <img src="{{asset('image/blog1.png')}}" alt="" class="rounded-lg">
                        <div class="shadow-2xl rounded-lg w-10 h-10 text-center absolute bg-white top-3 left-3">
                            <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>

                        </div>
                    </div>
                    <div class="ml-4 3xl:w-full xl:w-full xlg:w-[80%] xmd:w-full xxmd:w-[80%]">
                        <div class="flex justify-between">
                            <button class="px-3 py-1 text-success bg-success-light rounded-full">{{__('Dance')}}</button>
                            <p class="font-poppins font-medium text-base leading-6 text-gray">{{__('30 Jan 2022')}}</p>
                        </div>
                        <p class="font-popping font-semibold text-xl leading-8 text-left pt-3">{{__('Oscars 2023: LCD Soundsystem, Taylor')}}</p>
                        <p class="font-popping font-semibold text-xl leading-8 text-left">{{__('Swift...')}}</p>
                        <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('It is a long established fact that a will')}}</p>
                        <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('be distracted by the')}}</p>
                        <a type="button" href="{{url('#')}}" class=" text-primary font-poppins font-medium text-base leading-7 flex pt-1 justify-end">{{__('Read More')}}
                            <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                    </div>
                </div>
                <div class="shadow-2xl p-5 rounded-lg flex 3xl:flex-nowrap md:flex-nowrap sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap bg-white xlg:w-full xmd:w-full 3xl:mb-0 xl:mb-0  xlg:mb-5 xxsm:mb-5">
                    <div class="relative 3xl:w-full xl:w-full xlg:w-[20%] xmd:w-full xxmd:w-[20%]">
                        <img src="{{asset('image/blog1.png')}}" alt="" class="rounded-lg">
                        <div class="shadow-2xl rounded-lg w-10 h-10 text-center absolute bg-white top-3 left-3">
                            <a class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>

                        </div>
                    </div>
                    <div class="ml-4 3xl:w-full xl:w-full xlg:w-[80%] xmd:w-full xxmd:w-[80%]">
                        <div class="flex justify-between">
                            <button class="px-3 py-1 text-warning bg-warning-light rounded-full">{{__('Health and fitness')}}</button>
                            <p class="font-poppins font-medium text-base leading-6 text-gray">{{__('30 Jan 2022')}}</p>
                        </div>
                        <p class="font-popping font-semibold text-xl leading-8 text-left pt-3">{{__('Oscars 2023: LCD Soundsystem, Taylor')}}</p>
                        <p class="font-popping font-semibold text-xl leading-8 text-left">{{__('Swift...')}}</p>
                        <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('It is a long established fact that a will')}}</p>
                        <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('be distracted by the')}}</p>
                        <a type="button" href="{{url('#')}}" class=" text-primary font-poppins font-medium text-base leading-7 flex pt-1 justify-end">{{__('Read More')}}
                            <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
