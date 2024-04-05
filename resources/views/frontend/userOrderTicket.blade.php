@extends('frontend.master', ['activePage' => 'My-Order-Tickets'])
@section('title', __('My Order Tickets'))
@section('content')

    {{-- content --}}
    <div class=" bg-scroll min-h-screen" style="background-image: url('images/events.png')">
        {{-- scroll --}}
        <div class="mr-4 flex justify-end z-30">
            <a type="button" href="{{ url('#') }}"
                class="scroll-up-button bg-primary rounded-full p-4 fixed z-20  2xl:mt-[49%] xl:mt-[59%] xlg:mt-[68%] lg:mt-[75%] xxmd:mt-[83%] md:mt-[90%]
                xmd:mt-[90%] sm:mt-[117%] msm:mt-[125%] xsm:mt-[160%]">
                <img src="{{ asset('images/downarrow.png') }}" alt="" class="w-3 h-3 z-20">
            </a>
        </div>
        <div
            class="mt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
            <div
                class="flex sm:space-x-0 sm:space-y-5 msm:space-x-0 xxsm:space-x-0 xxmd:flex-col xxmd:space-x-0 xxmd:space-y-5 xmd:flex-col xxsm:flex-col lg:flex-col xlg:flex-row xlg:space-x-6">
                <div class="xlg:w-2/3 xmd:w-full xxsm:w-full lg:w-full">
                    <div>

                        <img src="{{ asset('images/upload/' . $order->event->image) }}" class=" w-full h-96 object-cover"
                            alt="">
                    </div>
                    <div class="mt-8 pb-5 bg-white shadow-lg rounded-md">
                        <div
                            class="flex justify-between p-4 lg:flex-wrap sm:flex-wrap msm:flex-wrap xxsm:flex-wrap xlg:flex-nowrap">
                            <div class="">
                                <p class="font-poppins font-semibold text-4xl leading-10 text-gray">
                                    {{ $order->event->name }}</p>
                            </div>
                            <a
                                href="{{ url('/organization/' . $order->organization->id . '/' . $order->organization->name) }}">
                                <div class="flex msm:flex-wrap xxsm:flex-wrap">
                                    <div class="">
                                        <img src="{{ asset('images/upload/' . $order->organization->image) }}"
                                            class="w-10 h-10 bg-cover object-cover" alt="">
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-poppins font-normal text-base leading-6 text-gray">
                                            {{ $order->organization->name }}
                                        </p>
                                        <p class="font-poppins font-normal text-xs leading-4 text-gray-100">
                                            {{ __('Organize by') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @if ($order->order_status == 'Complete')
                            @if ($review == null)
                                <div class="ml-5 ">
                                    <p class="font-poppins font-semibold text-lg leading-10 text-gray">
                                        {{ __('Drop a review') }}</p>
                                    <form method="post" action="{{ url('add-review') }}">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label
                                                    class="font-poppins font-semibold text-lg leading-10 text-gray">{{ __('Rate') }}</label>
                                                <input type="hidden" name="order_id" id="order_id"
                                                    value="{{ $order->id }}">
                                                <input type="hidden" id="rate" name="rate" value="0" required>
                                                <div class="rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="fa fa-star fa-2x" style="color:#d2d2d2"
                                                            onclick="addRate('{{ $i }}');"
                                                            id="rate-{{ $i }}"></i>
                                                    @endfor
                                                </div>
                                                @error('rate')
                                                    <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label
                                                    class="font-poppins font-semibold text-lg leading-10 text-gray">{{ __('Message') }}</label>

                                            </div>
                                            <div>
                                                <textarea name="message" required
                                                    class="shadow appearance-none border rounded w-[50%] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    placeholder="{{ __('Write a review') }}"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="add"
                                                class="px-10 py-3 text-white bg-primary text-center font-poppins font-normal text-base leading-6 rounded-md">{{ __('Submit') }}</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="ml-5">
                                    <p class="font-poppins font-semibold text-lg leading-10 text-gray">
                                        {{ __('Your review') }}</p>
                                    <div class="flex card">
                                        <p class="font-poppins font-medium text-base leading-4 text-gray-200 pt-1 mr-3">
                                            {{ __('Rating : ' . $review->rate) }}</p>
                                        <div class="flex space-x-1">
                                            @for ($i = 1; $i <= $review->rate; $i++)
                                                <img src="{{ asset('images/star-fill.png') }}"
                                                    class="h-5 w-5 bg-cover object-cover" alt="">
                                            @endfor
                                        </div>
                                    </div>
                                    <div class=" mt-4">
                                        <p class="font-poppins font-medium text-base leading-6 text-gray-200">
                                            {{ __('Message : ' . $review->message) }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endif

                        <div class="px-4">
                            <div class="pt-4 flex space-x-6 md:flex-nowrap sm:flex-wrap xxsm:flex-wrap">
                                <img src="{{ asset('images/calender-icon.png') }}" alt=""
                                    class="bg-success-light rounded-md p-2 w-10">
                                <div class="flex space-x-2 ">
                                    <p class="font-poppins font-bold text-4xl leading-10 text-black">
                                        {{ Carbon\Carbon::parse($order->event->start_time)->format('d') }}
                                    </p>
                                    <p class="font-poppins font-semibold text-2xl leading-8 text-gray-200 pt-2">
                                        {{ Carbon\Carbon::parse($order->event->start_time)->format(' M Y') }}
                                    </p>
                                </div>
{{--                                <div class="flex space-x-2">--}}
{{--                                    <p class="font-poppins font-bold text-4xl leading-10 text-black">--}}
{{--                                        {{ Carbon\Carbon::parse($order->event->end_time)->format('d') }}--}}
{{--                                    </p>--}}
{{--                                    <p class="font-poppins font-semibold text-2xl leading-8 text-gray-200 pt-2">--}}
{{--                                        {{ Carbon\Carbon::parse($order->event->end_time)->format('M Y') }}--}}
{{--                                    </p>--}}
{{--                                </div>--}}
                            </div>
                            <div class="pt-4 flex space-x-6 md:flex-nowrap sm:flex-wrap xxsm:flex-wrap">
                                <img src="{{ asset('images/location-icon.png') }}" alt=""
                                    class="p-2 w-9 h-10 rounded-md bg-blue-light">
                                <div class="">
                                    <p class="font-poppins font-normal text-lg leading-7 text-gray">
                                        {{ $order->event->address }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="xlg:w-1/3 xmd:w-full xxsm:w-full lg:w-full xxmd:pb-10 xxsm:pb-10">
                    <div class="p-4 bg-white shadow-lg rounded-md space-y-5">
                        <p class="font-poppins font-semibold text-2xl leading-8 text-black pb-3">{{ __('Ticket Details') }}
                        </p>
                        @foreach ($orderchild as $item)
                            <div class="flex justify-center py-5">
                                <div>
                                    <p class="font-poppins font-semibold text-2xl leading-8 text-black">
                                        {{ __('Ticket Number') }}
                                    </p>
                                    <p class="font-poppins font-normal leading-7 text-gray ml-5">
                                        {{ $item->ticket_number }}
                                    </p>
                                    @if (!empty($item->ticket_number_seatsio))
                                        <p class="font-poppins font-semibold text-2xl leading-8 text-black mt-5">
                                            {{ __('Seat Number') }}
                                        </p>
                                        <p class="font-poppins font-normal leading-7 text-gray ml-5">
                                            {{ $item->ticket_number_seatsio }}
                                        </p>
                                    @endif
                                    {!! QrCode::size(180)->generate($item->ticket_number) !!}
                                </div>
                            </div>
                        @endforeach
                        <div class="flex justify-center pt-3">
                            <p
                                class="font-poppins font-medium text-lg leading-6 text-primary bg-primary-light py-2 px-4 rounded-md">
                                {{ $order->order_id }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-poppins font-normal text-lg leading-7 text-gray-200">{{ __('No. of Tickets') }}
                            </p>
                            <p class="font-poppins font-medium text-lg leading-7 text-gray-300">
                                {{ $order->quantity }}</p>
                        </div>
                        
                            @if (!empty($item->ticket_number_seatsio))
                                @php $ticketCheck = []; @endphp
                                @foreach ($orderchild as $item)
                                    @if(!in_array($item->ticket_id,$ticketCheck))
                                        <div class="flex justify-between">
                                            <p class="font-poppins font-normal text-lg leading-7 text-gray-200">{{ __('Tickets Price') }}
                                            </p>
                                            
                                            <p class="font-poppins font-medium text-lg leading-7 text-gray-300">£ {{ $item->ticket->price }}
                                            </p>
                                        </div>
                                        @php $ticketCheck[] = $item->ticket_id; @endphp
                                    @endif
                                @endforeach
                            @else
                                <div class="flex justify-between">
                                    <p class="font-poppins font-normal text-lg leading-7 text-gray-200">{{ __('Tickets Price') }}
                                    </p>
                                    
                                    <p class="font-poppins font-medium text-lg leading-7 text-gray-300">£ {{ $order->ticket->price }}
                                    </p>
                                </div>
                            @endif
                            
                        
                        <div class="flex justify-between">
                            <p class="font-poppins font-normal text-lg leading-7 text-gray-200">
                                {{ __('Discount Amount') }}</p>
                            <p class="font-poppins font-medium text-lg leading-7 text-gray-300">
                                £ {{ $order->coupon_discount }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-poppins font-normal text-lg leading-7 text-gray-200">
                                {{ __('Booking Fee') }}</p>
                            <p class="font-poppins font-medium text-lg leading-7 text-gray-300">
                                £ {{ $order->tax }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-poppins font-bold text-lg leading-7 text-gray-200"> {{ __('Total amount') }}
                            </p>
                            <p class="font-poppins font-bold text-lg leading-7 text-gray-300">£ {{ $order->payment }}</p>
                        </div>
                        <div class="flex justify-between">
                            @if ($order->ticket_date != '')
                                <p class="font-poppins font-normal text-lg leading-7 text-gray-200">
                                    {{ __('Ticket valid from') }}
                                </p>
                                <p class="font-poppins font-medium text-lg leading-7 text-gray-300">
                                    {{ $order->ticket_date }}</p>
                            @else
                                <p class="font-poppins font-normal text-lg leading-7 text-gray-200">
                                    {{ __('Ticket valid from') }}
                                </p>
                                <p class="font-poppins font-medium text-lg leading-7 text-gray-300">
                                    {{ Carbon\Carbon::parse($order->ticket->start_time)->format('d M Y') . ' To ' . Carbon\Carbon::parse($order->ticket->end_time)->format('d M Y') }}
                                </p>
                            @endif
                        </div>
                        <div class="flex justify-between">
                            @if ($order->event->type == 'online')
                                <p class="font-poppins font-normal text-lg leading-7 text-gray-200">
                                    {{ __('Event Url') }}
                                </p>
                                <p class="font-poppins font-medium text-lg leading-7 text-gray-300">
                                   <a href="{{ $order->event->url }}    " target="_blank" rel="noopener noreferrer">{{ $order->event->url }}</a>
                                </p>
                            @endif
                        </div>
                        <div class="flex justify-between xxsm:flex-wrap sm:flex-nowrap">
                            <a href="{{ url('order-invoice-print/' . $order->id) }}" target="_blank"
                                class="font-poppins font-normal text-sm leading-5 text-success rounded-md px-4 py-2 bg-success-light flex"><img
                                    src="{{ asset('image/printer.png') }}" alt=""
                                    class="">{{ __('Print') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
