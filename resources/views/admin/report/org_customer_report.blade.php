@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Customers Report'),            
    ]) 

    <div class="section-body">
        <div class="row">
            <div class="col-lg-8"><h2 class="section-title"> {{__('Customers Report')}}</h2></div>            
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

                <form method="post" action="{{url('organization-report/customer')}}">
                    @csrf 
                    <div class="row">                                                     
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
                    <table class="table" id="report_table">
                        <thead>
                            <tr>
                                <th></th>              
                                <th>{{__('Customer Name')}}</th>                 
                                <th>{{__('Email')}}</th>
                                <th>{{__('phone')}}</th>  
                                <th>{{__('Buy total tickets')}}</th> 
                                <th>{{__('Registered at')}}</th>                                                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td></td>                                    
                                    <td>
                                        <div class="media">
                                            <img alt="image" class="mr-3 avatar" src="{{url('images/upload/'.$item->image)}}">
                                            <div class="media-body">
                                                <div class="media-title mt-2">
                                                    {{$item->name.' '.$item->last_name}}
                                                </div>                                               
                                            </div>
                                        </div>
                                    </td>          
                                    <td>{{$item->email}}</td>                                                                                   
                                    <td>{{$item->phone==null?'-':$item->phone}}</td>  
                                    <td>{{$item->buy_tickets}}</td>                                            
                                    <td>{{$item->created_at->format('Y-m-d')}}</td>                                      
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
