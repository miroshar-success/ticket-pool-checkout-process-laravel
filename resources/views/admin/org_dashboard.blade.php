@extends('master')

@section('content')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        $(document).ready(function() {
            colors = ['#591387', '#a75fc1', '#9a3dea', '#9e7ddf', '#9f91ff'];
            Highcharts.chart('chart-container1', {
                chart: {
                    type: 'pie'
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: ''
                },
                colors,
                plotOptions: {
                    pie: {
                        innerSize: '50%',
                        // borderRadius: 8,
                        depth: 45,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '{point.percentage:.1f}%',
                            distance: -30
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Gender Distribution',
                    data: [
                        ['Male', 2],
                        ['FeMale', 8]

                    ]
                }]
            });
            Highcharts.chart('chart-container2', {
                chart: {
                    type: 'pie'
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: ''
                },
                colors,
                plotOptions: {
                    pie: {
                        innerSize: '50%',
                        // borderRadius: 8,
                        depth: 45,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '{point.percentage:.1f}%',
                            distance: -30
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Age Distribution',
                    data: [
                        ['10-19', 16],
                        ['20-29', 12],
                        ['30-39', 8],

                    ]
                }]
            });
            Highcharts.chart('chart-container3', {
                chart: {
                    type: 'pie'
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: ''
                },
                colors,
                plotOptions: {
                    pie: {
                        innerSize: '50%',
                        // borderRadius: 8,
                        depth: 45,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '{point.percentage:.1f}%',
                            distance: -30
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Gelocation Distribution',
                    data: [
                        ['Norway', 16],
                        ['Germany', 12],
                        ['USA', 8],

                    ]
                }]
            });
        })
    </script>
    <style>
        .chart-container {
            height: 300px;
        }
    </style>
    
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Dashboard') }} </h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">{{ __('Order Statistics') }} -
                                <div class="dropdown d-inline">
                                    <a class="font-weight-600 dropdown-toggle month" data-toggle="dropdown" href="#"
                                        id="orders-month">{{ __('All') }}</a>
                                    <ul class="dropdown-menu dropdown-menu-sm">
                                        <li class="dropdown-title">{{ __('Select Month') }}</li>
                                        <a href="{{ url('/admin/home') }}"
                                            class="text-decoration-none">{{ __('All') }}</a>
                                        @for ($i = 1; $i <= 12; $i++)
                                            @php
                                                $month_name = date('F', mktime(0, 0, 0, $i, 10));
                                            @endphp
                                            <li><a href="#" class="dropdown-item"
                                                    onclick="getStatistics({{ $i }},'{{ $month_name }}' )">{{ $month_name }}</a>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count order-pending">{{ $master['pending_order'] }}</div>
                                    <div class="card-stats-item-label">{{ __('Pending') }}</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count order-complete">{{ $master['complete_order'] }}</div>
                                    <div class="card-stats-item-label">{{ __('Completed') }}</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count order-cancel">{{ $master['cancel_order'] }}</div>
                                    <div class="card-stats-item-label">{{ __('Cancel') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Total Orders') }}</h4>
                            </div>
                            <div class="card-body order-total">
                                {{ $master['total_order'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-hero">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <h4>{{ $master['used_tickets'] . '/' . $master['total_tickets'] }}</h4>
                            <div class="card-description">{{ __('Remaining Tickets') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-hero">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-glass-cheers"></i>
                            </div>
                            <h4>{{ $master['events'] }}</h4>
                            <div class="card-description">{{ __('Events') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-stats" style="z-index:1">
                            <div class="card-stats-title text-left pb-0">{{ __('Customer Gender') }}</div>
                        </div>
                        <div id="chart-container1" class="chart-container"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-stats" style="z-index:1">
                            <div class="card-stats-title text-left pb-0">{{ __('Age Distribution') }}</div>
                        </div>
                        <div id="chart-container2" class="chart-container"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-stats" style="z-index:1">
                            <div class="card-stats-title text-left pb-0">{{ __('Traffic Geolocations') }}</div>
                        </div>
                        <div id="chart-container3" class="chart-container"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header pt-0 pb-0">
                                    <div class="row w-100">
                                        <div class="col-lg-8">
                                            <h2 class="section-title"> {{ __('Upcoming Event') }}</h2>
                                        </div>
                                        <div class="col-lg-4 text-right mt-2">
                                            <a href="{{ url('events') }}"><button
                                                    class="btn btn-sm btn-primary ">{{ __('See all') }}</button> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table home-tbl" id="">
                                            <tbody>
                                                @foreach ($events as $item)
                                                    <tr>
                                                        <td> <img class="table-img"
                                                                src="{{ url('images/upload/' . $item->image) }}"> </td>
                                                        <td style="width:360px">
                                                            <h6>{{ $item->name }}</h6>
                                                            @if ($item->type == 'online')
                                                                <p>{{ __('Online Event') }}</p>
                                                            @else
                                                                <p>{{ $item->address }}</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button class="btn-icon btn block"><i
                                                                    class="fas fa-user-friends cursor"></i></button>
                                                            <span class="tbl-info">{{ $item->people . ' allowed' }}</span>
                                                        </td>
                                                        <td>
                                                            <button class="btn-icon btn block"><i
                                                                    class="fas fa-ticket-alt cursor"></i></button>
                                                            <span class="tbl-info">{{ $item->avaliable }}
                                                                {{ __('Pcs left') }}</span>
                                                        </td>
                                                        <td>
                                                            <button class="btn-icon btn block"><i
                                                                    class="far fa-calendar-alt cursor"></i></button>
                                                            <span
                                                                class="tbl-info">{{ $item->start_time->format('Y-m-d') }}</span>
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

                <div class="col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-body calender-event">
                            <input type="hidden" name="eventDate" id="eventDate"
                                value="{{ json_encode($master['eventDate']) }}">
                            <div id="home_calender"></div>
                            <h5 class="text-dark mb-4 mt-2">{{ carbon\Carbon::now()->format('F') . __(' Event') }}</h5>
                            <div class="home-upcoming-event">
                                @if (count($monthEvent) == 0)
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <div class="empty-data">
                                                <div class="card-icon shadow-primary">
                                                    <i class="fas fa-search"></i>
                                                </div>
                                                <h6 class="mt-3">{{ __('No events found') }} </h6>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($monthEvent as $item)
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <div class="date-left">
                                                    <h3 class="mb-0">{{ $item->start_time->format('d') }}</h3>
                                                    <p class="mb-0">{{ $item->start_time->format('D') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-9 event-right">
                                                <p class="mb-0 name">{{ $item->name }}</p>
                                                <p class="mb-0">Ticket Sold
                                                    <span>{{ $item->sold_ticket }}/{{ $item->tickets }}</span></p>
                                                <div class="progress mb-3" data-height="5">
                                                    <div class="progress-bar" role="progressbar"
                                                        data-width="{{ $item->average }}%"
                                                        aria-valuenow="{{ $item->average }}" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
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
    </section>
@endsection
