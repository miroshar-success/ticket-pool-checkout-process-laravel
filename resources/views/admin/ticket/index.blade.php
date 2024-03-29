@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Manage Tickets'),
            'headerData' => __('Event'),
            'url' => 'events/' . $event->id,
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
                                    <h2 class="section-title mt-0"> {{ __('View Tickets') }}</h2>
                                </div>
                                <div class="col-lg-4 text-right">
                                    @can('ticket_create')
                                        <button class="btn btn-primary add-button"><a
                                                href="{{ url($event->id . '/ticket/create') }}"><i class="fas fa-plus"></i>
                                                {{ __('Add New') }}</a></button>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="report_table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{ __('Ticket Number') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Quantity') }}</th>
                                            <th>{{ __('Price') }}</th>
                                            <th>{{ __('Sales End') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Mode') }}</th>
                                            <th>{{ __('Maximum Check-ins') }}</th>
                                            @if (Gate::check('ticket_edit') || Gate::check('ticket_delete'))
                                                <th>{{ __('Action') }}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ticket as $item)
                                            <tr>
                                                <td></td>
                                                <th> {{ $item->ticket_number }}</th>
                                                <th> {{ $item->name }}</th>
                                                <td> {{ $item->quantity }}</td>
                                                <td> {{ $item->type == 'paid' ? $currency . $item->price : 'FREE' }}</td>
                                                <td> {{ Carbon\Carbon::parse($item->start_time)->format('l') . ', ' . $item->end_time }}
                                                </td>
                                                <td>
                                                    <h5>
                                                        <span
                                                            class="badge {{ $item->status == '1' ? 'badge-success' : 'badge-warning' }}  m-1">{{ $item->status == '1' ? 'Active' : 'Inactive' }}</span>
                                                    </h5>
                                                </td>
                                                <td>
                                                    {{ $item->allday == 1 ? 'Many times' : 'One Times' }}</td>
                                                </td>
                                                <td>
                                                    @if ($item->maximum_checkins == null)
                                                        {{ __('Unlimited') }}
                                                    @else
                                                    {{$item->maximum_checkins}}
                                                    @endif
                                                </td>
                                                @if (Gate::check('ticket_edit') || Gate::check('ticket_delete'))
                                                    <td>
                                                        @can('ticket_edit')
                                                            <a href="{{ url('ticket/edit/' . $item->id) }}" class="btn-icon"><i
                                                                    class="fas fa-edit"></i></a>
                                                        @endcan
                                                        @can('ticket_delete')
                                                            <a href="#"
                                                                onclick="deleteData('deleteTickets','{{ $item->id }}');"
                                                                class="btn-icon"><i
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
