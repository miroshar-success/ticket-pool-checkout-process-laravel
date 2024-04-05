@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('FAQs'),            
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
                        <div class="col-lg-8"><h2 class="section-title mt-0"> {{__('All FAQs')}}</h2></div>
                        <div class="col-lg-4 text-right">
                            @can('faq_create')
                            <button class="btn btn-primary add-button"><a href="{{url('faq/create')}}"><i class="fas fa-plus"></i> {{__('Add New')}}</a></button>                
                            @endcan
                        </div>
                    </div>      
                  <div class="table-responsive">
                    <table class="table" id="report_table">
                        <thead>
                            <tr>
                                <th></th>                                
                                <th>{{__('Question')}}</th>
                                <th style="width: 800px">{{__('Answer')}}</th>                                
                                <th>{{__('Status')}}</th> 
                                @if(Gate::check('faq_edit') || Gate::check('faq_delete'))                                   
                                <th>{{__('Action')}}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faq as $item)
                                <tr>
                                    <td></td>                                    
                                    <th> {{$item->question}} </th>                                         
                                    <td >{{$item->answer}}</td>                                       
                                    <td>                                        
                                        <h5><span class="badge {{$item->status=="1"?'badge-success': 'badge-warning'}}  m-1">{{$item->status=="1"?'Publish': 'Draft'}}</span></h5>
                                    </td>
                                    @if(Gate::check('faq_edit') || Gate::check('faq_delete')) 
                                    <td>                                      
                                        @can('faq_edit')
                                        <a href="{{ route('faq.edit', $item->id) }}" title="Edit Faq" class="btn-icon"><i class="fas fa-edit"></i></a>
                                        @endcan                                        
                                        @can('faq_delete')
                                        <a href="#"  onclick="deleteData('faq','{{$item->id}}');"  title="Delete Faq" class="btn-icon text-danger"><i class="fas fa-trash-alt text-danger"></i></a>
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
