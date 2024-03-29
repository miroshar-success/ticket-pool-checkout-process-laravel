@extends('frontend.master', ['activePage' => 'profile'])
@section('title', __('FAQ'))
@section('content')

    <div class="mx-auto w-[60%] ">
        <p
            class="font-poppins mt-5 font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl text-primary leading-10 ">
            {{ __('FAQ ') }}</p>
        <section class="FAQ py-3">
            <div class="container">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-12">
                    @foreach ($data as $item)
                        <div class="col-span-12">
                            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 sm:px-6">
                                    <h3 class="text-lg  font-medium text-gray-900 text-primary">
                                        <span class="font-bold">Q. </span>{{ $item->question }}
                                    </h3>
                                </div>
                                <div class="px-4 py-1 sm:p-6">
                                    <p class="text-base text-gray-500">
                                        <span class="font-bold">A. </span>{{ $item->answer }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if (count($data) == 0)
                <div class="font-poppins font-medium text-lg leading-4 text-black mt-5 capitalize ">
                    {{ __('There are no FAQ added yet') }}
                </div>
            @endif
        </section>

    </div>

@endsection
