@extends('master')

@section('content')
    <link href="/applications/ticket-pool/public/admin/css/countrySelect.min.css" rel="stylesheet">
    <script src="/applications/ticket-pool/public/admin/js/countrySelect.min.js"></script>
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
            'title' => __('Edit AppUser'),
            'headerData' => __('AppUser'),
            'url' => 'users',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Edit AppUser') }}</h2>
                </div>
            </div>
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
                    @if (session('email'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('email') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('/update_appuser') }}">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name" value="{{ $user->name }}"
                                                class="form-control @error('first_name')? is-invalid @enderror">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Last Name') }}</label>
                                            <input type="text" name="last_name" value="{{ $user->last_name }}"
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
                                            <label for="gender">{{ __('Gender') }}</label>
                                            <select id="gender" name="Gender" class="w-100 form-control">
                                                <option value="" disabled selected>{{ __('Select Gender') }}</option>
                                                <option value="male" {{$user->Gender === 'male' ? 'selected' : ''}}>Male</option>
                                                <option value="female" {{$user->Gender === 'female' ? 'selected' : ''}}>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="DateOfBirth">{{ __('Date Of Birth') }}</label>
                                            <input type="text" name="DateOfBirth" id="DateOfBirth"
                                                placeholder="{{ __('Choose Date Of Birth') }}"
                                                class="form-control date"
                                                value="{{$user->DateOfBirth}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="Country" class="d-block">{{ __('Country') }}</label>
                                            <div class="w-100">
                                                <input class="form-control" id="country" name="Country" type="text" value="{{$user->Country}}">
                                                <!-- <input type="hidden" id="country_selector_code" name="country_selector_code" data-countrycodeinput="1" readonly="readonly" /> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="city">{{ __('City') }}</label>
                                            <input value="{{$user->City}}" type="text" name="City" id="" class="form-control" placeholder="{{ __('City') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" name="email" value="{{ $user->email }}"
                                        class="form-control @error('email')? is-invalid @enderror">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Phone') }}</label>
                                    <input type="text" name="phone" value="{{ $user->phone }}"
                                        class="form-control @error('phone')? is-invalid @enderror">
                                    @error('phone')
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
