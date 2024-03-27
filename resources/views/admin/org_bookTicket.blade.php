@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Book Ticket'),
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
                        <div class="col-lg-8"><h2 class="section-title mt-0"> {{__('View Events')}}</h2></div>

                    </div>
                  <div class="table-responsive">
                    <table class="table" id="report_table">
                        <thead>
                            <tr>
                                <th>{{ __('Id') }}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach ($events as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <th> <img style="height: 50px;width:50px" src="{{url('images/upload/'.$item->image)}}"> </th>
                                    <td>{{$item->name}}</td>

                                    <td>
                                        <h5><span class="badge {{$item->status=="1"?'badge-success': 'badge-danger'}}  m-1">{{$item->status=="1"?'Active': 'Block'}}</span></h5>
                                    </td>
                                    <td>
                                        <a href="{{ url('/organizer'.'/'.$item->id.'/'. preg_replace('/\s+/', '_', $item->name)) }}" title="User Detail" class="btn-icon text-success"><i class="fas fa-eye"></i></a>
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
