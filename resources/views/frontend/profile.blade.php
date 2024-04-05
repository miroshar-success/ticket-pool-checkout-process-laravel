@extends('frontend.master', ['activePage' => 'profile'])
@section('title',__('User Profile'))
@section('content')

   

    <div class="pb-20 bg-scroll min-h-screen" style="background-image: url('image/events.png')">
      <div
          class="mt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
          <img src="{{asset('image/home2.png')}}" alt="" class="object-cover w-full">
          <div
              class="shadow-2xl rounded-lg w-10 h-10 text-center absolute bg-white md:top-8 xmd:right-6 md:right-6 sm:right-6 xxsm:right-6 xxsm:top-1">
              <a href="javascript:void(0);" class="like"><img src="{{asset('image/camera1.png')}}" alt=""
                      class="object-cover bg-cover bg-black rounded-md"></a>
          </div>
      </div>
      {{-- scroll --}}
      <div class="mr-4 flex justify-end z-20">
          <a type="button" href="{{url('#')}}" class="back-to-top bg-primary rounded-full p-4 fixed z-20  mt-72">
              <img src="{{asset('image/downarrow.png')}}" alt="" class="w-3 h-3 z-20">
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
                          <img src="{{asset('image/user4.png')}}" alt="" class="bg-cover object-cover">
                          <div
                              class="absolute top-36 3xl:left-56 2xl:left-56 1xl:left-54 xl:left-48 xlg:left-[56%] lg:left-[56%] xxmd:left-[58%] md:left-[60%] xmd:left-72 sm:left-56 msm:left-48 xsm:left-44 xxsm:left-40">
                              <img src="{{asset('image/camera.png')}}" alt=""
                                  class="bg-cover object-cover bg-primary p-2 rounded-full">
                          </div>
                      </div>
                      <p class="font-poppins font-semibold text-2xl leading-8 text-black text-center">{{__('Thomas
                          Anree')}}</p>
                      <p class="font-poppins font-normal text-base leading-6 text-gray-200 text-center">
                          {{__('thoma@gmail.com')}}</p>
                      <div class="flex justify-between pt-7">
                          <p class="font-poppins font-medium text-lg leading-6 text-gray-100">{{__('Bio')}}</p>
                          <a href="{{url('/edit_profile')}}"><img src="{{asset('image/edit.png')}}" alt="" class="bg-cover object-cover"></a>
                      </div>
                      <div class="pt-2">
                          <p class="font-poppins font-normal text-base leading-6 text-gray">{{__('Lorem ipsum dolor sit
                              amet, consectetur adipiscing elit. Pellentesque posuere fermentum urna, eu condimentum
                              mauris tempus ut. Donec fermentum blandit aliquet. Etiam dictum dapibus ultricies. Sed vel
                              aliquet libero. Nunc a augue fermentum, pharetra ligula sed, aliquam lacus. Etiam congue ex
                              enim')}}</p>
                      </div>
  
                  </div>
              </div>
              <div class="xl:w-[758px] xlg:w-full xmd:w-full xl:ml-5 xlg:ml-0 xmd:ml-0 pt-10">
                  <div class="mb-4">
                      <ul class="flex flex-wrap text-lg font-medium text-center profile 2xl:space-x-5 1xl:space-x-2 xl:space-x-1 xlg:space-x-6 xmd:space-x-6 md:space-x-1 msm:space-y-0 xxsm:space-y-2"
                          id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                          <li class=" ">
                              <button
                                  class="inline-block px-4 py-3 rounded-md z-20 font-poppins font-normal text-base leaading-6 border border-gray-light focus:outline-none relative"
                                  id="upcoming_events" data-tabs-target="#events" type="button" role="tab"
                                  aria-controls="events" aria-selected="false">{{__('Upcoming Event 5')}}</button>
                          </li>
                          <li class="">
                              <button
                                  class="inline-block z-20 px-4 py-3 rounded-md font-poppins font-normal text-base leaading-6 border border-gray-light focus:outline-none relative"
                                  id="past_events" data-tabs-target="#past" type="button" role="tab" aria-controls="past"
                                  aria-selected="false">{{__('Past events 3')}}</button>
                          </li>
                          <li class="">
                              <button
                                  class="inline-block z-20 px-4 py-3 rounded-md font-poppins font-normal text-base leaading-6 border border-gray-light focus:outline-none relative"
                                  id="saved_blog" data-tabs-target="#blog" type="button" role="tab" aria-controls="blog"
                                  aria-selected="false">{{__('Saved blogs 2')}}</button>
                          </li>
                          <li class="">
                              <button
                                  class="inline-block z-20 px-4 py-3 rounded-md font-poppins font-normal text-base leaading-6 border border-gray-light focus:outline-none relative"
                                  id="follow" data-tabs-target="#following" type="button" role="tab"
                                  aria-controls="following" aria-selected="false">{{__('Following 5')}}</button>
                          </li>
  
                      </ul>
                  </div>
                  <div id="myTabContent">
                      <div class="hidden space-y-5" id="events" role="tabpanel" aria-labelledby="upcoming_events">
                          <div
                              class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap ">
                              <div>
                                  <img src="{{asset('image/himalay.png')}}" alt=""
                                      class="h-40 w-40 object-cover bg-cover rounded-lg">
                              </div>
                              <div class="sm:ml-5 msm:ml-0 xxsm:ml-0 msm:mt-3 xxsm:mt-3 sm:mt-0">
                                  <p class="font-poppins font-semibold text-2xl leading-8 text-black">{{__('Adventure in
                                      Himalayas')}}</p>
                                  <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">{{__('Booking
                                      Date')}}</p>
                                  <p class="font-poppins font-medium text-base leading-6 text-black pt-1">{{__('19 Dec
                                      2021 , 10:00 am')}}</p>
                                  <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">{{__('No. of
                                      tickets')}}</p>
                                  <p class="font-poppins font-medium text-lg leading-5 text-black pt-2">{{__('3')}} <span
                                          class="mt-2 font-poppins font-medium text-sm leading-5 text-primary bg-primary-light py-1 px-3 rounded-lg">{{__('#
                                          123456')}}</span></p>
                              </div>
                          </div>
                          <div
                              class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap ">
                              <div>
                                  <img src="{{asset('image/holi.png')}}" alt=""
                                      class="h-40 w-40 object-cover bg-cover rounded-lg">
                              </div>
                              <div class="sm:ml-5 msm:ml-0 xxsm:ml-0 msm:mt-3 xxsm:mt-3 sm:mt-0">
                                  <p class="font-poppins font-semibold text-2xl leading-8 text-black">{{__('Holi
                                      celebration')}}</p>
                                  <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">{{__('Booking
                                      Date')}}</p>
                                  <p class="font-poppins font-medium text-base leading-6 text-black pt-1">{{__('19 Dec
                                      2021 , 10:00 am')}}</p>
                                  <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">{{__('No. of
                                      tickets')}}</p>
                                  <p class="font-poppins font-medium text-lg leading-5 text-black pt-2">{{__('3')}} <span
                                          class="mt-2 font-poppins font-medium text-sm leading-5 text-primary bg-primary-light py-1 px-3 rounded-lg">{{__('#
                                          123456')}}</span></p>
                              </div>
                          </div>
                          <div
                              class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap ">
                              <div>
                                  <img src="{{asset('image/holi.png')}}" alt=""
                                      class="h-40 w-40 object-cover bg-cover rounded-lg">
                              </div>
                              <div class="sm:ml-5 msm:ml-0 xxsm:ml-0 msm:mt-3 xxsm:mt-3 sm:mt-0">
                                  <p class="font-poppins font-semibold text-2xl leading-8 text-black">{{__('Holi
                                      celebration')}}</p>
                                  <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">{{__('Booking
                                      Date')}}</p>
                                  <p class="font-poppins font-medium text-base leading-6 text-black pt-1">{{__('19 Dec
                                      2021 , 10:00 am')}}</p>
                                  <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">{{__('No. of
                                      tickets')}}</p>
                                  <p class="font-poppins font-medium text-lg leading-5 text-black pt-2">{{__('3')}} <span
                                          class="mt-2 font-poppins font-medium text-sm leading-5 text-primary bg-primary-light py-1 px-3 rounded-lg">{{__('#
                                          123456')}}</span></p>
                              </div>
                          </div>
                      </div>
                      <div class="hidden space-y-5" id="past" role="tabpanel" aria-labelledby="past_events">
                          <div
                              class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap ">
                              <div>
                                  <img src="{{asset('image/himalay.png')}}" alt=""
                                      class="h-40 w-40 object-cover bg-cover rounded-lg">
                              </div>
                              <div class="sm:ml-5 msm:ml-0 xxsm:ml-0 msm:mt-3 xxsm:mt-3 sm:mt-0">
                                  <p class="font-poppins font-semibold text-2xl leading-8 text-black">{{__('Adventure in
                                      Himalayas')}}</p>
                                  <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">{{__('Booking
                                      Date')}}</p>
                                  <p class="font-poppins font-medium text-base leading-6 text-black pt-1">{{__('19 Dec
                                      2021 , 10:00 am')}}</p>
                                  <p class="font-poppins font-normal text-sm leading-5 text-gray-200 pt-3">{{__('No. of
                                      tickets')}}</p>
                                  <p class="font-poppins font-medium text-lg leading-5 text-black pt-2">{{__('3')}} <span
                                          class="mt-2 font-poppins font-medium text-sm leading-5 text-primary bg-primary-light py-1 px-3 rounded-lg">{{__('#
                                          123456')}}</span></p>
                              </div>
                          </div>
  
                      </div>
                      <div class="hidden space-y-5" id="blog" role="tabpanel" aria-labelledby="saved_blog">
                          <div
                              class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap ">
                              <div class="relative ">
                                  <img src="{{asset('image/blog5.png')}}" alt="" class="rounded-lg h-40 w-40">
                                  <div class="shadow-2xl rounded-lg w-10 h-10 text-center absolute bg-white top-3 left-3">
                                      <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}"
                                              alt=""
                                              class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
  
                                  </div>
                              </div>
                              <div class="sm:ml-5 msm:ml-0 xxsm:ml-0 msm:mt-3 xxsm:mt-3 sm:mt-0">
                                  <div class="flex justify-between">
                                      <button
                                          class="px-3 py-1 text-primary bg-primary-light rounded-full">{{__('Music')}}</button>
                                      <p class="font-poppins font-medium text-base leading-6 text-gray">{{__('30 Jan
                                          2022')}}</p>
                                  </div>
                                  <p class="font-popping font-semibold text-xl leading-8 text-left pt-3">{{__('Oscars
                                      2023: LCD Soundsystem, Taylor Swift...')}}</p>
                                  <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('It is
                                      a long established fact that a will')}}</p>
                                  <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('be
                                      distracted by the')}}</p>
                                  <a type="button" href="{{url('/blog_detail')}}"
                                      class=" text-primary font-poppins font-medium text-base leading-7 flex pt-1 justify-end">{{__('Read
                                      More')}}
                                      <img src="{{asset('image/right-purpal.png')}}" alt=""
                                          class="w-3 h-3 mt-1.5 ml-2"></a>
                              </div>
                          </div>
                          <div
                              class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap ">
                              <div class="relative ">
                                  <img src="{{asset('image/blog5.png')}}" alt="" class="rounded-lg h-40 w-40">
                                  <div class="shadow-2xl rounded-lg w-10 h-10 text-center absolute bg-white top-3 left-3">
                                      <a href="javascript:void(0);" class="like"><img src="{{asset('image/heart.svg')}}"
                                              alt=""
                                              class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
  
                                  </div>
                              </div>
                              <div class="sm:ml-5 msm:ml-0 xxsm:ml-0 msm:mt-3 xxsm:mt-3 sm:mt-0">
                                  <div class="flex justify-between">
                                      <button
                                          class="px-3 py-1 text-primary bg-primary-light rounded-full">{{__('Music')}}</button>
                                      <p class="font-poppins font-medium text-base leading-6 text-gray">{{__('30 Jan
                                          2022')}}</p>
                                  </div>
                                  <p class="font-popping font-semibold text-xl leading-8 text-left pt-3">{{__('Oscars
                                      2023: LCD Soundsystem, Taylor Swift...')}}</p>
                                  <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('It is
                                      a long established fact that a will')}}</p>
                                  <p class="font-popping font-normal text-base leading-7 text-gray text-left">{{__('be
                                      distracted by the')}}</p>
                                  <a type="button" href="{{url('/blog_detail')}}"
                                      class=" text-primary font-poppins font-medium text-base leading-7 flex pt-1 justify-end">{{__('Read
                                      More')}}
                                      <img src="{{asset('image/right-purpal.png')}}" alt=""
                                          class="w-3 h-3 mt-1.5 ml-2"></a>
                              </div>
                          </div>
                      </div>
                      <div class="hidden space-y-5" id="following" role="tabpanel" aria-labelledby="follow">
                          <div class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                              <div class="flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                  <img src="{{asset('image/user6.png')}}" alt="" class="h-32 w-32 object-cover bg-cover rounded-lg">
                                  <div class="mt-4 ml-3 mr-3">
                                      <p class="font-poppins font-semibold text-xl leading-7 text-black">{{__('Maria Smith')}}</p>
                                      <p class="font-poppins font-normal text-base leading-6 text-gray">{{__('Dance Informa
                                          is the industrys online dance magazine and news service. Dance Informa is a state of
                                          the art, free, online')}}</p>
                                  </div>
                              </div>
                              <div class="mt-10">
                                  <button class="font-poppins font-normal text-base leading-6 text-primary border border-primary-light py-1 px-3 rounded-lg">{{__('Unfollow')}}</button>
                              </div>
                          </div>
                          <div class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                              <div class="flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                  <img src="{{asset('image/user5.png')}}" alt="" class="h-32 w-32 object-cover bg-cover rounded-lg">
                                  <div class="mt-4 ml-3 mr-3">
                                      <p class="font-poppins font-semibold text-xl leading-7 text-black">{{__('John Deo')}}</p>
                                      <p class="font-poppins font-normal text-base leading-6 text-gray">{{__('Dance Informa
                                          is the industrys online dance magazine and news service. Dance Informa is a state of
                                          the art, free, online')}}</p>
                                  </div>
                              </div>
                              <div class="mt-10">
                                  <button class="font-poppins font-normal text-base leading-6 text-primary border border-primary-light py-1 px-3 rounded-lg">{{__('Unfollow')}}</button>
                              </div>
                          </div>
                          <div class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                              <div class="flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                  <img src="{{asset('image/user6.png')}}" alt="" class="h-32 w-32 object-cover bg-cover rounded-lg">
                                  <div class="mt-4 ml-3 mr-3">
                                      <p class="font-poppins font-semibold text-xl leading-7 text-black">{{__('Maria Smith')}}</p>
                                      <p class="font-poppins font-normal text-base leading-6 text-gray">{{__('Dance Informa
                                          is the industrys online dance magazine and news service. Dance Informa is a state of
                                          the art, free, online')}}</p>
                                  </div>
                              </div>
                              <div class="mt-10">
                                  <button class="font-poppins font-normal text-base leading-6 text-primary border border-primary-light py-1 px-3 rounded-lg">{{__('Unfollow')}}</button>
                              </div>
                          </div>
                          <div class="shadow-2xl p-5 rounded-lg bg-white flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                              <div class="flex sm:flex-nowrap msm:flex-wrap xxsm:flex-wrap">
                                  <img src="{{asset('image/user5.png')}}" alt="" class="h-32 w-32 object-cover bg-cover rounded-lg">
                                  <div class="mt-4 ml-3 mr-3">
                                      <p class="font-poppins font-semibold text-xl leading-7 text-black">{{__('John Deo')}}</p>
                                      <p class="font-poppins font-normal text-base leading-6 text-gray">{{__('Dance Informa
                                          is the industrys online dance magazine and news service. Dance Informa is a state of
                                          the art, free, online')}}</p>
                                  </div>
                              </div>
                              <div class="mt-10">
                                  <button class="font-poppins font-normal text-base leading-6 text-primary border border-primary-light py-1 px-3 rounded-lg">{{__('Unfollow')}}</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  
  </div>
@endsection
