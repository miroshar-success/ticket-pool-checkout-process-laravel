@extends('frontend.master', ['activePage' => null])
@section('title', __('Contact Us'))
@section('content')

    @include('frontend.layout.breadcrumbs', [
        'title' => __('FAQ'),
        'page' => __('FAQ'),
    ])

    <section class="FAQ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @foreach ($faq as $item)
                        <div class="card shadow-none">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-1 ">
                                        <h5> Q. </h5>
                                    </div>
                                    <div class="col-md-auto">
                                        <h5> {{ $item->question }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row card-body">
                                <div class="col-md-1 ">
                                    <h5> A.</h5>
                                </div>
                                <div class="col-md-auto">
                                    <p> {{ $item->answer }}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>

    </section>

@endsection
