@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Reviews'),
        ])

        <div class="section-body">
            <h2 class="section-title">{{ __('Reviews') }}</h2>
            <p class="section-lead"></p>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="review_table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{ __('Customer') }}</th>
                                            <th>{{ __('Event Name') }}</th>
                                            <th>{{ __('Message') }}</th>
                                            <th>{{ __('Rating') }}</th>
                                            @if (Auth::user()->hasRole('admin'))
                                                <th>{{ __('Action') }}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td></td>
                                                <td class=" mt-5">
                                                    <div class="media">
                                                        <img alt="image" class="mr-3 avatar"
                                                            src="{{ url('images/upload/' . $item->user->image) }}">
                                                        <div class="media-body">
                                                            <div class="media-title mb-0">
                                                                {{ $item->user->name . ' ' . $item->user->last_name }}
                                                            </div>
                                                            <div class="media-description text-muted">
                                                                {{ $item->user->email }} </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->event->name }}</td>
                                                <td>{{ $item->message }}</td>
                                                <td>
                                                    <div class="rating">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <p class="d-none">{{ $item->rate >= $i ? '★' : '' }}</p>
                                                            <i
                                                                class="fas fa-star {{ $item->rate >= $i ? 'active' : '' }}"></i>
                                                        @endfor
                                                    </div>
                                                </td>
                                               
                                                @if (Auth::user()->hasRole('admin'))
                                                    <td>
                                                        <a href="{{ url('delete-review/' . $item->id) }}"
                                                            class="btn-icon "><i
                                                                class="fas fa-trash-alt text-danger"></i></a>
                                                        @if ($item->status == 0)
                                                            <a href="{{ url('change-review-status/' . $item->id) }}"
                                                                class="btn-icon  mr-2"><button
                                                                    class="btn btn-primary">{{ __('Publish') }}</button></a>
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
