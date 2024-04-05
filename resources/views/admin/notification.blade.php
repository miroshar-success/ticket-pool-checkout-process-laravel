@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Notification'),
        ])

        <div class="section-body">
            <h2 class="section-title">{{ __('Notification') }}</h2>
            <a class="text-decoration-none float-right" href="{{ url('markAllAsRead') }}">{{ __('Mark All As Read') }}</a>
            <p class="section-lead">
            </p>
            <div class="row mt-sm-4">
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
                    <div class="activities">
                        @if (count($notification) == 0)
                            <div class="empty-data text-center">
                                <div class="card-icon shadow-primary">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <h6 class="mt-3">{{ __('No Notification found') }} </h6>
                            </div>
                        @else
                            @foreach ($notification as $item)
                                @if ($item->user != null)
                                    <div class="activity">
                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                            <img src="{{ url('images/upload/' . $item->user->image) }}" class="avatar">
                                        </div>
                                        <div class="activity-detail">
                                            <div class="mb-2">
                                                <span class="text-job text-primary">{{ $item->created_at->diffForHumans() }}</span>
                                                <span class="bullet"></span>

                                                    <a class="text-job" target="blank" href="{{ url('view-user/'. $item->user->id) }}">{{ $item->user->name . ' ' . $item->user->last_name }}</a>
                                                @if ($item->status == 1)
                                                <span class="text-job text-success">{{ __('Unread') }}</span>
                                                @endif

                                                <div class="float-right dropdown">
                                                    <a href="#" data-toggle="dropdown"><i
                                                            class="fas fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu">
                                                        <div class="dropdown-title">{{ __('Options') }}</div>
                                                        <a href="{{ url('orders/' . $item->order_id.'/'. $item->id) }}"
                                                            class="dropdown-item has-icon"><i class="fas fa-eye"></i>
                                                            {{ __('View') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="{{ url('delete-notification/' . $item->id) }}"
                                                            class="dropdown-item has-icon text-danger"><i
                                                                class="fas fa-trash-alt"></i> {{ __('Archive') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>{{ $item->message }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
