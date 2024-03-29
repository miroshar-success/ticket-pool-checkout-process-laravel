@extends('master')

@section('content')
    @php
        $currency = \App\Models\Setting::first()->currency;
    @endphp
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Tax'),
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
                                    <h2 class="section-title mt-0"> {{ __('View Tax') }}</h2>
                                </div>
                                <div class="col-lg-4 text-right">
                                    @can('tax_create')
                                        <button class="btn btn-primary add-button"><a href="{{ url('tax/create') }}"><i
                                                    class="fas fa-plus"></i> {{ __('Add New') }}</a></button>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="report_table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{ __('name') }}</th>
                                            <th>{{ __('Charges') }}</th>
                                            <th>{{ __('Allow in all bills') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            @if (Gate::check('tax_edit') || Gate::check('tax_delete'))
                                                <th>{{ __('Action') }}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($taxes as $item)
                                            <tr>
                                                <td></td>
                                                <td>{{ $item->name }}</td>
                                                @if ($item->amount_type == 'percentage')
                                                    <td>{{ $item->price }}{{ '%' }}</td>
                                                @else
                                                    <td>{{ $currency . $item->price }}</td>
                                                @endif

                                                <td> <span
                                                        class="badge {{ $item->allow_all_bill == 1 ? 'badge-success' : 'badge-danger' }}  m-1">{{ $item->allow_all_bill == 1 ? 'Allow' : 'Deny' }}</span>
                                                </td>
                                                <td> <span
                                                        class="badge {{ $item->status == 1 ? 'badge-success' : 'badge-danger' }}  m-1">{{ $item->status == 1 ? 'Active' : 'Inactive' }}</span>
                                                </td>

                                                @if (Gate::check('tax_edit') || Gate::check('tax_delete'))
                                                    <td>
                                                        @can('tax_edit')
                                                            <a href="{{ route('tax.edit', $item->id) }}" class="btn-icon"><i
                                                                    class="fas fa-edit"></i></a>
                                                        @endcan
                                                        @can('tax_delete')
                                                            <a href="#"
                                                                onclick="deleteData('tax','{{ $item->id }}');"
                                                                title="Delete Banner" class="btn-icon text-danger"><i
                                                                    class="fas fa-trash-alt text-danger"></i></a>
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
