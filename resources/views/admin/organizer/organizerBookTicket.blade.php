@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Tickets'),
        ])

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="report_table">
                            <thead>
                                <tr>
                                    <th>Tickets Number</th>
                                    <th>Ticket Name</th>
                                    <th>Ticket Type</th>
                                    <th>Ticket Quantity</th>
                                    <th>Ticket Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tickets as $item)
                                <tr>
                                       <td class="text-dark">{{ $item->ticket_number }}</td>
                                       <td>{{ $item->name }}</td>
                                       <td>{{ $item->type }}</td>
                                       <td>{{ $item->quantity }}</td>
                                       <td>{{ $item->price }}</td>
                                       <td><a href="{{ url('organizerCheckout/' . $item->id) }}"><button class="btn btn-a btn-primary">{{ __('Book Now') }}</button></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>

    </section>
@endsection
