@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Blog'),            
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
                        <div class="col-lg-8"><h2 class="section-title mt-0"> {{__('All Blogs')}}</h2></div>
                        <div class="col-lg-4 text-right">
                            @can('blog_create')
                            <button class="btn btn-primary add-button"><a href="{{url('blog/create')}}"><i class="fas fa-plus"></i> {{__('Add New')}}</a></button>                
                            @endcan
                        </div>
                    </div>      
                  <div class="table-responsive">
                    <table class="table" id="report_table">
                        <thead>
                            <tr>
                                <th></th>                                
                                <th>{{__('Image')}}</th>
                                <th>{{__('Title')}}</th>                                                    
                                <th>{{__('Status')}}</th> 
                                @if(Gate::check('blog_edit') || Gate::check('blog_delete'))                                   
                                <th>{{__('Action')}}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog as $item)
                                <tr>
                                    <td></td>                                    
                                    <th> <img class="table-img" src="{{url('images/upload/'.$item->image)}}"> </th>                                  
                                    <th> {{$item->title}} </th>                                                                                                                 
                                    <td>                                        
                                        <h5><span class="badge {{$item->status=="1"?'badge-success': 'badge-danger'}}  m-1">{{$item->status=="1"?'Active': 'Inactive'}}</span></h5>
                                    </td>
                                    @if(Gate::check('blog_edit') || Gate::check('blog_delete')) 
                                    <td>                                      
                                        @can('blog_edit')
                                        <a href="{{ route('blog.edit', $item->id) }}" title="Edit Blog" class="btn-icon"><i class="fas fa-edit"></i></a>
                                        @endcan                                        
                                        @can('blog_delete')
                                        <a href="#"  onclick="deleteData('blog','{{$item->id}}');"  title="Delete Blog" class="btn-icon text-danger"><i class="fas fa-trash-alt text-danger"></i></a>
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
