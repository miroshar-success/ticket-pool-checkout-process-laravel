@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Scanner'),
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
                                <div class="col-lg-8">
                                    <h2 class="section-title mt-0"> {{ __('View Scanner') }}</h2>
                                </div>
                                <div class="col-lg-4 text-right">
                                    @can('scanner_create')
                                        <button class="btn btn-primary add-button"><a href="{{ url('scanner/create') }}"><i
                                                    class="fas fa-plus"></i> {{ __('Add New') }}</a></button>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="report_table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Total events') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Action') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($scanners as $item)
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <div class="media">
                                                        <img alt="image" class="mr-3 avatar"
                                                            src="{{ url('images/upload/' . $item->image) }}">
                                                        <div class="media-body">
                                                            <div class="media-title mb-0">
                                                                {{ $item->first_name . ' ' . $item->last_name }}
                                                            </div>
                                                            <div class="media-description text-muted"> {{ $item->email }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->total_event }}</td>
                                                <td><span
                                                        class="badge {{ $item->status == 1 ? 'badge-success' : 'badge-danger' }} badge-primary">
                                                        {{ $item->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                                                <td>
                                                    @if ($item->status == '0')
                                                        <a href="{{ url('block-scanner/' . $item->id) }}"
                                                            title="Unblock {{ $item->name }}"
                                                            class="btn-icon text-success"><i
                                                                class="fas fa-unlock-alt"></i></a>
                                                    @else
                                                        <a href="{{ url('block-scanner/' . $item->id) }}"
                                                            title="Block {{ $item->name }}"
                                                            class="btn-icon text-danger"><i
                                                                class="fas fa-ban text-danger"></i></a>
                                                    @endif
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
