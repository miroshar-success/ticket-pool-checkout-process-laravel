@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Orders Report'),            
    ]) 

    <div class="section-body">
        <div class="row">
            <div class="col-lg-8"><h2 class="section-title"> {{__('Order List')}}</h2></div>            
        </div>       
       
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

                    <?php $user = App\Models\AppUser::orderBy('id','DESC')->get(); ?>
                    <form method="post" action="{{url('organization-report/orders')}}">
                        @csrf 
                        <div class="row">
                            
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Customer')}}</label>                                                             
                                    <select name="customer" class="form-control select2">                                                                  
                                        <option value="">{{ __('Select Customer') }}</option>
                                        @foreach ($user as $item)
                                        <option value="{{$item->id}}" {{isset($request->customer)==true && $request->customer==$item->id ? 'Selected':''}}>{{$item->name.' '.$item->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Duration')}}</label>                                                             
                                    <input type="text" value="{{isset($request->duration)==true ? $request->duration:''}}" placeholder="{{ __('Choose date') }}" name="duration"  class="form-control date duration">                                                                                                    
                                </div> 
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mt-2">                                    
                                    <input type="submit" class="btn btn-primary mt-4" value="Apply">                                                                                                    
                                </div> 
                            </div>
                        </div>
                    </form>
                  <div class="table-responsive">
                    
                    <table class="table" id="org_order_report">
                        <thead>
                            <tr>
                                <th></th>              
                                <th>{{__('Order Id')}}</th>                 
                                <th>{{__('Customer')}}</th>
                                <th>{{__('Event Name')}}</th>                                                          
                                <th>{{__('Sold Ticket')}}</th>                                                               
                                <th>{{__('Payment Gateway')}}</th> 
                                <th>{{__('Payment Status')}}</th>  
                                <th>{{__('Payment')}}</th>
                                <th>{{__('Tax')}}</th>
                                <th>{{__('Organization commission')}}</th>                                                                
                                <th>{{__('Created at')}}</th>                                                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td></td>
                                    <td><a href="{{url('order-invoice/'.$item->id)}}">{{$item->order_id}}</a> </td>
                                    <td>{{$item->customer->name.' '.$item->customer->last_name}}</td>                                                                                   
                                    <td>
                                        <h6 class="mb-0">{{$item->event->name}}</h6>
                                        <p class="mb-0">{{$item->event->start_time->format('Y-m-d , h:i a')}}</p>
                                    </td>                                                             
                                    <td>{{$item->quantity.' ticket'}}</td>                                   
                                    <td>{{$item->payment_type}}</td>
                                    <td><h6><span class="badge {{$item->payment_status=="1"?'badge-success': 'badge-warning'}}  m-1">{{$item->payment_status=="1"?'Completed': 'pending'}}</span></h6></td>                                
                                    <td>{{$currency.$item->payment}}</td>
                                    <td>{{$currency.$item->tax}}</td>
                                    <td>{{$currency.($item->org_commission+$item->tax)}}</td>
                                    <td>{{$item->created_at->format('Y-m-d')}}</td>                                  
                                </tr>
                            @endforeach                           
                        </tbody>
                        <tfoot class="">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>                               
                                <th></th>
                                <th>{{ __('Page Total:') }} <br><br>{{ __('Main Total:') }} </th>
                                <th></th>                                
                                <th></th> 
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot> 
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection
