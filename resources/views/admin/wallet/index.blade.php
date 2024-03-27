@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Wallet Transactions'),
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4 mt-2">
                                <div class="col-lg-8">
                                    <h2 class="section-title mt-0"> {{ __('Wallet Transactions') }}</h2>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="report_table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Amount') }}</th>
                                            <th>{{ __('Payment Gateway') }}</th>
                                            <th>{{ __('Transaction ID') }}</th>
                                            <th>{{ __('Payment Date & Time') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $item)
                                            <tr>
                                                <td></td>
                                                <td>
                                                    {{ $item->wallet->user->name }}
                                                </td>
                                                <td> {{ $item->wallet->user->email }}
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge {{ $item->type == 'deposit' ? 'badge-success' : 'badge-danger' }}  m-1">{{ $item->amount }}</span>
                                                </td>

                                                <td>
                                                    {{ json_decode($item->meta, true)['payment_mode'] ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ json_decode($item->meta, true)['token'] ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
