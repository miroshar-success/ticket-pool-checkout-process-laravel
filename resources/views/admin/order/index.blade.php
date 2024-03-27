@extends('master')

@section('content')
@php
    $currency = \App\Models\Setting::first()->currency;
@endphp
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('View Orders'),
    ])

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <div class="row mb-4 mt-2">
                        <div class="col-lg-8"><h2 class="section-title mt-0"> {{__('Order List')}}</h2></div>
                        <div class="col-lg-4 text-right">
                        </div>
                    </div>
                  <div class="table-responsive">

                    <table class="table" id="report_table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{__('Order Id')}}</th>
                                <th>{{__('Customer Name')}}</th>
                                <th>{{__('Event Name')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Sold Ticket')}}</th>
                                <th>{{__('Payment')}}</th>
                                <th>{{__('Payment Gateway')}}</th>
                                <th class="d-none">{{ __('Order Status') }}</th>{{-- for print and pdf only --}}
                                <th>{{__('Order Status')}}</th>
                                <th class="d-none">{{ __('Payment Status') }}</th>{{-- for print and pdf only --}}
                                <th>{{__('Payment Status')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td></td>
                                    <td>{{$item->order_id}} </td>
                                    @if (isset($item->customer))
                                    <td>{{$item->customer->name.' '.$item->customer->last_name}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>
                                        <h6 class="mb-0">{{$item->event->name}}</h6>
                                        <p class="mb-0">{{$item->event->start_time}}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0">{{$item->created_at->format('Y-m-d')}}</p>
                                        <p class="mb-0">{{$item->created_at->format('h:i a')}}</p>
                                    </td>
                                    <td>{{$item->quantity.' ticket'}}</td>
                                    <td>{{$currency.$item->payment}}</td>
                                    <td>{{$item->payment_type}}</td>
                                    <td class="d-none">{{ $item->order_status }}</td>{{-- for print and pdf only --}}
                                    <td>
                                         <select name="order_status" id="status-{{ $item->id }}" class="form-control p-2" onchange="changeOrderStatus({{$item->id}})" {{ $item->order_status == "Complete" || $item->order_status == "Cancel"? 'disabled':'' }}>
                                            <option  value="Pending" {{ $item->order_status == "Pending"? 'selected':''}}> {{ __('Pending') }} </option>
                                            <option  value="Complete" {{ $item->order_status == "Complete"? 'selected':''}}> {{ __('Complete') }} </option>
                                            <option  value="Cancel" {{ $item->order_status == "Cancel"? 'selected':''}}> {{ __('Cancel') }} </option>
                                        </select>
                                    </td>
                                    @if ($item->payment_status == 0)
                                    <td class="d-none">{{ $item->payment_status == 0? 'Pending':'' }}</td>{{-- for print and pdf only --}}
                                    @else
                                    <td class="d-none">{{ $item->payment_status == 1? 'Complete':'' }}</td>{{-- for print and pdf only --}}
                                    @endif

                                    <td>
                                        <select name="payment_status" id="payment-{{ $item->id }}" class="form-control p-2" onchange="changePaymentStatus({{$item->id}})" {{ $item->payment_status == 1? 'disabled':'' }}>
                                            <option value="0" {{ $item->payment_status == 0? 'selected':''}}> {{ __('Pending') }} </option>
                                            <option value="1" {{ $item->payment_status == 1? 'selected':''}}> {{ __('Complete') }} </option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{url('order-invoice/'.$item->id)}}" class="btn-icon text-primary"><i class="far fa-eye"></i></a>
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

