@extends('frontend.master', ['activePage' => 'category'])
@section('title', __('All categories'))
@section('content')
    <div class="pb-20 bg-scroll min-h-screen" style="background-image: url('images/events.png')">
        {{-- scroll --}}
        <div class="mr-4 flex justify-end z-30">
            <a type="button" href="{{ url('#') }}"
                class="scroll-up-button bg-primary rounded-full p-4 fixed z-20 mt-[30%]">
                <img src="{{ asset('images/downarrow.png') }}" alt="" class="w-3 h-3 z-20">
            </a>
        </div>
        <div>
            <div class="flex justify-start pt-5 z-10">
                <!-- <p class="font-poppins font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl text-success leading-10 ">
                    {{ __('Categories') }}</p> -->
            </div>
            @if (count($data) == 0)
                <div class="font-poppins font-medium text-lg leading-4 text-black mt-10  capitalize">
                    {{ __('There are no Categories added yet') }}
                </div>
            @endif
            <div class="iconCategoryBrowse">
                <div class="iconCategoryWrapper z-10 relative">
                    @foreach ($data as $item)
                        <a href="{{ url('events-category/' . $item->id) . '/' . Str::slug($item->name) }}">
                            <div class="iconCategoryCard">
                                <div class="iconCategoryCardImageWrapper">
                                    <img src="{{ url('images/upload/' . $item->image) }}" alt="" class="w-full bg-cover object-cover">
                                </div>
                                <p class="iconCategoryCardTitle eds-text-weight--heavy">{{ $item->name }}</p>
                            </div>
                        </a>
                    @endforeach
                    <div class="sm:hidden">
                        <a type="button" href="{{ url('/all-category') }}"
                            class="px-10 py-3 text-success border border-success text-center font-poppins font-normal text-base leading-6 rounded-md flex">{{ __('See all') }}
                            <img src="{{ url('images/right-success.png') }}" alt=""
                                class="w-3 h-3 mt-1.5 ml-2"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
