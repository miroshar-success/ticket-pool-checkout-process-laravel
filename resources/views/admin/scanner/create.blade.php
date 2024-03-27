@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Add Scanner'),
            'headerData' => __('Scanner'),
            'url' => 'scanner',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Add Scanner') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('scanner') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('First Name') }}</label>
                                            <input type="text" name="first_name" placeholder="{{ __('First Name') }}"
                                                value="{{ old('first_name') }}"
                                                class="form-control @error('first_name')? is-invalid @enderror">
                                            @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Last Name') }}</label>
                                            <input type="text" name="last_name" placeholder="{{ __('Last Name') }}"
                                                value="{{ old('last_name') }}"
                                                class="form-control @error('last_name')? is-invalid @enderror">
                                            @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Email') }}</label>
                                            <input type="email" name="email" placeholder="{{ __('Email') }}"
                                                value="{{ old('email') }}"
                                                class="form-control @error('email')? is-invalid @enderror">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Phone') }}</label>
                                            <input type="text" name="phone" placeholder="{{ __('Phone') }}"
                                                value="{{ old('phone') }}"
                                                class="form-control @error('phone')? is-invalid @enderror">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Password') }}</label>
                                    <input type="password" name="password" placeholder="{{ __('Password') }}"
                                        class="form-control @error('password')? is-invalid @enderror">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('status') }}</label>
                                    <select name="status" class="form-control select2">
                                        <option value="1">{{ __('Active') }}</option>
                                        <option value="0">{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary demo-button">{{ __('Submit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
