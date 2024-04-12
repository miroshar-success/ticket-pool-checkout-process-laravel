@extends('frontend.master', ['activePage' => 'frontend.checkout.expressCheckout'])
@section('title', __('Checkout'))
@section('content')
<div class="flex flex-col justify-center container gap -10 m-auto w-[80%] mt-10 mb-10 msm:flex-row msm:mt-20 msm:w-[70%]">
    <div class="flex min-h-full flex-col px-6 py-12 h-112  msm:w-1/2" style="box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.1);">
        <div class="w-full">
            <h2 class="text-left text-2xl font-bold leading-9 tracking-tight text-gray-900">Express Checkout</h2>
        </div>

        <div class="mt-5 w-full">
            <form class="space-y-6" action="{{route('detail_view')}}" method="GET">
                <div>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter your email address">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-[50%] justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">Next</button>
                </div>
            </form>

            <p class="mt-5 text-left text-sm text-gray-500">
                <a href="#" class="font-semibold leading-6 text-pink">Already have an account? Sign In</a>
            </p>
        </div>
    </div>
    <div class="flex min-h-full flex-col px-6 py-12 h-120 relative msm:w-1/2" style="box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.1);">
    @include('frontend.checkout.ticketDetail')
    </div>
</div>

@endsection
