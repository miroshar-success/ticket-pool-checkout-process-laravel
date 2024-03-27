@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Organization Report'),            
    ]) 

    <div class="section-body">
        <div class="row">
            <div class="col-lg-8"><h2 class="section-title"> {{__('Organizer Report')}}</h2></div>            
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

                    <form method="post" action="{{url('admin-report/customer')}}">
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
                                <th>{{__('Organization Name')}}</th>                                                 
                                <th>{{__('Phone')}}</th>  
                                <th>{{__('Total Events')}}</th> 
                                <th>{{__('Tickets')}}</th>                                
                                <th>{{__('Registered at')}}</th>                                                                                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td></td>                                    
                                    <td>
                                       <h6>{{$item->first_name.' '.$item->last_name}}</h6> 
                                       <p>{{$item->email}}</p>
                                    </td>                                              
                                    <td>{{$item->phone==null?'-':$item->phone}}</td>  
                                    <td>{{$item->total_events}}</td>                                            
                                    <td>{{$item->total_tickets.'/'.$item->sold_tickets}}</td>                                                                                
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
