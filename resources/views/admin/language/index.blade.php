@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Language'),            
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
                        <div class="col-lg-8"><h2 class="section-title mt-0"> {{__('All Languages')}}</h2></div>
                        <div class="col-lg-4 text-right">
                            <a href="{{ url('language/download_sample_file') }}">{{__('Download Sample File')}}</a>
                            @can('language_add')
                            <button class="btn btn-primary add-button">
                                <a href="{{url('language/create')}}"><i class="fas fa-plus"></i> {{__('Add New')}}</a></button>                
                            @endcan
                        </div>
                    </div>      
                  <div class="table-responsive">
                    <table class="table" id="report_table">
                        <thead>
                            <tr>
                                <th></th>                                
                                <th>{{__('Image')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Status')}}</th> 
                                @if(Gate::check('language_edit') || Gate::check('language_delete'))                                   
                                <th>{{__('Action')}}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $item)
                                <tr>
                                    <td></td>                                    
                                    <th> <img class="table-img" src="{{url('images/upload/'.$item->image)}}"> </th>
                                    <td>
                                        <h6 class="mb-0">{{$item->name}}</h6>
                                    </td>                                             
                                    <td>                                        
                                        <h5><span class="badge {{$item->status=="1"?'badge-success': 'badge-warning'}}  m-1">{{$item->status=="1"?'Active': 'Inactive'}}</span></h5>
                                    </td>
                                    @if(Gate::check('language_edit')) 
                                    <td>
                                        @can('language_edit')
                                        <a href="{{ route('language.edit', $item->id) }}" title="Edit Event" class="btn-icon"><i class="fas fa-edit"></i></a>
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
