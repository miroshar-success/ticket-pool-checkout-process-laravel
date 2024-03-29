@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Feedback'),
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
                        <div class="col-lg-8"><h2 class="section-title mt-0"> {{__('All Feedback')}}</h2></div>
                        <div class="col-lg-4 text-right">
                            @can('feedback_create')
                            <button class="btn btn-primary add-button"><a href="{{url('feedback/create')}}"><i class="fas fa-plus"></i> {{__('Add New')}}</a></button>
                            @endcan
                        </div>
                    </div>
                  <div class="table-responsive">
                    <table class="table" id="feedback_table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{__('Organizer')}}</th>
                                <th>{{__('Message')}}</th>
                                <th>{{__('Rate')}}</th>
                                @if(Gate::check('feedback_edit') || Gate::check('feedback_delete'))
                                <th>{{__('Action')}}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedback as $item)
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="media">
                                            <img alt="image" class="mr-3 rounded-circle avatar" width="50" src="{{url('images/upload/'.$item->user->image)}}">
                                            <div class="media-body">
                                                <div class="media-title mb-0"> {{$item->user->name}}  </div>
                                                <div class="media-description text-muted"> {{$item->email}} </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$item->message}}</td>
                                    <td>
                                        <div class="rating">
                                            @for ($i = 1; $i <=5; $i++)
                                                <p class="d-none">{{ $item->rate >= $i? '★':'' }}</p>
                                                <i class="fas fa-star {{$item->rate >= $i ? 'active':''}}"></i>
                                            @endfor
                                        </div>
                                    </td>

                                    @if(Gate::check('feedback_edit') || Gate::check('feedback_delete'))
                                    <td>
                                        @can('feedback_edit')
                                        <a href="{{ route('feedback.edit', $item->id) }}" title="Edit Feedback" class="btn-icon"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('feedback_delete')
                                        <a href="#"  onclick="deleteData('feedback','{{$item->id}}');"  title="Delete Feedback" class="btn-icon text-danger"><i class="fas fa-trash-alt text-danger"></i></a>
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
