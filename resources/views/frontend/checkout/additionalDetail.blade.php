@extends('frontend.master', ['activePage' => 'frontend.checkout.expressCheckout'])
@section('title', __('Checkout'))
@section('content')
<div class="flex flex-col justify-center container gap -10 m-auto w-[80%] mt-10 mb-10 msm:flex-row msm:mt-20 msm:w-[70%]">
    <div class="flex min-h-full flex-col px-6 py-12 h-140  msm:w-1/2" style="box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.1);">
        <div class="w-full">
            <h2 class="text-left text-2xl font-bold leading-9 tracking-tight text-gray-900">Additional details</h2>
        </div>
        <p class="w-full text-sm font-normal cursor-pointer text-gray-600">Please fill in these additional information</p>
        <div class="mt-5 w-full">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="space-y-6" action="{{route('register_post')}}" method="POST">
                @csrf
                <div class="mt-2 w-full">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country<span style="color:red">*</span></label>
                    <div class="relative">
                        <select id="country" name="country" class="block w-full py-2 pl-3 pr-10 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="" selected disabled>Select a country</option>
                        </select>
                    </div>
                </div>
                <div class="mt-2 w-full">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City<span style="color:red">*</span></label>
                    <select id="city" name="city" class="border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-1.5 px-1.5 focus:outline-none" style="height:40px" required>
                        <option value="" selected disabled>Select a city</option>
                    </select>
                </div>
                <div class="mt-2 w-full">
                    <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">Contact Number<span style="color:red">*</span></label>
                    <input type="text" id="contactNumber" name="contactNumber" required class="block w-full rounded-md border-0 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter your contact number" pattern="^\+(?:[0-9] ?){6,14}[0-9]$" title="Enter a valid contact number.(ex.+19786169979)">
                </div>
                <div class="mt-2 w-full">
                    <label for="howtoknow" class="block text-sm font-medium leading-6 text-gray-900">How did you hear about this event?<span style="color:red">*</span></label>
                    <input id="howtoknow" name="howtoknow" type="text" autocomplete="howtoknow" required class="block w-full rounded-md border-0 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="First name">
                </div>
                <div class="w-[50%]" style="float:right;">
                    <button type="submit" class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">Next</button>
                </div>
            </form>
        </div>
    </div>
    <div class="flex min-h-full flex-col px-6 py-12 h-120 relative msm:w-1/2" style="box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.1);">
        @include('frontend.checkout.ticketDetail')
    </div>
</div>

@endsection
