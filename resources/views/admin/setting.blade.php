@extends('master')



@section('content')
    <section class="section">

        @include('admin.layout.breadcrumbs', [
            'title' => __('Setting'),
        ])



        <div class="section-body">

            <div class="row">

                <div class="col-lg-8">

                    <h2 class="section-title"> {{ __('Admin Setting') }}</h2>

                </div>

                <div class="col-lg-4 text-right">

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

                </div>
                <div class="col-12">

                    @if (session('Exception'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            {{ session('Exception') }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                            </button>

                        </div>
                    @endif

                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-solid fa-address-card"></i>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('About us') }}</h4>
                            <p>{{ __('Set your about us page details') }}</p>
                            <a href="#about_us" aria-controls="SocialMediaLinks-setting" role="button"
                                data-toggle="collapse" class="card-cta" aria-expanded="false">{{ __('Change Setting') }} <i
                                    class="fas fa-chevron-right"></i>
                            </a>
                            <div class="collapse mt-3 " id="about_us">
                                <form action="{{ url('/about_us') }}" method="post">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Name') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" required name="name" placeholder="{{ __('Name') }}"
                                                value="{{ $aboutUs ? $aboutUs->name : '' }}"
                                                class="form-control @error('name')? is-invalid @enderror">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Email') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="email" name="email" placeholder="{{ __('Email') }}"
                                                value="{{ $aboutUs ? $aboutUs->email : '' }}"
                                                class="form-control @error('email')? is-invalid @enderror">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Phone') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" name="phone" placeholder="{{ __('Phone') }}"
                                                value="{{ $aboutUs ? $aboutUs->phone : '' }}"
                                                class="form-control @error('phone')? is-invalid @enderror">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Address') }}</label>
                                        <div class="col-sm-12 col-md-9">

                                            <textarea placeholder="{{ __('Address') }}" name="address" id="address" cols="30" rows="10"
                                                id="autocomplete" class="form-control @error('Pinterest')? is-invalid @enderror">{{ $aboutUs ? $aboutUs->address : '' }}
                                                </textarea>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Lat') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" name="lat" placeholder="{{ __('Lat') }}"
                                                id="latitude" value="{{ $aboutUs ? $aboutUs->lat : '' }}"
                                                class="form-control @error('lat')? is-invalid @enderror">
                                            @error('lat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Long') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" name="long" placeholder="{{ __('Long') }}"
                                                id="longitude" value="{{ $aboutUs ? $aboutUs->long : '' }}"
                                                class="form-control @error('long')? is-invalid @enderror">
                                            @error('long')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">

                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                                        <div class="col-sm-12 col-md-7">

                                            <button type="submit"
                                                class="btn btn-primary demo-button">{{ __('Save') }}</button>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-solid fa-link"></i>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Social Media Links') }}</h4>
                            <p>{{ __('Social Media Links') }}</p>
                            <a href="#SocialMediaLinks-setting" aria-controls="SocialMediaLinks-setting" role="button"
                                data-toggle="collapse" class="card-cta" aria-expanded="false">{{ __('Change Setting') }}
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <div class="collapse mt-3 " id="SocialMediaLinks-setting">
                                <form action="{{ url('socialmedialinks') }}" method="post">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Instagram') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" required name="Instagram"
                                                placeholder="{{ __('Instagram Link') }}"
                                                value="{{ $setting->Instagram }}"
                                                class="form-control @error('instagram')? is-invalid @enderror">
                                            @error('instagram')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Facebook') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" name="Facebook"
                                                placeholder="{{ __('Facebook Link') }}" value="{{ $setting->Facebook }}"
                                                class="form-control @error('Facebook')? is-invalid @enderror">
                                            @error('Facebook')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Twitter') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" name="Twitter" placeholder="{{ __('Twitter Link') }}"
                                                value="{{ $setting->Twitter }}"
                                                class="form-control @error('Twitter')? is-invalid @enderror">
                                            @error('Twitter')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Pinterest') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" name="Pinterest"
                                                placeholder="{{ __('Pinterest Link') }}"
                                                value="{{ $setting->Pinterest }}"
                                                class="form-control @error('Pinterest')? is-invalid @enderror">
                                            @error('Pinterest')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">

                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                                        <div class="col-sm-12 col-md-7">

                                            <button type="submit"
                                                class="btn btn-primary demo-button">{{ __('Save') }}</button>

                                        </div>

                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class='fas fa-wrench'></i>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Maintenance Mode Setting') }}</h4>
                            <p>{{ __('Support setting for maintenance on and off done by admin only and so on..') }}</p>
                            <a href="#maintenace-setting" aria-controls="maintenace-setting" role="button"
                                data-toggle="collapse" class="card-cta" aria-expanded="false">{{ __('Change Setting') }}
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <div class="collapse mt-3 " id="maintenace-setting">
                                <form method="post" action="{{ url('maintenance-setting') }} "
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group row mb-4">

                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Maintenance text') }}</label>

                                            <div class="col-sm-12 col-md-9">

                                                <input type="text" required name="maintenance_text"
                                                    placeholder="{{ __('text') }}"
                                                    value="{{ $setting->maintenance_text }}"
                                                    class="form-control @error('maintenance_text')? is-invalid @enderror">

                                                @error('maintenance_text')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>

                                        </div>
                                        <div class="form-group row mb-4">

                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Maintenance image') }}</label>

                                            <div class="col-sm-12 col-md-9">

                                                <input type="file" name="maintenance_bgimg"
                                                    placeholder="{{ __('Maintenance_image') }}"
                                                    class="form-control @error('maintenance_bgimg')? is-invalid @enderror">


                                                @error('maintenance_bgimg')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>

                                        </div>

                                        <div class="col-md-10">
                                            <span>{{ __('Maintenance Mode') }}</span>
                                        </div>
                                        <div class="custom-switches-stacked col-md-2 mt-2">
                                            <label class="custom-switch pl-0">
                                                <input type="checkbox" name="maintenance_mode"
                                                    class="custom-switch-input" {{ $mode ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4 ml-4">
                                        <label class="col-form-label text-md-right col-sm-12 col-md-9 col-lg-9"></label>
                                        <div class="col-sm-12 col-md-3 mt-3">
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('General') }}</h4>
                            <p>{{ __('General settings such as, site title, site description, logo(PNG Recommended with dimension 143px X 45px) and so on.') }}
                            </p>
                            <a href="#general-setting" aria-controls="general-setting" role="button"
                                data-toggle="collapse" class="card-cta" aria-expanded="false">{{ __('Change Setting') }}
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <div class="collapse mt-3" id="general-setting">
                                <form method="post" action="{{ url('save-general-setting') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('App Name') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" required name="app_name"
                                                placeholder="{{ __('Name') }}" value="{{ $setting->app_name }}"
                                                class="form-control @error('app_name')? is-invalid @enderror">
                                            @error('app_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Email') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="email" name="email" placeholder="{{ __('Email') }}"
                                                value="{{ $setting->email }}"
                                                class="form-control @error('email')? is-invalid @enderror">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Footer Text') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" name="footertext"
                                                placeholder="{{ __('Text That Appears In Footer') }}"
                                                value="{{ $setting->footertext }}"
                                                class="form-control @error('footerText')? is-invalid @enderror">
                                            @error('footerText')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Logo') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div id="image-preview" class="image-preview setting-logo-preview"
                                                style="background-image: url({{ url('images/upload/' . $setting->logo) }})">

                                                <label for="image-upload" id="image-label"> <i
                                                        class="fas fa-plus"></i></label>

                                                <input type="file" name="logo" id="image-upload" />

                                            </div>

                                            @error('logo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>


                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Favicon') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div id="image-preview" class="image-preview setting-favicon-preview"
                                                style="background-image: url({{ url('images/upload/' . $setting->favicon) }})">

                                                <label for="image-upload" id="image-label"> <i
                                                        class="fas fa-plus"></i></label>

                                                <input type="file" name="favicon" id="image-upload" />

                                            </div>

                                            @error('favicon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                                        <div class="col-sm-12 col-md-7">

                                            <button type="submit"
                                                class="btn btn-primary demo-button">{{ __('Save') }}</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="card card-large-icons">

                        <div class="card-icon bg-primary text-white">

                            <i class="fas fa-user-secret"></i>

                        </div>

                        <div class="card-body">

                            <h4>{{ __('Organizer Setting') }}</h4>

                            <p>{{ __('organizer app settings such as, organizer privacy policy and terms of use.') }}</p>

                            <a href="#organization-setting" aria-controls="organization-setting" role="button"
                                data-toggle="collapse" class="card-cta" aria-expanded="false">{{ __('Change Setting') }}
                                <i class="fas fa-chevron-right"></i></a>

                            <div class="collapse mt-3" id="organization-setting">

                                <form method="post" class="event-form" action="{{ url('save-organization-setting') }}">

                                    @csrf



                                    <div class="form-group">

                                        <label class="col-form-label ">{{ __('Commission Type') }}</label>

                                        <select required name="org_commission_type" class="form-control select2">

                                            <option value="">{{ __('Select Commission Type') }}</option>

                                            <option value="amount"
                                                {{ $setting->org_commission_type == 'amount' ? 'selected' : '' }}>

                                                {{ __('Amount') }}

                                            </option>

                                            <option value="percentage"
                                                {{ $setting->org_commission_type == 'percentage' ? 'selected' : '' }}>

                                                {{ __('Percentage') }}</option>

                                        </select>

                                        @error('org_commission_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="form-group">

                                        <label class="col-form-label">{{ __('Organizer Commission') }}</label>

                                        <input type="number" name="org_commission"
                                            placeholder="{{ __('Organizer Commission') }}"
                                            value="{{ $setting->org_commission }}"
                                            class="form-control @error('org_commission')? is-invalid @enderror">

                                        @error('org_commission')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="form-group">

                                        <label>{{ __('Privacy Policy') }}</label>

                                        <textarea name="privacy_policy_organizer" Placeholder="{{ __('Privacy policy') }}"
                                            class="textarea_editor @error('privacy_policy_organizer')? is-invalid @enderror">

                                                                                                {{ $setting->privacy_policy_organizer }}

                                                                                            </textarea>

                                        @error('privacy_policy_organizer')
                                            <div class="invalid-feedback block">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="form-group">

                                        <label>{{ __('Terms of use') }}</label>

                                        <textarea name="terms_use_organizer" Placeholder="{{ __('Terms of use') }}"
                                            class="textarea_editor @error('terms_use_organizer')? is-invalid @enderror">

                                                                                                        {{ $setting->terms_use_organizer }}

                                                                                                    </textarea>

                                        @error('terms_use_organizer')
                                            <div class="invalid-feedback block">{{ $message }}</div>
                                        @enderror

                                    </div>



                                    <div class="form-group">

                                        <button type="submit"
                                            class="btn btn-primary demo-button">{{ __('Save') }}</button>



                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-user-secret"></i>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Payment Information') }}</h4>
                            <p>{{ __('20% of ticket sales will be paid after the event') }}</p>

                            <a href="#payment-information-setting" aria-controls="payment-information-setting" role="button"
                                data-toggle="collapse" class="card-cta" aria-expanded="false">{{ __('Change Setting') }}
                                <i class="fas fa-chevron-right"></i></a>

                            <div class="collapse mt-3" id="payment-information-setting">
                                <form method="post" class="event-form" action="{{ url('save-payment-information-setting') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-form-label">{{ __('Organizer Commission') }}</label>
                                        <input type="number" name="org_commission"
                                            placeholder="{{ __('Organizer Commission') }}"
                                            value="{{ $setting->org_commission }}"
                                            class="form-control @error('org_commission')? is-invalid @enderror">

                                        @error('org_commission')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary demo-button">{{ __('Save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="card card-large-icons">

                        <div class="card-icon bg-primary text-white">

                            <i class="fas fa-user-check"></i>

                        </div>

                        <div class="card-body">

                            <h4>{{ __('Verification') }}</h4>

                            <p>{{ __('User Verification settings such as, enable verification and verify user by email or phone.') }}

                            </p>

                            <a href="#verification-setting" aria-controls="verification-setting" role="button"
                                data-toggle="collapse" class="card-cta"
                                aria-expanded="false">{{ __('Change Setting') }}
                                <i class="fas fa-chevron-right"></i></a>

                            <div class="collapse mt-3" id="verification-setting">

                                <form method="post" action="{{ url('save-verification-setting') }}">

                                    @csrf

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-4">{{ __('Enable User Verification') }}</label>

                                        <div class="col-sm-12 col-md-8">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="checkbox" name="user_verify"
                                                        {{ $setting->user_verify == '1' ? 'checked' : '' }}
                                                        value="1" class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-4">{{ __('Verify by Email') }}</label>

                                        <div class="col-sm-12 col-md-8">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="radio" name="verify_by"
                                                        {{ $setting->verify_by == 'email' ? 'checked' : '' }}
                                                        value="email" class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-4">{{ __('Verify by Phone') }}</label>

                                        <div class="col-sm-12 col-md-8">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="radio" name="verify_by"
                                                        {{ $setting->verify_by == 'phone' ? 'checked' : '' }}
                                                        value="phone" class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                            @error('verify_by')
                                                <div class="invalid-feedback block">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>



                                    <div class="form-group row mb-4">

                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                                        <div class="col-sm-12 col-md-7">

                                            <button type="submit"
                                                class="btn btn-primary demo-button">{{ __('Save') }}</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="card card-large-icons">

                        <div class="card-icon bg-primary text-white">

                            <i class="fas fa-hand-holding-usd"></i>

                        </div>

                        <div class="card-body">

                            <h4>{{ __('Payment Setting') }}</h4>

                            <p>{{ __('Payment settings include different payment gateway and which will display on app.') }}

                            </p>

                            <a href="#payment-setting" aria-controls="payment-setting" role="button"
                                data-toggle="collapse" class="card-cta"
                                aria-expanded="false">{{ __('Change Setting') }}
                                <i class="fas fa-chevron-right"></i></a>

                            <div class="collapse mt-3" id="payment-setting">

                                <form method="post" action="{{ url('save-payment-setting') }}">

                                    @csrf
                                    <div class="form-group row mb-4">

                                        <label class="col-form-label text-md-right col-12 col-md-3" data-toggle="tooltip"
                                            data-placement="top"
                                            title="Setting it off will hide the Wallet feature completely from the Customer's view. Including existing balance if any.">{{ __('Wallet System') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="checkbox" name="wallet"
                                                        {{ $payment->wallet == '1' ? 'checked' : '' }} value="1"
                                                        class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3">{{ __('Cash on Delivery') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="checkbox" name="cod"
                                                        {{ $payment->cod == '1' ? 'checked' : '' }} value="1"
                                                        class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                        </div>

                                    </div>


                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3">{{ __('Stripe') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="checkbox" name="stripe"
                                                        {{ $payment->stripe == '1' ? 'checked' : '' }} value="1"
                                                        class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3">{{ __('Paypal') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="checkbox" name="paypal"
                                                        {{ $payment->paypal == '1' ? 'checked' : '' }} value="1"
                                                        class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3">{{ __('Flutterwave') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="checkbox" name="flutterwave"
                                                        {{ $payment->flutterwave == '1' ? 'checked' : '' }}
                                                        value="1" class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3">{{ __('Razorpay') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="checkbox" name="razor"
                                                        {{ $payment->razor == '1' ? 'checked' : '' }} value="1"
                                                        class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Stripe secret key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="stripeSecretKey"
                                                placeholder="{{ __('Stripe secret key') }}"
                                                value="{{ $payment->stripeSecretKey }}"
                                                class="form-control @error('stripeSecretKey')? is-invalid @enderror">


                                            @error('stripeSecretKey')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Stripe public key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="stripePublicKey"
                                                placeholder="{{ __('Stripe public key') }}"
                                                value="{{ $payment->stripePublicKey }}"
                                                class="form-control @error('stripePublicKey')? is-invalid @enderror">

                                            @error('stripePublicKey')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <a href="https://stripe.com/docs/keys#obtain-api-keys" target="_blank"
                                                class="btn btn-primary demo-button mt-2">{{ __('Help') }}
                                            </a>
                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Paypal Client ID') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="paypalClientId"
                                                placeholder="{{ __('Paypal Client ID') }}"
                                                value="{{ $payment->paypalClientId }}"
                                                class="form-control @error('paypalClientId')? is-invalid @enderror">

                                            @error('paypalClientId')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Paypal Secret key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="paypalSecret"
                                                placeholder="{{ __('Paypal Secret key') }}"
                                                value="{{ $payment->paypalSecret }}"
                                                class="form-control @error('paypalSecret')? is-invalid @enderror">

                                            @error('paypalSecret')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <a href="https://www.appinvoice.com/en/s/documentation/how-to-get-paypal-client-id-and-secret-key-22"
                                                target="_blank"
                                                class="btn btn-primary demo-button mt-2">{{ __('Help') }}
                                            </a>
                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Razorpay Publish key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="razorPublishKey"
                                                placeholder="{{ __('Razorpay Publish key') }}"
                                                value="{{ $payment->razorPublishKey }}"
                                                class="form-control @error('razorPublishKey')? is-invalid @enderror">

                                            @error('razorPublishKey')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Razorpay Secret key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="razorSecretKey"
                                                placeholder="{{ __('Razorpay Secret key') }}"
                                                value="{{ $payment->razorSecretKey }}"
                                                class="form-control @error('razorSecretKey')? is-invalid @enderror">

                                            @error('razorSecretKey')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <a href="https://razorpay.com/docs/payments/dashboard/settings/api-keys/"
                                                target="_blank"
                                                class="btn btn-primary demo-button mt-2">{{ __('Help') }}
                                            </a>
                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Flutterwave public key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="ravePublicKey"
                                                placeholder="{{ __('Flutterwave public key') }}"
                                                value="{{ $payment->ravePublicKey }}"
                                                class="form-control @error('ravePublicKey')? is-invalid @enderror">

                                            @error('ravePublicKey')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>
                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Flutterwave secret key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="raveSecretKey"
                                                placeholder="{{ __('Flutterwave secret key') }}"
                                                value="{{ $payment->raveSecretKey }}"
                                                class="form-control @error('raveSecretKey')? is-invalid @enderror">
                                            @error('raveSecretKey')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>
                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Flutterwave Debugg mode') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div class=" mt-2">
                                                <select name="flutterDebugMode" id=""
                                                    class=" dropdown form-control">
                                                    <option value="1">{{ __('Yes') }}</option>
                                                    <option value="0">{{ __('No') }}</option>
                                                </select>
                                            </div>
                                            @error('flutterDebugMode')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <a href="https://developer.flutterwave.com/docs/quickstart" target="_blank"
                                                class="btn btn-primary demo-button mt-2">{{ __('Help') }}
                                            </a>
                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                                        <div class="col-sm-12 col-md-7">

                                            <button type="submit"
                                                class="btn btn-primary demo-button">{{ __('Save') }}</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="card card-large-icons">

                        <div class="card-icon bg-primary text-white">

                            <i class="fas fa-envelope"></i>

                        </div>

                        <div class="card-body">

                            <h4>{{ __('Mail Notification') }}</h4>

                            <p>{{ __('Email SMTP configuration settings and email notifications related to email.') }}

                            </p>

                            <a href="#mail-setting" aria-controls="mail-setting" role="button" data-toggle="collapse"
                                class="card-cta" aria-expanded="false">{{ __('Change Setting') }} <i
                                    class="fas fa-chevron-right"></i></a>

                            <div class="collapse mt-3" id="mail-setting">

                                <form method="post" action="{{ url('save-mail-setting') }}">

                                    @csrf

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Enable Notification') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="checkbox" name="mail_notification"
                                                        {{ $setting->mail_notification == '1' ? 'checked' : '' }}
                                                        value="1" class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Mail Host') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="mail_host" placeholder="{{ __('Mail Host') }}"
                                                value="{{ $setting->mail_host }}"
                                                class="form-control @error('mail_host')? is-invalid @enderror">

                                            @error('mail_host')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Mail Port') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="number" name="mail_port" placeholder="{{ __('Mail Port') }}"
                                                value="{{ $setting->mail_port }}"
                                                class="form-control @error('mail_port')? is-invalid @enderror">

                                            @error('mail_port')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Mail Encryption') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" name="mail_encryption"
                                                placeholder="{{ __('Mail Encryption') }}"
                                                value="{{ $setting->mail_encryption }}"
                                                class="form-control @error('mail_encryption') ? is-invalid @enderror">
                                            @error('mail_encryption')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Mail Mailer') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <input type="text" name="mail_mailer"
                                                placeholder="{{ __('Mail Mailer') }}"
                                                value="{{ $setting->mail_mailer }}"
                                                class="form-control @error('mail_mailer') ? is-invalid @enderror">
                                            @error('mail_mailer')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Mail Username') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="mail_username"
                                                placeholder="{{ __('Mail Username') }}"
                                                value="{{ $setting->mail_username }}"
                                                class="form-control @error('mail_username')? is-invalid @enderror">

                                            @error('mail_username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Mail Password') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="password" name="mail_password"
                                                placeholder="{{ __('Mail Password') }}"
                                                value="{{ $setting->mail_password }}"
                                                class="form-control @error('mail_password')? is-invalid @enderror">

                                            @error('mail_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Mail Sender Email') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="email" name="sender_email"
                                                placeholder="{{ __('Mail Sender Email') }}"
                                                value="{{ $setting->sender_email }}"
                                                class="form-control @error('sender_email')? is-invalid @enderror">

                                            @error('sender_email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <a href="https://sendgrid.com/blog/what-is-an-smtp-server/" target="_blank"
                                                class="btn btn-primary demo-button mt-3">{{ __('Help') }}
                                            </a>

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                                        <div class="col-sm-12 col-md-7">

                                            <button type="submit"
                                                class="btn btn-primary demo-button">{{ __('Save') }}</button>

                                        </div>

                                    </div>
                                    <div class="form-group row mb-4">

                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                                        <div class="col-sm-12 col-md-7">


                                            <div class="div text-left mx-1">
                                                <input type="button" value="{{ __('Test Mail') }}" data-toggle="modal"
                                                    data-target="#exampleModalCenter" class=" btn btn-primary ">
                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="card card-large-icons">

                        <div class="card-icon bg-primary text-white">

                            <i class="fas fa-bell"></i>

                        </div>

                        <div class="card-body">

                            <h4>{{ __('Push Notification') }}</h4>

                            <p>{{ __('OneSignal configuration settings and app push notifications setting.') }}</p>

                            <a href="#push-notification-setting" aria-controls="push-notification-setting" role="button"
                                data-toggle="collapse" class="card-cta"
                                aria-expanded="false">{{ __('Change Setting') }} <i
                                    class="fas fa-chevron-right"></i></a>

                            <div class="collapse mt-3" id="push-notification-setting">

                                <form method="post" action="{{ url('save-pushNotification-setting') }}">

                                    @csrf

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Enable Notification') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="checkbox" name="push_notification"
                                                        {{ $setting->push_notification == '1' ? 'checked' : '' }}
                                                        value="1" class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <p>{{ __('OneSignal configuration for user app:') }}</p>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Onesignal App Id') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="onesignal_app_id"
                                                placeholder="{{ __('OneSignal App Id') }}"
                                                value="{{ $setting->onesignal_app_id }}"
                                                class="form-control @error('onesignal_app_id')? is-invalid @enderror">

                                            @error('onesignal_app_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Onesignal Project Number') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="onesignal_project_number"
                                                placeholder="{{ __('Onesignal Project Number') }}"
                                                value="{{ $setting->onesignal_project_number }}"
                                                class="form-control @error('onesignal_project_number')? is-invalid @enderror">

                                            @error('onesignal_project_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Onesignal Api key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="onesignal_api_key"
                                                placeholder="{{ __('Onesignal Api key') }}"
                                                value="{{ $setting->onesignal_api_key }}"
                                                class="form-control @error('onesignal_api_key')? is-invalid @enderror">

                                            @error('onesignal_api_key')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Onesignal Auth Key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="onesignal_auth_key"
                                                placeholder="{{ __('Onesignal Auth Key') }}"
                                                value="{{ $setting->onesignal_auth_key }}"
                                                class="form-control @error('onesignal_auth_key')? is-invalid @enderror">

                                            @error('onesignal_auth_key')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <p>{{ __('OneSignal configuration for organizer app:') }}</p>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Onesignal App Id') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="or_onesignal_app_id"
                                                placeholder="{{ __('OneSignal App Id') }}"
                                                value="{{ $setting->or_onesignal_app_id }}"
                                                class="form-control @error('or_onesignal_app_id')? is-invalid @enderror">

                                            @error('or_onesignal_app_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Onesignal Project Number') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="or_onesignal_project_number"
                                                placeholder="{{ __('Onesignal Project Number') }}"
                                                value="{{ $setting->or_onesignal_project_number }}"
                                                class="form-control @error('or_onesignal_project_number')? is-invalid @enderror">

                                            @error('or_onesignal_project_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Onesignal Api key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="or_onesignal_api_key"
                                                placeholder="{{ __('Onesignal Api key') }}"
                                                value="{{ $setting->or_onesignal_api_key }}"
                                                class="form-control @error('or_onesignal_api_key')? is-invalid @enderror">

                                            @error('or_onesignal_api_key')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>



                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Onesignal Auth Key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="or_onesignal_auth_key"
                                                placeholder="{{ __('Onesignal Auth Key') }}"
                                                value="{{ $setting->or_onesignal_auth_key }}"
                                                class="form-control @error('or_onesignal_auth_key')? is-invalid @enderror">

                                            @error('or_onesignal_auth_key')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <a href="https://documentation.onesignal.com/docs/accounts-and-keys"
                                                target="_blank"
                                                class="btn btn-primary demo-button mt-2">{{ __('Help') }}
                                            </a>

                                        </div>

                                    </div>



                                    <div class="form-group row mb-4">

                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                                        <div class="col-sm-12 col-md-7">

                                            <button type="submit"
                                                class="btn btn-primary demo-button">{{ __('Save') }}</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="card card-large-icons">

                        <div class="card-icon bg-primary text-white">

                            <i class="fas fa-sms"></i>

                        </div>

                        <div class="card-body">

                            <h4>{{ __('SMS Notification') }}</h4>

                            <p>{{ __('SMS configuration settings of twillio SMS gateway and vonage.') }}</p>

                            <a href="#push-sms-setting" aria-controls="push-sms-setting" role="button"
                                data-toggle="collapse" class="card-cta"
                                aria-expanded="false">{{ __('Change Setting') }} <i
                                    class="fas fa-chevron-right"></i></a>

                            <div class="collapse mt-3" id="push-sms-setting">

                                <form method="post" action="{{ url('save-sms-setting') }}">

                                    @csrf

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Enable SMS Notification') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div class="custom-switches-stacked mt-2">

                                                <label class="custom-switch pl-0">

                                                    <input type="checkbox" name="sms_notification"
                                                        {{ $setting->sms_notification == '1' ? 'checked' : '' }}
                                                        value="1" class="custom-switch-input">

                                                    <span class="custom-switch-indicator"></span>

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Enable Twillio') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch pl-0">
                                                    <input type="radio" name="enable_sms"
                                                        {{ $setting->enable_twillio == 1 ? 'checked' : '' }}
                                                        value="twillio" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </div>
                                            @error('enable_twillio')
                                                <div class="invalid-feedback block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Enable Vonage') }}</label>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch pl-0">
                                                    <input type="radio" name="enable_sms"
                                                        {{ $setting->enable_vonage == 1 ? 'checked' : '' }}
                                                        value="vonage" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </div>
                                            @error('enable_vonage')
                                                <div class="invalid-feedback block">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Twilio Account ID') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="twilio_account_id"
                                                placeholder="{{ __('Twilio Account ID') }}"
                                                value="{{ $setting->twilio_account_id }}"
                                                class="form-control @error('twilio_account_id')? is-invalid @enderror">

                                            @error('twilio_account_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Twilio auth token') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="twilio_auth_token"
                                                placeholder="{{ __('Twilio auth token') }}"
                                                value="{{ $setting->twilio_auth_token }}"
                                                class="form-control @error('twilio_auth_token')? is-invalid @enderror">

                                            @error('twilio_auth_token')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Twilio phone number') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="twilio_phone_number"
                                                placeholder="{{ __('Twilio phone number') }}"
                                                value="{{ $setting->twilio_phone_number }}"
                                                class="form-control @error('twilio_phone_number')? is-invalid @enderror">

                                            @error('twilio_phone_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <a href="https://www.twilio.com/docs/glossary/what-is-an-api-key"
                                                target="_blank"
                                                class="btn btn-primary demo-button mt-2">{{ __('Help') }}
                                            </a>
                                        </div>

                                    </div>
                                   
                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Vonage API key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="vonege_api_key"
                                                placeholder="{{ __('Vonage API key') }}"
                                                value="{{ $setting->vonege_api_key }}"
                                                class="form-control @error('vonege_api_key')? is-invalid @enderror">

                                            @error('vonege_api_key')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Vonage Account Secret') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="vonage_account_secret"
                                                placeholder="{{ __('Vonage Account Secret') }}"
                                                value="{{ $setting->vonage_account_secret }}"
                                                class="form-control @error('vonage_account_secret')? is-invalid @enderror">

                                            @error('vonage_account_secret')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Vonage Sender Number') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="vonage_sender_number"
                                                placeholder="{{ __('Vonage Sender Number') }}"
                                                value="{{ $setting->vonage_sender_number }}"
                                                class="form-control @error('vonage_sender_number')? is-invalid @enderror">

                                            @error('vonage_sender_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <a href="https://www.twilio.com/docs/glossary/what-is-an-api-key"
                                                target="_blank"
                                                class="btn btn-primary demo-button mt-2">{{ __('Help') }}
                                            </a>
                                        </div>

                                    </div>
                                    <div class="form-group row mb-4">

                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                                        <div class="col-sm-12 col-md-7">

                                            <button type="submit"
                                                class="btn btn-primary demo-button">{{ __('Save') }}</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="card card-large-icons">

                        <div class="card-icon bg-primary text-white">

                            <i class="fas fa-tools"></i>

                        </div>

                        <div class="card-body">

                            <h4>{{ __('Additional Setting') }}</h4>

                            <p>{{ __('General setting such as currency, map key, default map coordinates and so on.') }}

                            </p>

                            <a href="#additional-setting" aria-controls="additional-setting" role="button"
                                data-toggle="collapse" class="card-cta"
                                aria-expanded="false">{{ __('Change Setting') }} <i
                                    class="fas fa-chevron-right"></i></a>

                            <div class="collapse mt-3" id="additional-setting">

                                <form method="post" action="{{ url('additional-setting') }}">

                                    @csrf

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Currency') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <select required name="currency" class="form-control select2">

                                                <option value="">{{ __('Select default currency') }}</option>

                                                @foreach ($currencies as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $setting->currency_id == $item->id ? 'Selected' : '' }}>
                                                        {{ $item->currency . ' ( ' . $item->symbol . '- ' . $item->code . ')' }}({{ $item->country }})
                                                    </option>
                                                @endforeach

                                            </select>

                                            @error('currency')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('TimeZone') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <select required name="timezone" class="form-control select2">

                                                <option value="">{{ __('Select default Timezone') }}</option>

                                                @foreach ($timezone as $item)
                                                    <option value="{{ $item->TimeZone }}"
                                                        {{ $setting->timezone == $item->TimeZone ? 'Selected' : '' }}>

                                                        {{ $item->TimeZone }}</option>
                                                @endforeach

                                            </select>

                                            @error('timezone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Language') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <select required name="language" class="form-control select2">

                                                <option value="">{{ __('Select default Language') }}</option>

                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->name }}"
                                                        {{ $language->name == $setting->language ? 'Selected' : '' }}>

                                                        {{ $language->name === 'English' ? 'UK English' : $language->name }}</option>
                                                @endforeach

                                            </select>

                                            @error('language')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('App Version') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" required name="app_version"
                                                placeholder="{{ __('App Version') }}"
                                                value="{{ $setting->app_version }}"
                                                class="form-control @error('app_version')? is-invalid @enderror">

                                            @error('app_version')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('CopyRight content') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" required name="footer_copyright"
                                                placeholder="{{ __('Footer CopyRight Content') }}"
                                                value="{{ $setting->footer_copyright }}"
                                                class="form-control @error('footer_copyright')? is-invalid @enderror">

                                            @error('footer_copyright')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Map key') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" name="map_key" placeholder="{{ __('Map key') }}"
                                                value="{{ $setting->map_key }}"
                                                class="form-control @error('map_key')? is-invalid @enderror">

                                            @error('map_key')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <a href="https://docs.saasmonks.in/external-configuration-documentation-links/google-map-keys"
                                                target="_blank"
                                                class="btn btn-primary demo-button mt-2">{{ __('Help') }}
                                            </a>
                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Default Latitude') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" required name="default_lat"
                                                placeholder="{{ __('Default Latitude') }}"
                                                value="{{ $setting->default_lat }}"
                                                class="form-control @error('default_lat')? is-invalid @enderror">

                                            @error('default_lat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Default Longitude') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <input type="text" required name="default_long"
                                                placeholder="{{ __('Default Longitude') }}"
                                                value="{{ $setting->default_long }}"
                                                class="form-control @error('default_long')? is-invalid @enderror">

                                            @error('default_long')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Primary Color') }}</label>

                                        <div class="col-sm-12 col-md-9">

                                            <div class="input-group colorpickerinput">

                                                <input type="text" name="primary_color"
                                                    value="{{ $setting->primary_color }}"
                                                    placeholder="{{ __('Choose color') }}"
                                                    class="form-control  @error('primary_color')? is-invalid @enderror">

                                                <div class="input-group-append">

                                                    <div class="input-group-text color-input">

                                                    </div>

                                                </div>

                                            </div>

                                            @error('primary_color')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">

                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                                        <div class="col-sm-12 col-md-7">

                                            <button type="submit"
                                                class="btn btn-primary demo-button">{{ __('Save') }}</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="card card-large-icons">

                        <div class="card-icon bg-primary text-white">

                            <i class="fas fa-solid fa-users"></i>

                        </div>

                        <div class="card-body">

                            <h4>{{ __('Appuser Privacy Policy') }}</h4>

                            <p>{{ __('Describe appuser privacy policy') }}

                            </p>

                            <a href="#AppuserPrivacyPolicy" aria-controls="additional-setting" role="button"
                                data-toggle="collapse" class="card-cta"
                                aria-expanded="false">{{ __('Change Setting') }} <i
                                    class="fas fa-chevron-right"></i></a>

                            <div class="collapse mt-3" id="AppuserPrivacyPolicy">

                                <form method="post" action="{{ url('appuser-privacy-policy') }}">

                                    @csrf

                                    <div class="form-group ">

                                        <label>{{ __('Appuser Privacy Policy') }}</label>

                                        <textarea name="appuser_privacy_policy" Placeholder="{{ __('Privacy policy') }}"
                                            class="textarea_editor @error('appuser_privacy_policy')? is-invalid @enderror">

                                            {{ $setting->appuser_privacy_policy }}

                                        </textarea>

                                        @error('appuser_privacy_policy')
                                            <div class="invalid-feedback block">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="form-group">

                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                                        <div class="col-sm-12 col-md-7">

                                            <button type="submit"
                                                class="btn btn-primary demo-button">{{ __('Save') }}</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
                </form>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Test Mail') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <label class="col-form-label">{{ __('Recipient Email for SMTP Testing') }}</label>
                    <input type="email" name="mail_to" id="mail_to" value="{{ auth()->user()->email }}"
                        required class="form-control @error('mail_to') is-invalid @enderror">
                    @error('mail_to')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" class="btn btn-primary" id="TestMail">{{ __('Send') }}</button>
                </div>
                <div class="emailstatus text-right mr-3" id="emailstatus"></div>
                <div class="emailerror text-right mr-3 " id="emailerror"></div>
            </div>
        </div>
    </div>
    <style>
        .modal-backdrop {
            display: none;
        }
    </style>
@endsection
@php
    $gmapkey = App\Models\Setting::find(1)->map_key;
@endphp
@if ($gmapkey)
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ $gmapkey }}&libraries=places">
    </script>
@endif

<script>
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var input = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());
        });
    }
</script>
