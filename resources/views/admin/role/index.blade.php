@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Roles'),
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
                        <div class="col-lg-8"><h2 class="section-title mt-0"> {{__('View Roles')}}</h2></div>
                        <div class="col-lg-4 text-right">
                            @can('role_create')
                            <button class="btn btn-primary add-button"><a href="{{url('roles/create')}}"><i class="fas fa-plus"></i> {{__('Add New')}}</a></button>
                            @endcan
                        </div>
                    </div>
                  <div class="table-responsive">
                    <table class="table" id="report_table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Permissions')}}</th>
                                @if(Gate::check('role_edit') || Gate::check('role_delete'))
                                <th style="width:130px">{{__('Action')}}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item)
                                <tr>
                                    <td></td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @forelse ($item->permissions as $permission)
                                        <span class="badge badge-success  m-1">{{$permission->name}}</span>
                                        @empty
                                            @if($item->name == 'admin')
                                                <span class="badge badge-warning  m-1">{{__('All')}}</span>
                                            @else
                                                <span class="badge badge-warning  m-1">{{__('No Data')}}</span>
                                            @endif
                                        @endforelse
                                    </td>
                                    @if(Gate::check('role_edit') || Gate::check('role_delete'))
                                    <td>
                                        @if($item->name!="admin")
                                            @can('role_edit')
                                            <a href="{{ route('roles.edit', $item->id) }}" class="btn-icon"><i class="fas fa-edit"></i></a>
                                            @endcan
                                        @endif
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
