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
            <div class="flex sm:space-x-6 msm:space-x-0 xxsm:space-x-0 xxmd:flex-row xmd:flex-col xxsm:flex-col">
                <div class="xxmd:w-2/3 xmd:w-full xxsm:w-full">
                    <div>
                        <div class="shadow-2xl rounded-lg w-10 h-10 text-center absolute bg-white top-8 xxmd:right-[38%] xmd:right-6 md:right-6 sm:right-6 xxsm:right-6">
                            <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}" alt="" class="object-cover bg-cover fillLike bg-white-light 
                                p-2 rounded-lg"></a>
                        </div>
                        <img src="{{asset('image/night-view.png')}}" class="w-full" alt="">
                    </div>
                    <div class="mt-8 pb-5 bg-white shadow-lg rounded-md">
                        <div class="flex justify-between p-4 lg:flex-wrap sm:flex-wrap msm:flex-wrap xxsm:flex-wrap xlg:flex-nowrap">
                            <div class="">
                                <p class="font-poppins font-semibold text-3xl leading-9 text-black">{{__('Adventure in Himalayas')}}</p>
                                <div class="flex space-x-2 pt-3 ">
                                    <img src="{{asset('image/star-fill.png')}}" alt="">
                                    <img src="{{asset('image/star-fill.png')}}" alt="">
                                    <img src="{{asset('image/star-fill.png')}}" alt="">
                                    <img src="{{asset('image/star-fill.png')}}" alt="">
                                    <img src="{{asset('image/star.png')}}" alt="">
                                </div> 
                            </div>
                            <div class="flex msm:flex-wrap xxsm:flex-wrap">
                                <div class="">
                                    <img src="{{asset('image/user.png')}}" class="w-10 h-10 bg-cover object-cover" alt="">                              
                                </div>
                                <div class="ml-3">
                                    <p class="font-poppins font-normal text-base leading-6 text-gray">{{__('Juliya Gessy')}}</p>
                                    <p class="font-poppins font-normal text-xs leading-4 text-gray-100">{{__('Organize by')}}</p>
                                </div>                            
                            </div>
                        </div>
                        <div class="px-4">                            
                            <div class="pt-4 flex space-x-6 md:flex-nowrap sm:flex-wrap xxsm:flex-wrap">
                                <img src="{{asset('image/calender-icon.png')}}" alt="" class="bg-success-light rounded-md p-2 w-10">
                                <div class="flex space-x-2 ">
                                    <p class="font-poppins font-bold text-4xl leading-10 text-black">{{__('19')}}</p>
                                    <p class="font-poppins font-semibold text-2xl leading-8 text-gray-200 pt-2">{{__('Dec 2021')}}</p>
                                </div>
                                <div class="flex space-x-2">
                                    <p class="font-poppins font-bold text-4xl leading-10 text-black">{{__('26')}}</p>
                                    <p class="font-poppins font-semibold text-2xl leading-8 text-gray-200 pt-2">{{__('Dec 2021')}}</p>
                                </div>
                            </div>
                            <div class="pt-4 flex space-x-6 md:flex-nowrap sm:flex-wrap xxsm:flex-wrap">
                                <img src="{{asset('image/location-icon.png')}}" alt="" class="p-2 w-9 h-10 rounded-md bg-blue-light">
                                <div class="">
                                    <p class="font-poppins font-normal text-lg leading-7 text-gray">{{__('Cecilia Chapman, 711-2880 Nulla St. ,Mankato Mississippi 96522(257) ')}}</p>
                                    <p class="font-poppins font-normal text-lg leading-7 text-gray">{{__('563-7401')}}</p>
                                </div>
                            </div>
                            <div class="pt-4 flex space-x-6 sm:flex-wrap xxsm:flex-wrap">
                                <img src="{{asset('image/user-icon.png')}}" alt="" class="p-2 rounded-md bg-warning-light">
                                <div class="">
                                    <p class="font-poppins font-normal text-lg leading-7 text-gray">{{__('500 Participants')}}</p>
                                </div>
                            </div>
                        </div>                       
                    </div>
                    <div class="mt-10 bg-white shadow-lg rounded-md">
                        <div class="p-4">
                           <p class="font-poppins font-semibold text-2xl leading-8 text-black">{{__('About Event')}}</p>
                           <p class="font-poppins font-normal text-lg leading-7 text-gray pt-5">{{__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words 
                           which don\'t look even slightly believable.If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle
                            of text. ')}}</p>
                        </div>
                                             
                    </div>
                </div>
                <div class="xxmd:w-1/3 xmd:w-full xxsm:w-full">
                    <div class="p-4 bg-white shadow-lg rounded-md">
                        <p class="font-poppins font-semibold text-2xl leading-8 text-black pb-3">{{__('Image Gallery')}}</p>
                        <div class="grid lg:grid-cols-2 gap-y-5 xxmd:grid-cols-1 xmd:grid-cols-2 sm:grid-cols-2 msm:grid-cols-2 xxsm:grid-cols-1">
                            <img src="{{asset('image/e1.png')}}" class="1xl:w-40 1xl:h-24 xlg:h-16 xl:h-20 lg:w-[90%] lg:h-10 xxmd:w-full xxmd:h-32 xmd:w-[90%] msm:w-[90%] xxsm:w-full rounded-md object-cover bg-cover" alt="">
                            <img src="{{asset('image/e2.png')}}" class="1xl:w-40 1xl:h-24 xlg:h-16 xl:h-20 lg:w-[90%] lg:h-10 xxmd:w-full xxmd:h-32 xmd:w-[90%] msm:w-[90%] xxsm:w-full rounded-md object-cover bg-cover" alt="">
                            <img src="{{asset('image/e3.png')}}" class="1xl:w-40 1xl:h-24 xlg:h-16 xl:h-20 lg:w-[90%] lg:h-10 xxmd:w-full xxmd:h-32 xmd:w-[90%] msm:w-[90%] xxsm:w-full rounded-md object-cover bg-cover" alt="">
                            <img src="{{asset('image/e1.png')}}" class="1xl:w-40 1xl:h-24 xlg:h-16 xl:h-20 lg:w-[90%] lg:h-10 xxmd:w-full xxmd:h-32 xmd:w-[90%] msm:w-[90%] xxsm:w-full rounded-md object-cover bg-cover" alt="">
                            <img src="{{asset('image/e2.png')}}" class="1xl:w-40 1xl:h-24 xlg:h-16 xl:h-20 lg:w-[90%] lg:h-10 xxmd:w-full xxmd:h-32 xmd:w-[90%] msm:w-[90%] xxsm:w-full rounded-md object-cover bg-cover" alt="">
                            <img src="{{asset('image/e3.png')}}" class="1xl:w-40 1xl:h-24 xlg:h-16 xl:h-20 lg:w-[90%] lg:h-10 xxmd:w-full xxmd:h-32 xmd:w-[90%] msm:w-[90%] xxsm:w-full rounded-md object-cover bg-cover" alt="">
                            <img src="{{asset('image/e1.png')}}" class="1xl:w-40 1xl:h-24 xlg:h-16 xl:h-20 lg:w-[90%] lg:h-10 xxmd:w-full xxmd:h-32 xmd:w-[90%] msm:w-[90%] xxsm:w-full rounded-md object-cover bg-cover" alt="">
                            <img src="{{asset('image/e2.png')}}" class="1xl:w-40 1xl:h-24 xlg:h-16 xl:h-20 lg:w-[90%] lg:h-10 xxmd:w-full xxmd:h-32 xmd:w-[90%] msm:w-[90%] xxsm:w-full rounded-md object-cover bg-cover" alt="">
                        </div>
                    </div>
                    <div class="p-4 bg-white shadow-lg rounded-md xlg:mt-10 lg:mt-20">
                        <p class="font-poppins font-semibold text-2xl leading-8 text-black pb-3">{{__('Location')}}</p>
                        <img src="{{asset('image/map.png')}}" alt="" class="w-full">
                    </div>
                    <div class="p-4 bg-white shadow-lg rounded-md 1xl:mt-10 xl:mt-24 xlg:mt-40 lg:mt-60">
                        <p class="font-poppins font-semibold text-2xl leading-8 text-black pb-3">{{__('Tags')}}</p>
                        <div class="flex pt-5 px-5">
                            <p class="font-poppins font-normal text-base leading-6 text-gray-100 mr-10">{{__('India')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray-100">{{__('Winter camp')}}</p>
                        </div>
                        <div class="flex py-10 px-5">
                            <p class="font-poppins font-normal text-base leading-6 text-gray-100 mr-10">{{__('Winter camp')}}</p>
                            <p class="font-poppins font-normal text-base leading-6 text-gray-100">{{__('Himalaya')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- tickets --}}
            <div class="bg-white shadow-lg rounded-md p-4 mt-10">
                <div class="flex justify-between">
                    <p class="font-poopins font-semibold  text-3xl leading-9 text-black">{{__('Tickets')}}</p>
                    <p class="font-poppins font-normal text-sm leading-5 text-danger bg-danger-light text-center pt-2 rounded-md p-2">{{__('Booking open from 10-10-2020 01:00 pm to 10-11-2020, 11:59 pm')}}</p>
                </div>
                <div class="grid xl:grid-cols-4 xlg:grid-cols-3 xxmd:grid-cols-2 sm:grid-cols-2 msm:grid-cols-1 xxsm:grid-cols-1 pt-5 gap-5">
                    <div class="rounded-lg border border-gray-light p-5">
                        <div class="flex justify-center">
                            <p class="font-poppins font-medium text-sm leading-4 text-primary text-center rounded-full bg-primary-light w-16 py-1">{{__('Free')}}</p>
                        </div>
                        <p class="font-poppins font-medium text-xl leading-7 text-primary text-center py-4">{{__('BT-2741')}}</p>
                        <div class="flex justify-center space-x-2">
                            <span class="font-poppins font-medium text-2xl leading-8 text-center text-black pt-1">{{__('$')}}</span>
                            <p class="font-poppins font-medium text-5xl leading-10 text-black text-center">{{__('Free')}}</p>
                        </div>
                        <div class="py-4">
                            <p class="font-poppins font-normal text-lg leading-7 text-danger text-center rounded-full bg-danger-light py-2">{{__('No Available tickets')}}</p>
                        </div>
                        <p class="font-poppins font-normal text-base leading-6 text-gray text-left">{{__('It is a long established fact that a reader will be distracted by the 
                        readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                        as opposed to using')}}</p>
                        <div class="mt-7  w-full border border-primary rounded-lg flex justify-center">
                            <a href="#" class="font-poppins font-medium text-base leading-6 text-primary  py-3">{{__('Sold Out')}}</a>
                        </div>
                    </div>
                    <div class="rounded-lg border border-gray-light p-5">
                        <div class="flex justify-center">
                            <p class="font-poppins font-medium text-sm leading-4 text-primary text-center rounded-full bg-primary-light w-16 py-1">{{__('Free')}}</p>
                        </div>
                        <p class="font-poppins font-medium text-xl leading-7 text-primary text-center py-4">{{__('BT-2741')}}</p>
                        <div class="flex justify-center space-x-2">
                            <span class="font-poppins font-medium text-2xl leading-8 text-center text-black pt-1">{{__('$')}}</span>
                            <p class="font-poppins font-medium text-5xl leading-10 text-black text-center">{{__('Free')}}</p>
                        </div>
                        <div class="py-4">
                            <p class="font-poppins font-normal text-lg leading-7 text-success text-center bg-success-light rounded-full py-2">{{__('100 Tickets available')}}</p>
                        </div>
                        <p class="font-poppins font-normal text-base leading-6 text-gray text-left">{{__('It is a long established fact that a reader will be distracted by the 
                        readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                        as opposed to using')}}</p>
                        <div class="mt-7  w-full border border-primary rounded-lg flex justify-center">
                            <a href="#" class="font-poppins font-medium text-base leading-6 text-primary  py-3 flex">{{__('Buy Ticket')}}
                                 <img src="{{asset('image/right-dropdown.png')}}" alt="" class="w-2 ml-2 h-3 mt-1.5"></a>
                        </div>
                    </div>
                    <div class="rounded-lg border border-gray-light p-5">
                        <div class="flex justify-center">
                            <p class="font-poppins font-medium text-sm leading-4 text-danger text-center rounded-full bg-danger-light w-16 py-1">{{__('Paid')}}</p>
                        </div>
                        <p class="font-poppins font-medium text-xl leading-7 text-primary text-center py-4">{{__('BT-2741')}}</p>
                        <div class="flex justify-center space-x-2">
                            <span class="font-poppins font-medium text-2xl leading-8 text-center text-black pt-1">{{__('$')}}</span>
                            <p class="font-poppins font-medium text-5xl leading-10 text-black text-center">{{__('Free')}}</p>
                        </div>
                        <div class="py-4">
                            <p class="font-poppins font-normal text-lg leading-7 text-success text-center bg-success-light rounded-full py-2">{{__('80 Tickets available')}}</p>
                        </div>
                        <p class="font-poppins font-normal text-base leading-6 text-gray text-left">{{__('It is a long established fact that a reader will be distracted by the 
                        readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                        as opposed to using')}}</p>
                        <div class="mt-7  w-full border border-primary rounded-lg flex justify-center">
                            <a href="#" class="font-poppins font-medium text-base leading-6 text-primary  py-3 flex">{{__('Buy Ticket')}}
                                <img src="{{asset('image/right-dropdown.png')}}" alt="" class="w-2 ml-2 h-3 mt-1.5"></a>
                        </div>
                    </div>
                    <div class="rounded-lg border border-gray-light p-5">
                        <div class="flex justify-center">
                            <p class="font-poppins font-medium text-sm leading-4 text-danger text-center rounded-full bg-danger-light w-16 py-1">{{__('Paid')}}</p>
                        </div>
                        <p class="font-poppins font-medium text-xl leading-7 text-primary text-center py-4">{{__('BT-2741')}}</p>
                        <div class="flex justify-center space-x-2">
                            <span class="font-poppins font-medium text-2xl leading-8 text-center text-black pt-1">{{__('$')}}</span>
                            <p class="font-poppins font-medium text-5xl leading-10 text-black text-center">{{__('Free')}}</p>
                        </div>
                        <div class="py-4">
                            <p class="font-poppins font-normal text-lg leading-7 text-success text-center bg-success-light rounded-full py-2">{{__('80 Tickets available')}}</p>
                        </div>
                        <p class="font-poppins font-normal text-base leading-6 text-gray text-left">{{__('It is a long established fact that a reader will be distracted by the 
                        readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                        as opposed to using')}}</p>
                        <div class="mt-7  w-full border border-primary rounded-lg flex justify-center">
                            <a href="#" class="font-poppins font-medium text-base leading-6 text-primary  py-3 flex">{{__('Buy Ticket')}}
                                 <img src="{{asset('image/right-dropdown.png')}}" alt="" class="w-2 ml-2 h-3 mt-1.5"> </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- review --}}
            <div class="bg-white shadow-lg rounded-md p-4 mt-10">
                <div class="flex">
                    <p class="font-poppins font-semibold text-2xl leading-7 text-black">{{__('Reviews')}}</p>&nbsp;
                    <p class="font-poppins font-medium text-base leading-8 text-black">{{__('(50)')}}</p>
                </div>
                <div>
                    <div class="flex justify-between mt-4 sm:flex-wrap xxsm:flex-wrap">
                        <div class="flex sm:flex-wrap xxsm:flex-wrap">
                            <div class="">
                                <img src="{{asset('image/user2.png')}}" class="w-10 h-10 bg-cover object-cover" alt="">                              
                            </div>
                            <div class="ml-3 ">
                                <p class="font-poppins font-medium text-lg leading-6 text-black-100">{{__('Jhon Smith')}}</p>
                                <p class="font-poppins font-normal text-sm leading-5 text-gray-200">{{__('25, Nov 2021')}}</p>
                            </div>                            
                        </div>
                        <div class="flex">
                            <p class="font-poppins font-medium text-base leading-4 text-gray-200 pt-1 mr-3">{{__('Rating: 5.0')}}</p>
                            <div class="flex space-x-1">
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">
                            </div>
    
                        </div>
                    </div>
                    <div class="ml-12 mt-4">
                        <p class="font-poppins font-normal text-base leading-6 text-gray">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac risus a risus elementum vehicula.
                         Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean tristique nisl nec fermentum eleifend. 
                         Fusce tincidunt, tortor a elementum vehicula, magna ligula iaculis lacus, vel feugiat velit felis a metus.')}}</p>
                    </div>
                </div>
                <div class="">
                    <div class="flex justify-between mt-10 sm:flex-wrap xxsm:flex-wrap">
                        <div class="flex sm:flex-wrap xxsm:flex-wrap">
                            <div class="">
                                <img src="{{asset('image/user3.png')}}" class="w-10 h-10 bg-cover object-cover" alt="">                              
                            </div>
                            <div class="ml-3">
                                <p class="font-poppins font-medium text-lg leading-6 text-black-100">{{__('Andrio Gelario')}}</p>
                                <p class="font-poppins font-normal text-sm leading-5 text-gray-200">{{__('24, Nov 2021')}}</p>
                            </div>                            
                        </div>
                        <div class="flex">
                            <p class="font-poppins font-medium text-base leading-4 text-gray-200 pt-1 mr-3">{{__('Rating: 4.0')}}</p>
                            <div class="flex space-x-1">
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">
                            </div>
    
                        </div>
                    </div>
                    <div class="ml-12 mt-4">
                        <p class="font-poppins font-normal text-base leading-6 text-gray">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac risus a risus elementum vehicula.
                         Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean tristique nisl nec fermentum eleifend. 
                         Fusce tincidunt, tortor a elementum vehicula, magna ligula iaculis lacus, vel feugiat velit felis a metus.')}}</p>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mt-10 sm:flex-wrap xxsm:flex-wrap">
                        <div class="flex sm:flex-wrap xxsm:flex-wrap">
                            <div class="">
                                <img src="{{asset('image/user.png')}}" class="w-10 h-10 bg-cover object-cover" alt="">                              
                            </div>
                            <div class="ml-3">
                                <p class="font-poppins font-medium text-lg leading-6 text-black-100">{{__('Juliya Gessy')}}</p>
                                <p class="font-poppins font-normal text-sm leading-5 text-gray-200">{{__('21, Nov 2021')}}</p>
                            </div>                            
                        </div>
                        <div class="flex">
                            <p class="font-poppins font-medium text-base leading-4 text-gray-200 pt-1 mr-3">{{__('Rating: 3.0')}}</p>
                            <div class="flex space-x-1">
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star-fill.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">                              
                                <img src="{{asset('image/star.png')}}" class="h-5 w-5 bg-cover object-cover" alt="">
                            </div>
    
                        </div>
                    </div>
                    <div class="ml-12 mt-4">
                        <p class="font-poppins font-normal text-base leading-6 text-gray">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac risus a risus elementum vehicula.
                         Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean tristique nisl nec fermentum eleifend. 
                         Fusce tincidunt, tortor a elementum vehicula, magna ligula iaculis lacus, vel feugiat velit felis a metus.')}}</p>
                    </div>
                </div>
            </div>
            {{-- Report Event --}}
            <div class="bg-white shadow-lg rounded-md p-4 mt-10">
                <p class="font-poppins font-semibold text-2xl leading-8 text-black">{{__('Report Event')}}</p>
                <div class="">
                    <div class="grid md:grid-cols-2 sm:grid-cols-1 xxsm:grid-cols-1 mt-5">
                        <div class=" ">
                            <label for="name" class="font-poppins font-normal text-lg leading-7 text-gray-100 pb-2">{{__('Name')}}</label>
                            <input type="text" name="name" class="focus:outline-none text-base leading-4 font-poppins font-normal text-gray-100 block p-3 rounded-md z-20 
                            border border-gray-light w-[70%]" placeholder="John Deo"> 
                        </div>
                        <div class="">
                            <label for="name" class="font-poppins font-normal text-lg leading-7 text-gray-100 pb-2">{{__('Email address')}}</label>
                            <input type="text" name="name" class="focus:outline-none text-base leading-4 font-poppins font-normal text-gray-100 block p-3 rounded-md z-20 
                            border border-gray-light w-[70%]" placeholder="John@gmail.com"> 
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 sm:grid-cols-1 xxsm:grid-cols-1 mt-5">
                        <div class="w-[70%]">
                            <label for="report_reason" class="font-poppins font-normal text-lg leading-7 text-gray-100 pb-2">{{__('Report reason')}}</label>  
                            <select id="report_reason" name="report_reason" class="select2 focus:outline-none text-base leading-4 font-poppins font-normal text-gray-100 block p-3 rounded-md z-20 
                            border border-gray-light">
                                <option class="font-poppins font-normal text-base leading-4 text-gray-100" selected>{{__('Select Reason')}}</option>
                                <option class="font-poppins font-normal text-base leading-4 text-gray-100" value="today">{{__('Today')}}</option>
                                <option class="font-poppins font-normal text-base leading-4 text-gray-100" value="tomorrow">{{__('Tomorrow')}}</option>
                                <option class="font-poppins font-normal text-base leading-4 text-gray-100" value="week">{{("This week")}}</option>
                                <option class="font-poppins font-normal text-base leading-4 text-gray-100" value="month">{{__('This Month')}}</option>
                                <option class="font-poppins font-normal text-base leading-4 text-gray-100" value="date">{{__('Choose Date')}}</option>
                            </select> 
                        </div>
                    </div>
                    <div class="md:w-[85%] sm:w-[70%] xxsm:w-[70%] mt-5">
                        <textarea id="message" rows="4" class="block p-2.5 w-full focus:outline-none text-base leading-4 font-poppins font-normal text-gray-100
                        border border-gray-light rounded-md" placeholder="Describe your message..."></textarea>
 
                    </div>
                    <div class="md:w-[85%] sm:w-[70%] xxsm:w-[70%] mt-5 flex justify-end">
                        <button class="bg-primary text-white font-poppins font-medium text-lg leading-7 px-5 py-2 rounded-md">{{__('Send Message')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
