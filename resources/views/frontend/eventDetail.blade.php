@extends('frontend.master', ['activePage' => 'event'])
@section('title', __('Event Details'))
@php
    $gmapkey = \App\Models\Setting::find(1)->map_key;
@endphp
@section('content')
    {{-- content --}}
    <div class="event-detail-page pb-20 bg-scroll min-h-screen" style="background-image: url('images/events.png')">
        {{-- scroll --}}
        <div class="mr-4 flex justify-end z-30">
            <a type="button" href="{{ url('#') }}"
                class="scroll-up-button bg-primary rounded-full p-4 fixed z-20  2xl:mt-[49%] xl:mt-[59%] xlg:mt-[68%] lg:mt-[75%] xxmd:mt-[83%] md:mt-[90%]
                xmd:mt-[90%] sm:mt-[117%] msm:mt-[125%] xsm:mt-[160%]">
                <img src="{{ asset('images/downarrow.png') }}" alt="" class="w-3 h-3 z-20">
            </a>
        </div>
        <div class="content z-10 relative">
            <div class="flex sm:space-x-6 msm:space-x-0 xxsm:space-x-0 xxmd:flex-row xmd:flex-col xxsm:flex-col">
                <div class="xxmd:w-2/3 xmd:w-full xxsm:w-full">
                    <div class="discover-vertical-event-card relative">
                        @if (Auth::guard('appuser')->user())
                            <div
                                class="rounded-lg w-10 h-10 text-center top-8 xxmd:right-[38%] xmd:right-6 md:right-6 sm:right-6 xxsm:right-6">
                                @if (Str::contains($user->favorite, $data->id))
                                    <a href="javascript:void(0);" class="like"
                                        onclick="addFavorite('{{ $data->id }}','{{ 'event' }}')"><img
                                            src="{{ url('images/heart-fill.svg') }}" alt=""
                                            class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                @else
                                    <a href="javascript:void(0);" class="like"
                                        onclick="addFavorite('{{ $data->id }}','{{ 'event' }}')"><img
                                            src="{{ url('images/heart.svg') }}" alt=""
                                            class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                @endif
                            </div>
                        @endif
                        <img src="{{ url('images/upload/' . $data->image) }}" class="event-image w-full h-96 object-cover"
                            id="eventimage" alt="not found">
                    </div>
                    <div class="mt-8 pb-5">
                        <div class="flex justify-between lg:flex-wrap sm:flex-wrap msm:flex-wrap xxsm:flex-wrap xlg:flex-nowrap">
                            <div class="">
                                <p class="event-title font-semibold text-3xl leading-9 text-black">
                                    {{ $data->name }}</p>
                                @if ($data->rate > 1)
                                    <div class="flex space-x-2 pt-3 ">
                                        @for ($i = 1; $i <= $data->rate; $i++)
                                            <img src="{{ asset('images/star-fill.png') }}" alt="">
                                        @endfor
                                        @for ($i = 5; $i > $data->rate; $i--)
                                            <img src="{{ asset('images/star.png') }}" alt="">
                                        @endfor
                                    </div>
                                @endif
                            </div>                           
                        </div>
                    </div>
                    <section class="simplified-organizer-info" data-testid="simplified-organizer-info" aria-label="Organizer profile">
                        <div class="simplified-organizer-info__profile flex items-center">
                            <div class="simplified-organizer-info__avatar">
                                <img width="56" height="56" src="{{ url('images/upload/' . $data->organization->image) }}" class="bg-cover object-cover" alt="">
                            </div>
                            <div class="simplified-organizer-info__details" data-testid="organizer-info-details">
                                <span class="simplified-organizer-info__name-by">By <strong class="simplified-organizer-info__name-link">{{ $data->organization->first_name .' '. $data->organization->last_name }}</strong></span>
                                <div class="organizer-stats organizer-stats--condensed-full-width">
                                    <div data-testid="followers-count"><span class="organizer-stats__highlight">{{ $data->people }}</span> <span class="organizer-stats__suffix">followers</span></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="bg-white">
                        <p class="mt-10 section-title font-semibold text-2xl leading-8 text-black">{{ __('Date and time') }}</p>
                        <div>
                            <div class="pt-4 flex space-x-3 md:flex-nowrap sm:flex-wrap xxsm:flex-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3A3247" viewBox="0 0 24 24"><path d="M17 11h2V6h-2V4h-2v2H9V4H7v2H5v13h6v-2H7v-7h10zm0 1c2.2 0 4 1.8 4 4s-1.8 4-4 4-4-1.8-4-4 1.8-4 4-4m-.6 5.9 2.9-2.9-.9-.9-2.1 2.1-.7-.8-.8.8z" clip-rule="evenodd"></path></svg>
                                <div class="flex space-x-2 pl-3">
{{--                                    <p class="datetime">--}}
{{--                                        {{ Carbon\Carbon::parse($data->start_time)->format('d') }}--}}
{{--                                    </p>--}}
                                    <p class="datetime">
                                        {{ \Carbon\Carbon::parse($data->start_time)->format('jS') }}
                                    </p>

                                    <p class="datetime">
                                        {{ Carbon\Carbon::parse($data->start_time)->format('M Y') }}</p>
                                </div>
                                <p class="datetime">-</p>
                                <div class="flex space-x-2">
                                    <p class="datetime">
                                        {{ Carbon\Carbon::parse($data->start_time)->format('g:i A') }}
                                    </p>
{{--                                    <p class="datetime">--}}
{{--                                        {{ Carbon\Carbon::parse($data->end_time)->format('') }}</p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 bg-white location-section">
                        <p class="section-title font-semibold text-2xl leading-8 text-black">{{ __('Location') }}</p>
                        <div>
                            <div class="pt-4 flex space-x-6 md:flex-nowrap sm:flex-wrap xxsm:flex-wrap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3A3247" viewBox="0 0 24 24"><path d="M12.067 4C8.934 4 6.4 6.504 6.4 9.6c0 4.2 5.667 10.4 5.667 10.4s5.667-6.2 5.667-10.4c0-3.096-2.534-5.6-5.667-5.6m0 7.6c-1.117 0-2.024-.896-2.024-2s.907-2 2.024-2 2.024.896 2.024 2-.907 2-2.024 2" clip-rule="evenodd"></path></svg>
                                <div class="">
                                    <p class="datetime">
                                        @if ($data->type == 'online')
                                            {{ __('Online Event') }}
                                        @else
                                            {{ $data->address }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 bg-white">
                        <p class="section-title font-semibold text-2xl leading-8 text-black">{{ __('About Event') }}</p>
                        <div class="section-content">
                            <p class="font-normal text-lg leading-7 text-gray pt-5">
                                {!! $data->description !!}
                            </p>
                        </div>  
                    </div>
                    <div class="mt-10 bg-white">
                        <p class="section-title font-semibold text-2xl leading-8 text-black">{{ __('Tags') }}</p>
                        <div class="tags pt-4">
                            @foreach ($tags as $item)
                                <a href="{{ url('/user/tag/' . $item) }}"
                                    class="tag-item">{{ $item }}
                                </a>
                            @endforeach
                        </div>
                    </div>                    
                    <div class="mt-10 bg-white">
                        <p class="section-title font-semibold text-2xl leading-8 text-black">{{ __('About the organiser') }}</p>
                        <div class="mt-4 p-4 bg-white shadow-lg rounded-lg">
                            <a href="{{ route('organizationDetails', ['id' => $data->organization->id]) }}">
                                <div class="mt-3 flex flex-col items-center justify-center">
                                    <div class="organization-image">
                                        <img src="{{ url('images/upload/' . $data->organization->image) }}" class="bg-cover object-cover" alt="">
                                    </div>
                                    <div class="">
                                        <p class="text-organize-by font-normal text-xs leading-4 text-gray-100 text-center">
                                            {{ __('Organised by') }}
                                        </p>
                                        <p class="text-orgniaztaion leading-6 mb-10">
                                            {{  ($data->organization->first_name ?? '') . ' ' . ($data->organization->last_name ?? '') }}
                                        </p>
                                    </div>
                                    
                                    <div class="followers-count">
                                        <span class="organizer-stats__highlight text-center">{{ $data->people }}</span>
                                        <span class="organizer-stats__suffix text-center">followers</span>
                                    </div>
                                </div>
                            </a> 
                        </div>
                    </div>
                </div>
                <div class="xxmd:w-1/3 xmd:w-full xxsm:w-full">
                    <div class="bg-white">
                        <p class="section-title font-semibold text-2xl leading-8 text-black pb-4">{{ __('Image Gallery') }}
                        </p>
                        <div
                            class="grid lg:grid-cols-2 gap-y-5 xxmd:grid-cols-1 xmd:grid-cols-2 sm:grid-cols-2 msm:grid-cols-2 xxsm:grid-cols-1">

                            <div id="eventimage" class=" hover:cursor-pointer"
                                onclick="imagegallery('{{ $data->image }}')">

                                <img src="{{ url('images/upload/' . $data->image) }}"
                                    class="1xl:w-40 1xl:h-24 xlg:h-16 xl:h-20 lg:w-[90%] lg:h-10 xxmd:w-full xxmd:h-32 xmd:w-[90%] msm:w-[90%] xxsm:w-full rounded-md object-cover bg-cover"
                                    alt="">
                            </div>
                            @foreach ($images as $item)
                                @if (strlen($item) > 0)
                                    <div id="eventimage1" class=" hover:cursor-pointer"
                                        onclick="imagegallery('{{ $item }}')"><img
                                            src="{{ url('images/upload/' . $item) }}"
                                            class="1xl:w-40 1xl:h-24 xlg:h-16 xl:h-20 lg:w-[90%] lg:h-10 xxmd:w-full xxmd:h-32 xmd:w-[90%] msm:w-[90%] xxsm:w-full rounded-md object-cover bg-cover"
                                            alt="{{ 'Event Image' }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @if ($data->type == 'offline')
                        <p class="mt-10 section-title font-semibold text-2xl leading-8 text-black pb-2">{{ __('Location') }}</p>
                        <div class="p-4 bg-white shadow-lg rounded-md">
                            <div id="map" style="width:100%;height:400px;"></div>
                        </div>
                    @endif
                </div>
            </div>
            {{-- tickets --}}
            <div class="bg-white mt-10" id="tickets">
                <div class="flex justify-between">
                    <p class="section-title font-semibold  text-3xl leading-9 text-black">{{ __('Tickets') }}</p>
                </div>
                <div
                    class="grid xl:grid-cols-4 xlg:grid-cols-3 xxmd:grid-cols-2 sm:grid-cols-2 msm:grid-cols-1 xxsm:grid-cols-1 pt-5 gap-5">
                    @if(!empty($data->seatsio_eventId))
                        @php $event = $data->seatsio_eventId; $pricing = array(); @endphp
                        @if (count($data->paid_ticket) != 0)
                            @foreach ($data->paid_ticket as $item)
                                @php 
                                    $pricing[] = array(
                                        'category' => $item->ticket_key,
                                        'price' => $item->price
                                    );
                                @endphp
                            @endforeach
                        @endif
                        @if (count($data->free_ticket) != 0)
                            @foreach ($data->free_ticket as $item)
                                @php 
                                    $pricing[] = array(
                                        'category' => $item->ticket_key,
                                        'price' => $item->price
                                    );
                                @endphp
                            @endforeach
                        @endif
                        @php $json_pricing = json_encode($pricing, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); @endphp
                        <div id="chart" style="width:1000px; height:450px;"></div>
                        <script src="https://cdn-eu.seatsio.net/chart.js"></script>
                        <script>

                            var selectedSeats = {};
                            var pricing = {!! $json_pricing !!};
                            var seatsIoIds = [];

                            new seatsio.SeatingChart({
                                divId: 'chart',
                                workspaceKey: '74c425c5-1af8-4ffc-9ad0-3aa488fe13a6',
                                event: "{{$event}}",
                                session: 'continue',
                                pricing: pricing,
                                showMinimap: false,
                                priceFormatter: function(price) {
                                    return '£' + price;
                                },
                                showZoomOutButtonOnMobile: false,
                                onObjectSelected: function (object) {
                                    // add the selected seat id to the array
                                    seatsIoIds.push(object.label);
                                    var ticketKey = object.category.key;
                                    // Increment count and add selected seat label
                                    if (!selectedSeats.hasOwnProperty(ticketKey)) {
                                    selectedSeats[ticketKey] = { count: 0, seats: [] };
                                }
                                    selectedSeats[ticketKey].count++;
                                    selectedSeats[ticketKey].seats.push(object.label);
                                    showPaymentbutton();
                                },
                                onObjectDeselected: function (object) {
                                    // remove the deselected seat id from the array
                                    var index = seatsIoIds.indexOf(object.label);
                                    if (index !== -1) seatsIoIds.splice(index, 1);
                                    
                                    var ticketKey = object.category.key;
                                    if (selectedSeats.hasOwnProperty(ticketKey) && selectedSeats[ticketKey].count > 0) {
                                        selectedSeats[ticketKey].count--;
                                        selectedSeats[ticketKey].seats.splice(selectedSeats[ticketKey].seats.indexOf(object.label), 1);
                                        if (selectedSeats[ticketKey].count === 0) {
                                            delete selectedSeats[ticketKey];
                                        }
                                    }
                                    showPaymentbutton();
                                }
                            }).render();
                            function showPaymentbutton(){
                                if(Object.keys(selectedSeats).length > 0){
                                    $("#pay-seatio").show();
                                } else {
                                    $("#pay-seatio").hide();
                                }
                                $("#selectedSeatsInput").val(JSON.stringify(selectedSeats));
                                $("#seatsIoIds").val(JSON.stringify(seatsIoIds));
                                console.log('Selected Seats:', selectedSeats);
                            }
                        </script>
                    @else
                        @if (count($data->paid_ticket) != 0)

                            @foreach ($data->paid_ticket as $item)
                                <div class="ticket-card relative rounded-lg border border-gray-light p-5 ">
                                    <div class="!h-auto mb-5" style="height: auto;margin-bottom:100px;">
                                        <div class="flex justify-center">
                                            <p class="paid-tag leading-4">{{ __('Price') }}</p>
                                        </div>
                                        <p class="ticket-name leading-7 text-center py-4">
                                            {{ $item->name }}</p>
                                        <div class="ticket-price flex justify-center space-x-2">
                                            <span
                                                class="font-medium text-2xl leading-8 text-center text-black pt-1">{{ __($currency) }}</span>
                                            <p class="font-medium text-5xl leading-10 text-black text-center">
                                                {{ $item->price }}</p>
                                        </div>
                                        <div class="py-4 flex justify-center">
                                            @if ($item->available_qty < 0)
                                                <p class="paid-tag available-ticket text-center py-2 just-center w-fit">
                                                    {{ __('Sold Out') }}</p>
                                            @else
                                                <p class="paid-tag available-ticket text-center py-2 just-center w-fit">
                                                    {{ __('Available') }}</p>
{{--                                                    {{ $item->available_qty }}&nbsp{{ __('Available tickets') }}</p>--}}
                                            @endif
                                        </div>
                                        <div class="section-content">
                                            <p class="font-normal text-base leading-6 text-gray text-left">
{{--                                                {{ $item->description }}--}}
                                            </p>
                                        </div>
                                        <p class="mt-3 font-normal text-base leading-6 text-ticket-sale text-left">
                                            {{ __('Ticket Sale starts') }}
                                        </p>
                                        <p class="font-normal text-base leading-6 text-orange text-left">
                                            {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') }} {{__('till')}}
                                            {{ Carbon\Carbon::parse($item->end_time)->format('d M Y') }}
                                        </p>
                                        
                                    </div>

                                    
                                    @if ($item->available_qty == 0)
                                        <div class="absolute bottom-5" style="width: 89%">
                                            <div class="mt-7  w-full border border-primary rounded-lg flex justify-center">
                                                <a href="#"
                                                    class="font-medium text-base leading-6 text-primary  py-3">{{ __('Sold Out') }}</a>
                                            </div>
                                        </div>
                                    @else
                                        <a type="button"
                                            href="{{ url('/checkout/' . $item->id) }}"
                                            class="common-btn orange-btn text-primary text-center font-medium text-base leading-7 w-full mt-7 flex justify-center">{{ __('Buy Ticket') }}
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                        @if (count($data->free_ticket) != 0)
                            @foreach ($data->free_ticket as $item)
                                <div class="ticket-card relative rounded-lg border border-gray-light p-5">
                                    <div class="flex justify-center">
                                        <p class="paid-tag leading-4">{{ __('Free') }}</p>
                                    </div>
                                    <p class="ticket-name font-medium text-xl leading-7 text-primary text-center py-4">
                                        {{ $item->ticket_number }}</p>
                                    <div class="ticket-price flex justify-center space-x-2">
                                        <span
                                            class="font-medium text-2xl leading-8 text-center text-black pt-1"></span>
                                        <p class="font-medium text-5xl leading-10 text-black text-center">
                                            {{ __('Free') }}</p>
                                    </div>
                                    {{-- when tickets are available --}}
                                    <div class="py-4 flex justify-center">
                                        @if ($item->available_qty == 0)
                                            <p
                                                class="paid-tag font-normal text-lg leading-7 text-danger text-center rounded-full bg-danger-light py-2">
                                                {{ __('No Available tickets') }}</p>
                                        @else
                                            <p
                                                class="paid-tag font-normal text-lg leading-7 text-success text-center bg-success-light rounded-full py-2">
                                                {{ $item->available_qty . ' Available tickets' }}</p>
                                        @endif
                                    </div>
                                    <div class="section-content">
                                        <p class="font-normal text-base leading-6 text-gray text-left">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <p class="mt-3 font-normal text-base leading-6 text-gray text-ticket-sale text-left">
                                        {{ __('Ticket Date') }}
                                    </p>
                                    <p class="font-normal text-base leading-6 text-gray text-orange text-left">
                                        {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') }} -
                                        {{ Carbon\Carbon::parse($item->end_time)->format('d M Y') }}
                                    </p>
                                    @if ($item->available_qty == 0)
                                        <div class="absolute bottom-5" style="width: 89%">
                                            <div class="mt-7  w-full border border-primary rounded-lg flex justify-center">
                                                <a href="#"
                                                    class="font-medium text-base leading-6 text-primary  py-3">{{ __('Sold Out') }}</a>
                                            </div>
                                        </div>
                                    @else
                                        <a type="button"
                                                href="{{ url('/checkout/' . $item->id) }}"
                                                class="common-btn orange-btn text-base leading-7 w-full mt-7 flex justify-center">{{ __('Buy Ticket') }}
                                            </a>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                        @if (count($data->free_ticket) == 0 && count($data->paid_ticket) == 0)
                            <div class="mx-auro w-full">
                                <div class="px-5">
                                    <img src="{{ url('frontend/images/empty.png') }}">
                                    <h6 class=" font-light text-xl leading-9 text-black px-5 text-center">
                                        {{ __('No Tickets found') }}!</h6>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <form id="seatSelectionForm" action="{{ route('checkout') }}" method="POST">
                    @csrf                    
                    <input type="hidden" id="seatsio_eventId" name="seatsio_eventId" value="{{$data->seatsio_eventId}}">
                    <input type="hidden" id="selectedSeatsInput" name="selectedSeats">
                    <input type="hidden" id="seatsIoIds" name="seatsIoIds">
                    <button type="submit" id="pay-seatio" class="font-medium text-lg leading-6 text-white bg-primary w-full rounded-md py-3 mt-10" style="width:50%; display:none;">Proceed</button>
                </form>
            </div>
            {{-- review --}}
            <div class="mt-10 flex items-center">
                <p class="section-title font-semibold text-2xl leading-7 text-black">{{ __('Reviews') }}</p>&nbsp;
                <div class="section-content">
                    <p class="font-medium text-base leading-8 text-black">({{ count($data->review) }})</p>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-md p-4 mt-10">                
                @if (count($data->review) != 0)
                    @foreach ($data->review as $item)
                        <div>
                            <div class="flex justify-between mt-4 sm:flex-wrap xxsm:flex-wrap">
                                <div class="flex sm:flex-wrap xxsm:flex-wrap">
                                    <div class="">
                                        @php
                                            $user = \App\Models\Appuser::find($item->user_id);
                                        @endphp
                                        <img src="{{ asset('images/upload/' . $user->image) }}"
                                            class="w-10 h-10 bg-cover object-cover" alt="">
                                    </div>
                                    <div class="ml-3 ">
                                        <p class="font-medium text-lg leading-6 text-black-100">
                                            {{ $user->name }}</p>

                                    </div>
                                </div>
                                <div class="flex">
                                    <p class="font-medium text-base leading-4 text-gray-200 pt-1 mr-3">
                                        {{ __('Rating : ' . $item->rate) }}</p>
                                    <div class="flex space-x-1">
                                        @for ($i = 1; $i <= $item->rate; $i++)
                                            <img src="{{ asset('images/star-fill.png') }}"
                                                class="h-5 w-5 bg-cover object-cover" alt="">
                                        @endfor

                                    </div>
                                </div>
                            </div>
                            <div class="ml-12 mt-4">
                                <p class="font-normal text-base leading-6 text-gray">
                                    {{ $item->message }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                @endif

            </div>
            {{-- Report Event --}}
            <p class="mt-10 section-title font-semibold text-2xl leading-8 text-black">{{ __('Report Event') }}</p>
            <div class="bg-white shadow-lg rounded-md p-4 mt-10">                
                <form class="form-a" method="post" action="{{ url('report-event') }}">
                    @csrf
                    <div class="">
                        <div class="grid md:grid-cols-2 sm:grid-cols-1 xxsm:grid-cols-1 mt-5 gap-3">
                            <div class=" ">
                                <label for="name"
                                    class="font-normal text-lg leading-7 text-gray-100 pb-2">{{ __('Name') }}</label>
                                <input type="text" name="name"
                                    class="focus:outline-none text-base leading-4 font-normal text-gray-100 block p-3 rounded-md z-20 
                            border border-gray-light w-full"
                                    placeholder="{{ __('Name *') }}">
                            </div>
                            <div class="">
                                <label for="name"
                                    class="font-normal text-lg leading-7 text-gray-100 pb-2">{{ __('Email address') }}</label>
                                <input type="text" name="email"
                                    class="focus:outline-none text-base leading-4 font-normal text-gray-100 block p-3 rounded-md z-20 
                            border border-gray-light w-full"
                                    placeholder="{{ __('Email *') }}">
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 sm:grid-cols-1 xxsm:grid-cols-1 mt-5 gap-3">
                            <div class="w-full">
                                <label for="report_reason"
                                    class="font-normal text-lg leading-7 text-gray-100 pb-2">{{ __('Report Reason') }}</label>
                                <select id="report_reason" name="reason"
                                    class="w-full focus:outline-none text-base leading-4 font-normal text-gray-100 block p-3 rounded-md z-20 
                            border border-gray-light">
                                    <option class="font-normal text-base leading-4 text-gray-100" selected
                                        disabled>
                                        {{ __('Select Reason') }}</option>
                                    <option class="font-normal text-base leading-4 text-gray-100"
                                        value="Canceled Event">
                                        {{ __('Canceled Event') }}</option>
                                    <option class="font-normal text-base leading-4 text-gray-100"
                                        value="Copyright or Trademark Infringement">
                                        {{ __('Copyright or Trademark Infringement') }}</option>
                                    <option class="font-normal text-base leading-4 text-gray-100"
                                        value="Fraudulent of Unauthorized Event">
                                        {{ __('Fraudulent of Unauthorized Event') }}</option>
                                    <option class="font-normal text-base leading-4 text-gray-100"
                                        value="Offensive or Illegal Event">
                                        {{ __('Offensive or Illegal Event') }}</option>
                                    <option class="font-normal text-base leading-4 text-gray-100"
                                        value="Spam">
                                        {{ __('Spam') }}</option>
                                    <option class="font-normal text-base leading-4 text-gray-100"
                                        value="Other">
                                        {{ __('Other') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full mt-5">
                            <textarea id="message" rows="4" required name="message"
                                class="block p-2.5 w-full focus:outline-none text-base leading-4 font-normal text-gray-100
                        border border-gray-light rounded-md"
                                placeholder="{{ __('Describe your message...') }}"></textarea>

                        </div>
                        <input type="hidden" name="event_id" id="" value="{{ $data->id }}">
                        <div class="mt-5 flex justify-end">
                            <button
                                class="common-btn blue-btn text-white text-right font-medium text-lg leading-7 px-5">{{ __('Send Message') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: {{ $data->lat }},
                    lng: {{ $data->lang }}
                },
                zoom: 13
            });
            let marker = new google.maps.Marker({
                position: {
                    lat: {{ $data->lat }},
                    lng: {{ $data->lang }}
                },
                map: map
            });
        }
        // $(document.ready(function){
        //     $("#pay-seatio").on('click',function(){
        //         stripeSession();
        //     });
        // });
                                    
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $gmapkey }}&callback=initMap"></script>

@endsection
