@extends('layout.app',['activePage' => 'events'])

@section('content') 
    {{-- content --}}
    <div class="pb-20 bg-scroll min-h-screen" style="background-image: url('image/events.png')">
      
         {{-- scroll --}}
        <div class="mr-4 flex justify-end z-30">
            <a type="button" href="{{url('#')}}" class="scroll-up-button bg-primary rounded-full p-4 fixed z-20  2xl:mt-[49%] xl:mt-[59%] xlg:mt-[68%] lg:mt-[75%] xxmd:mt-[83%] md:mt-[90%]
             xmd:mt-[90%] sm:mt-[117%] msm:mt-[125%] xsm:mt-[160%]">
                <img src="{{asset('image/downarrow.png')}}" alt="" class="w-3 h-3 z-20">
            </a>
        </div>       
        
        <div class="mt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
            <div class="absolute bg-blue blur-3xl opacity-10 s:bg-opacity-10 3xl:w-[370px] 3xl:h-[370px] 2xl:w-[300px] 2xl:h-[300px] 1xl:w-[300px] xmd:w-[300px] xmd:h-[300px] sm:w-[200px] sm:h-[300px] xxsm:w-[300px] xxsm:h-[300px] rounded-full -mt-5 2xl:-ml-20 1xl:-ml-20 sm:ml-2 xxsm:-ml-7"></div>
           
            <div class="flex justify-start pt-5 z-10">
                <p class="font-poppins font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl text-blue leading-10 ">{{__('Events ')}}</p>&nbsp;&nbsp;
                <p class="font-poppins font-medium md:text-2xl xxsm:text-xl xsm:text-xl sm:text-xl text-blue leading-10 pt-3">{{__(' (12)')}}</p>               
            </div>
            <div class="mb-4 pt-4">
                <ul class="flex flex-wrap -mb-px text-lg font-medium text-center events xmd:space-y-0 md:space-y-2 sm:space-y-2 xxsm:space-y-2" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2 ">
                        <button class="inline-block p-4 px-6 py-3 rounded-md z-20 font-poppins shadow-md focus:outline-none relative" id="all_events" data-tabs-target="#events"
                         type="button" role="tab" aria-controls="events" aria-selected="false">{{__('All Events')}}</button>
                    </li>
                    <li class="mr-2">
                        <button class="inline-block z-20 px-5 py-3 rounded-md font-poppins shadow-md focus:outline-none relative" 
                        id="online_events" data-tabs-target="#online" type="button" role="tab" aria-controls="online" aria-selected="false">{{__('Online Events (1)')}}</button>
                    </li>
                    <li class="mr-2">
                        <button class="inline-block z-20 px-5 py-3 rounded-md font-poppins shadow-md focus:outline-none relative" 
                        id="venue_events" data-tabs-target="#venue" type="button" role="tab" aria-controls="venue" aria-selected="false">{{__('Venue Events (12)')}}</button>
                    </li>
                    
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden" id="events" role="tabpanel" aria-labelledby="all_events">
                    <div class="grid gap-x-7 1xl:grid-cols-4 xl:grid-cols-3 xlg:grid-cols-3 xmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10 z-30 relative">
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/celebration.png')}}" alt="" class="h-40 rounded-lg w-full object-cover bg-cover">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Bye bye 2021 celebration')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('30 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/himalay.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Adventure in Himalayas')}}</p>
                            <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1">{{__('19 Dec 2021 - 26 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/welcome.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Welcome 2022')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('01 Jan 2022')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/holi.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Holi Celebration 2022')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('10 Jan 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-x-7 1xl:grid-cols-4 xl:grid-cols-3 xlg:grid-cols-3 xmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10 z-30 relative">
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/celebration.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Game Festival Muse')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('30 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event1.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Colors of the Rainbow Art Festival')}}</p>
                            <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1">{{__('19 Dec 2021 - 26 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event7.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Music Divine')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('01 Jan 2022')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event3.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Balloon Festival')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('10 Jan 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-x-7 1xl:grid-cols-4 xl:grid-cols-3 xlg:grid-cols-3 xmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10 z-30 relative">
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event6.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Sushi in One')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('30 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event2.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Ice Sculpture Winter Festival')}}</p>
                            <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1">{{__('19 Dec 2021 - 26 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event8.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Water World Carnival')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('01 Jan 2022')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event4.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Water World Carnival')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('10 Jan 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('/event_detail')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    </div>
                </div>            
                <div class="hidden" id="online" role="tabpanel" aria-labelledby="online_events">
                    <div class="grid gap-x-7 1xl:grid-cols-4 xl:grid-cols-3 xlg:grid-cols-3 xmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10 z-30 relative">
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/celebration.png')}}" alt="" class="h-40 rounded-lg w-full object-cover bg-cover">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Bye bye 2021 celebration')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('30 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                       
                    </div>
                    
                </div>
                <div class="hidden" id="venue" role="tabpanel" aria-labelledby="venue_events">
                    <div class="grid gap-x-7 1xl:grid-cols-4 xl:grid-cols-3 xlg:grid-cols-3 xmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10 z-30 relative">
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/celebration.png')}}" alt="" class="h-40 rounded-lg w-full object-cover bg-cover">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Bye bye 2021 celebration')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('30 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/himalay.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Adventure in Himalayas')}}</p>
                            <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1">{{__('19 Dec 2021 - 26 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/welcome.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Welcome 2022')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('01 Jan 2022')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/holi.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Holi Celebration 2022')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('10 Jan 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-x-7 1xl:grid-cols-4 xl:grid-cols-3 xlg:grid-cols-3 xmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10 z-30 relative">
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/celebration.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Game Festival Muse')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('30 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event1.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Colors of the Rainbow Art Festival')}}</p>
                            <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1">{{__('19 Dec 2021 - 26 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event7.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Music Divine')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('01 Jan 2022')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event3.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Balloon Festival')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('10 Jan 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-x-7 1xl:grid-cols-4 xl:grid-cols-3 xlg:grid-cols-3 xmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10 z-30 relative">
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event6.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Sushi in One')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('30 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event2.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Ice Sculpture Winter Festival')}}</p>
                            <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1">{{__('19 Dec 2021 - 26 Dec 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event8.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Water World Carnival')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('01 Jan 2022')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        <div class="shadow-2xl p-5 rounded-lg bg-white">
                            <img src="{{asset('image/event4.png')}}" alt="" class="h-40 object-cover bg-cover rounded-lg w-full">
                            <p class="font-popping font-semibold text-xl leading-8 pt-2">{{__('Water World Carnival')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray pt-1">{{__('10 Jan 2021')}}</p>
                            <div class="flex justify-between mt-7">
                                <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                <a type="button" href="{{url('#')}}" class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{__('View Details')}} 
                                    <img src="{{asset('image/right-purpal.png')}}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div> 
@endsection
