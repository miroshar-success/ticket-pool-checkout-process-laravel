@extends('master')
@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Customer Detail'),
        ])
        <div class="section-body">
            <h2 class="section-title">{{ $user->name . ' ' . $user->last_name }}</h2>
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
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ url('images/upload/' . $user->image) }}"
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">{{ __('Pending Order') }}</div>
                                    <div class="profile-widget-item-value">{{ $user->pending }}</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">{{ __('Complete Order') }}</div>
                                    <div class="profile-widget-item-value">{{ $user->complete }}</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">{{ __('Cancel Order') }}</div>
                                    <div class="profile-widget-item-value">{{ $user->cancel }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $user->name . ' ' . $user->last_name }}</div>
                            <b>{{ $user->email }}</b>
                            <p>{{ $user->address }}</p>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>{{ __('Following (' . count($user->following) . ')') }}</h4>
                        </div>
                        <div class="card-body scroll-type">
                            @if (count($user->following) == 0)
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div class="empty-data">
                                            <div class="card-icon shadow-primary">
                                                <i class="fas fa-search"></i>
                                            </div>
                                            <h6 class="mt-3">{{ __('No Data found') }} </h6>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <ul class="list-unstyled list-unstyled-border">
                                    @foreach ($user->following as $item)
                                        <li class="media">
                                            <img class="mr-3 avatar" width="50"
                                                src="{{ url('images/upload/' . $item->image) }}" alt="avatar">
                                            <div class="media-body">
                                                <div class="media-title">{{ $item->first_name . ' ' . $item->last_name }}</div>
                                                <span class="text-small text-muted">{{ $item->email }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>{{ __('All Orders') }}({{ $user->pending + $user->cancel + $user->complete }})</h4>
                        </div>

                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="upcoming-tab" data-toggle="tab" href="#upcoming"
                                        role="tab" aria-controls="upcoming"
                                        aria-selected="true">{{ __('Upcoming') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="past-tab" data-toggle="tab" href="#past" role="tab"
                                        aria-controls="past" aria-selected="false">{{ __('Past') }}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="upcoming" role="tabpanel"
                                    aria-labelledby="upcoming-tab">
                                    @if (count($user->upcoming) == 0)
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <div class="empty-data">
                                                    <div class="card-icon shadow-primary">
                                                        <i class="fas fa-search"></i>
                                                    </div>
                                                    <h6 class="mt-3">{{ __('No Orders found') }} </h6>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($user->upcoming as $item)
                                            <?php
                                            if ($item->order_status == 'Pending') {
                                                $status = 'badge-warning';
                                            } elseif ($item->order_status == 'Complete') {
                                                $status = 'badge-success';
                                            } elseif ($item->order_status == 'Cancel') {
                                                $status = 'badge-danger';
                                            }
                                            ?>
                                            <div class="row all-orders mb-4">
                                                <div class="col-lg-6">
                                                    <a
                                                        href="{{ url('order-invoice/' . $item->id) }}"><span>{{ $item->order_id }}</span></a>
                                                    <h6 class="mb-0">
                                                        {{ $item->event->name . ' (' . $item->quantity . ' Tickets)' }}</h6>
                                                    <p>{{ $item->event->start_time->format('Y-m-d H:i a') }}</p>
                                                </div>
                                                <div class="col-lg-6 text-right">
                                                    <button
                                                        class="btn pr-0"><strong>{{ $currency . $item->payment . '.00' }}</strong></button>
                                                    <h6><span
                                                            class="badge {{ $status }}">{{ $item->order_status }}</span>
                                                    </h6>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="past-tab">
                                    @if (count($user->past) == 0)
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <div class="empty-data">
                                                    <div class="card-icon shadow-primary">
                                                        <i class="fas fa-search"></i>
                                                    </div>
                                                    <h6 class="mt-3">{{ __('No Orders found') }} </h6>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($user->past as $item)
                                            <?php
                                            if ($item->order_status == 'Pending') {
                                                $status = 'badge-warning';
                                            } elseif ($item->order_status == 'Complete') {
                                                $status = 'badge-success';
                                            } elseif ($item->order_status == 'Cancel') {
                                                $status = 'badge-danger';
                                            }
                                            ?>
                                            <div class="row all-orders mb-4">
                                                <div class="col-lg-6">
                                                    <a
                                                        href="{{ url('order-invoice/' . $item->id) }}"><span>{{ $item->order_id }}</span></a>
                                                    <h6 class="mb-0">
                                                        {{ $item->event->name . ' (' . $item->quantity . ' Tickets)' }}</h6>
                                                    <p>{{ $item->event->start_time->format('Y-m-d H:i a') }}</p>
                                                </div>
                                                <div class="col-lg-6 text-right">
                                                    <button
                                                        class="btn pr-0"><strong>{{ $currency . $item->payment . '.00' }}</strong></button>
                                                    <h6><span
                                                            class="badge {{ $status }}">{{ $item->order_status }}</span>
                                                    </h6>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
