@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Coupon'),
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
                        <div class="col-lg-8"><h2 class="section-title mt-0"> {{__('View Coupon')}}</h2></div>
                        <div class="col-lg-4 text-right">
                            @can('coupon_create')
                            <button class="btn btn-primary add-button"><a href="{{url('coupon/create')}}"><i class="fas fa-plus"></i> {{__('Add New')}}</a></button>
                            @endcan
                        </div>
                    </div>
                  <div class="table-responsive">
                    <table class="table" id="report_table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{__('Coupon Code')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Event')}}</th>
                                <th>{{__('Discount')}}</th>
                                <th>{{__('Duration')}}</th>
                                <th>{{__('Avaliable')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Minimum Amount')}}</th>
                                <th>{{__('Maximum Discount')}}</th>

                                @if(Gate::check('coupon_edit') || Gate::check('coupon_delete'))
                                <th>{{__('Action')}}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupon as $item)
                                <tr>
                                    <td></td>
                                    <td> {{$item->coupon_code}}</td>
                                    <td> {{$item->name}}</td>
                                    <td> {{$item->event->name}}</td>
                                    <td> {{$item->discount.'%'}}</td>
                                    <td>{{$item->start_date.' to '.$item->end_date}}</td>
                                    <td>{{$item->max_use-$item->use_count.' time'}}</td>
                                    <td>
                                        <h5><span class="badge {{$item->status=="1"?'badge-success': 'badge-warning'}}  m-1">{{$item->status=="1"?'Active': 'Inactive'}}</span></h5>
                                    </td>
                                    <td>{{$item->minimum_amount}}</td>
                                    <td>{{$item->maximum_discount}}</td>
                                    @if(Gate::check('coupon_edit') || Gate::check('coupon_delete'))
                                    <td>
                                        @can('coupon_edit')
                                        <a href="{{ route('coupon.edit', $item->id) }}" class="btn-icon"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('coupon_delete')
                                        <a href="#"  onclick="deleteData('coupon','{{$item->id}}');" class="btn-icon"><i class="fas fa-trash-alt text-danger"></i></a>
                                        @endcan
                                    </td>
                                    @endif
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
