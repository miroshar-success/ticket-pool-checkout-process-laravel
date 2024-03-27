@extends('master')
@section('content')
    @php
        $logo = \App\Models\Setting::find(1)->logo;
    @endphp
    <section class="section">
        <div class="mt-0 d-flex flex-wrap align-items-stretch">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-primary">
                <div class="p-4 m-3 w-10 h-10">
                    <img src="{{ $logo ? asset('/images/upload/' . $logo) : asset('/images/logo.png') }}" alt="logo"
                         width="300" class="mb-4 mt-2 object-contain">
                    <h4 class="text-white font-weight-normal mb-4">{{ __('Welcome to ') }}<span
                            class="font-weight-bold">{{ \App\Models\Setting::find(1)->app_name }}</span></h4>
                    <form method="POST" action="{{ url('admin/login') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="text-white">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                                autofocus>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                            @if (Session::has('error_msg'))
                                <span class="invalid-feedback" style="display: block;">
                                    <strong>{{ Session::get('error_msg') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="text-white control-label">{{ __('Password') }}</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                required>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                    id="remember-me">
                                <label class="custom-control-label text-white" for="remember-me">{{ __('Remember Me') }}</label>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
                data-background="{{ url('/images/auth_image.png') }}"> -->
            <div class="mobile-hide col-lg-8 col-12 order-lg-2 order-1 min-vh-100 position-relative pl-0">
                <video preload="auto" autoplay muted loop id="myVideo" class="position-fixed h-100">
                    <source src="/applications/ticket-pool/public/images/auth_video.mp4" type="video/mp4">
                </video>
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-4 font-weight-bold">{{ __('Welcome') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
