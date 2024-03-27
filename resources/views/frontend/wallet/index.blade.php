@extends('frontend.master', ['activePage' => 'home'])
@section('title', __('Wallet'))
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <div class="pb-20 bg-scroll min-h-screen" style="background-image: url('{{ asset('images/events.png') }}')">
        <div class="container mx-auto mt-8">
            <div class="flex justify-between pt-5 z-10 py-3">
                <div>
                    <p
                        class="font-poppins font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl text-blue leading-10">
                        {{ __('Wallet Transactions') }}</p>&nbsp;&nbsp;
                    <p class="font-poppins font-semibold text-xl ">
                        {{ __('Available Balance') }} : <span class="text-green-500"> {{ $balance }}</span>
                    </p>
                </div>
                <div>
                    <div class="mt-3">
                        <a href="{{ route('addToWallet') }}"
                            class="font-poppins font-medium text-lg leading-6 text-white bg-primary w-full rounded-md py-3 px-2">
                            {{ __('Add To Wallet') }}</a>
                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Type') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Amount') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Payment Mode') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Transaction ID') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Payment Date & Time') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->type }}
                                </td>
                                <td
                                    class="px-6 py-4 font-semibold border-b @if ($item->type === 'deposit') text-green-600 @elseif($item->type === 'withdraw') text-red-600 @endif">
                                    {{ $item->amount }}</td>
                                <td class="px-6 py-4">
                                    {{ $item->meta['payment_mode'] ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->meta['token'] ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
