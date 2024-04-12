@extends('frontend.master', ['activePage' => 'frontend.checkout.expressCheckout'])
@section('title', __('Checkout'))
@section('content')
<div class="flex flex-col justify-center container gap -10 m-auto w-[80%] mt-10 mb-10 msm:flex-row msm:mt-20 msm:w-[70%]">
    <div class="flex min-h-full flex-col px-6 py-12 h-112  msm:w-1/2" style="box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.1);">
        <div class="w-full">
            <h2 class="text-left text-2xl font-bold leading-9 tracking-tight text-gray-900">Payment Details</h2>
        </div>

        <div class="mt-5 w-full">
            <form class="space-y-6" action="#" method="POST">
                <div class="flex items-center mb-4" style="margin-top: 20px">
                    <input id="card" name="payment" type="radio" value="card" class="w-5 h-5 appearance-none border cursor-pointer border-gray-300  rounded-md mr-2 hover:border-indigo-500 hover:bg-indigo-100 checked:bg-no-repeat checked:bg-center checked:border-indigo-500 checked:bg-indigo-100">
                    <label for="card" class="text-sm font-norma cursor-pointer text-gray-600"> Card</label>
                </div>
                <div class="flex items-center">
                    <input id="klarna" name="payment" type="radio" value="klarna" class="w-5 h-5 appearance-none cursor-pointer border border-gray-300  rounded-md mr-2 hover:border-indigo-500 hover:bg-indigo-100 checked:bg-no-repeat checked:bg-center checked:border-indigo-500 checked:bg-indigo-100">
                    <label for="klarna" class="text-sm font-normal cursor-pointer text-gray-600"> Klarna</label>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">Pay $11.30p</button>
                </div>
            </form>
        </div>
    </div>
    <div class="flex min-h-full flex-col px-6 py-12 h-120 relative msm:w-1/2" style="box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.1);">
        @include('frontend.checkout.ticketDetail')
    </div>
</div>

@endsection
