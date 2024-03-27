@extends('master')
@section('content')
    <link href="/applications/ticket-pool/public/css/countrySelect.min.css" rel="stylesheet">
    <script src="/applications/ticket-pool/public/js/countrySelect.min.js"></script>
    <script>
        $(document).ready(function() {                    
            $('#DateOfBirth').flatpickr({
                maxDate: "today",
                enableTime: false,
                dateFormat: "Y-m-d",
            });

            $("#country").countrySelect({
                // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                // responsiveDropdown: true,
                defaultCOuntry: 'us',
                preferredCountries: ['us', 'gb', 'ca']
            });
        })
    </script>

    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Add User'),
            'headerData' => __('Users'),
            'url' => 'app-user',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Add User') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('app-user') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group center">
                                            <label>{{ __('Image') }}</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label"> <i
                                                        class="fas fa-plus"></i></label>
                                                <input type="file" name="image" id="image-upload" />
                                            </div>
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __('Full Name') }}</label>
                                                    <input type="text" name="name" placeholder="{{ __('Full Name') }}"
                                                        value="{{ old('name') }}"
                                                        class="form-control @error('name')? is-invalid @enderror">
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
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
                                        </div>                                    

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="gender">{{ __('Gender') }}</label>
                                                    <select id="gender" name="Gender" class="w-100 form-control">
                                                        <option value="" disabled selected>{{ __('Select Gender') }}</option>
                                                        <option value="male" selected>Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="DateOfBirth">{{ __('Date Of Birth') }}</label>
                                                    <input type="text" name="DateOfBirth" id="DateOfBirth"
                                                        placeholder="{{ __('Choose Date Of Birth') }}"
                                                        class="form-control date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="Country" class="d-block">{{ __('Country') }}</label>
                                                    <div class="w-100">
                                                        <input class="form-control" id="country" name="Country" type="text">
                                                        <!-- <input type="hidden" id="country_selector_code" name="country_selector_code" data-countrycodeinput="1" readonly="readonly" /> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city">{{ __('City') }}</label>
                                                    <input type="text" name="City" id="" class="form-control" placeholder="{{ __('City') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __('Password') }}</label>
                                                    <input type="password" name="password"
                                                        placeholder="{{ __('Password') }}"
                                                        class="form-control @error('password')? is-invalid @enderror">
                                                    @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __('status') }}</label>
                                                    <select name="status" class="form-control select2">
                                                        <option value="1">{{ __('Active') }}</option>
                                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                                            {{ __('Block') }}</option>
                                                    </select>
                                                    @error('status')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
