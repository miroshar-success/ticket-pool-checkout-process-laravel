@extends('master')



@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Setting'),
        ])
        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Organizer Setting') }}</h2>
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
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="card-body">
                            <h4>{{ __('Payment Setting') }}</h4>
                            <p>{{ __('Payment settings include different payment gateway and which will display top the admin for the Settlement Payout. Local Payment (cash ) option will be shown to the admin by default. Only selected gateways will be visible.') }}
                            </p>
                            <a href="#payment-setting" aria-controls="payment-setting" role="button"
                                data-toggle="collapse" class="card-cta"
                                aria-expanded="false">{{ __('Change Setting') }}
                                <i class="fas fa-chevron-right"></i></a>
                            <div class="collapse mt-3" id="payment-setting">
                                <form method="post" action="{{ url('payment-save') }}">
                                    @csrf
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
                                                placeholder="{{ __('Stripe secret key') }}" value="{{$payment->stripeSecretKey}}"
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
                                                placeholder="{{ __('Stripe public key') }}" value="{{$payment->stripePublicKey}}"
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
                                                placeholder="{{ __('Paypal Client ID') }}" value="{{$payment->paypalClientId}}"
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
                                                placeholder="{{ __('Paypal Secret key') }}" value="{{$payment->paypalSecret}}"
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
                                                placeholder="{{ __('Razorpay Publish key') }}" value="{{$payment->razorPublishKey}}"
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
                                                placeholder="{{ __('Razorpay Secret key') }}" value="{{$payment->razorSecretKey}}"
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
                                                placeholder="{{ __('Flutterwave public key') }}" value="{{$payment->ravePublicKey}}"
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
                                                placeholder="{{ __('Flutterwave secret key') }}" value="{{$payment->raveSecretKey}}"
                                                class="form-control @error('raveSecretKey')? is-invalid @enderror">
                                            @error('raveSecretKey')
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
                </form>
            </div>
        </div>
    </section>
    ` <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                    <input type="email" name="mail_to" id="mail_to" value="{{ auth()->user()->email }}" required
                        class="form-control @error('mail_to') is-invalid @enderror">
                    @error('mail_to')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" class="btn btn-primary" id="TestMail">{{ __('Send') }}</button>
                </div>
                <div class="emailstatus text-right mr-3" id="emailstatus"></div>
                <div class="emailerror text-right mr-3 " id="emailerror"></div>
            </div>
        </div>
    </div>
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
