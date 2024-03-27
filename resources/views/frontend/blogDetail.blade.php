@extends('frontend.master', ['activePage' => 'blog'])
@section('title', __('Blog Detail'))
@section('content')

    <div class="pb-20 bg-scroll min-h-screen" style="background-image: url('images/events.png')">
        {{-- scroll --}}
        <div class="mr-4 flex justify-end z-30">
            <a type="button" href="{{ url('#') }}"
                class="scroll-up-button bg-primary rounded-full p-4 fixed z-20  2xl:mt-[49%] xl:mt-[59%] xlg:mt-[68%] lg:mt-[75%] xxmd:mt-[83%] md:mt-[90%]
          xmd:mt-[90%] sm:mt-[117%] msm:mt-[125%] xsm:mt-[160%]">
                <img src="{{ asset('images/downarrow.png') }}" alt="" class="w-3 h-3 z-20">
            </a>
        </div>
        <div
            class=" mt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
            <div>
                @if (Auth::guard('appuser')->user())
                    <div
                        class="shadow-2xl rounded-lg w-10 h-10 text-center absolute bg-white top-8 xmd:right-6 md:right-6 sm:right-6 xxsm:right-6">
                        @if (Str::contains($user->favorite_blog, $data->id))
                            <a href="javascript:void(0);" class="like"
                                onclick="addFavorite('{{ $data->id }}','{{ 'blog' }}')"><img
                                    src="{{ url('images/heart-fill.svg') }}" alt=""
                                    class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                        @else
                            <a href="javascript:void(0);" class="like"
                                onclick="addFavorite('{{ $data->id }}','{{ 'blog' }}')"><img
                                    src="{{ url('images/heart.svg') }}" alt=""
                                    class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                        @endif
                    </div>
                @endif
                <img src="{{ asset('images/upload/' . $data->image) }}" class="mx-auto h-[50%]" height="50p%" width="50%" alt="">
            </div>
            <div
                class="flex justify-center sm:space-x-0 md:space-x-6 msm:space-x-0 xxsm:space-x-0 xxmd:flex-row xmd:flex-col xxsm:flex-col">
                <div class="xxmd:w-2/3 xmd:w-full xxsm:w-full">
                    <div class="mt-10 bg-white shadow-lg rounded-md">
                        <div class="p-4">
                            <p class="font-poppins font-bold text-3xl leading-10 text-black">{{ $data->title }}</p>
                            <div class="flex pt-4">

                                <p class="font-poppins font-medium text-base leading-6 text-gray-200">
                                    <strong>
                                        {{ $data->category->name, '•' }}&nbsp; • &nbsp;
                                    </strong>
                                    {{ Carbon\Carbon::parse($data->created_at)->format('d M Y') }}
                                </p>
                            </div>
                            <div class="pb-4">
                                <p class="font-poppins font-normal text-lg leading-7 text-gray-300 pt-5">
                                    {!! $data->description !!}
                                </p>
                            </div>
                            @foreach ($tags as $item)
                                <a href="{{ url('/user/blog-tag/' . $item) }}"
                                    class="mt-5 px-3 py-1 text-success bg-success-light rounded-full font-poppins font-normal text-base leading-6">{{ $item }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
