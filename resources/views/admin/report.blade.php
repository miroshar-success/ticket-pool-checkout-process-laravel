@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Event Reports'),
        ])
        <style>
        </style>
        <div class="section-body">
            <h2 class="section-title">{{ __('Event Reports') }}</h2>
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
                                            <th>{{ __('Reason') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <?php $event = \App\Models\Event::find($item->event_id); ?>
                                            <tr>
                                                <td></td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $event->name }}</td>
                                                <td>{{ $item->reason }}</td>
                                                <td>{{ $item->message }}</td>
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
