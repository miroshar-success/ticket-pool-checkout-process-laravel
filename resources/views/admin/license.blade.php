@extends('master')

@section('content-license')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('License Setting'),
    ])

    <div class="section-body">
        <div class="row">
            <div class="col-lg-8"><h2 class="section-title"> {{__('License Setting')}}</h2></div>
        </div>

        <div class="row">
            <div class="col-12">
                @if (session('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                    <form method="post" action="{{url('save-license-setting')}}">
                        @csrf
                        <div class="form-group">
                            <label>{{__('License Key')}}</label>
                        <input type="text" name="license_key" placeholder="{{ __('License Key') }}"  value="{{$setting->license_key}}" class="form-control @error('license_key')? is-invalid @enderror">
                            @error('license_key')
                                <div class="invalid-feedback">{{$message}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{__('Client Name')}}</label>
                            <input type="text" name="license_name" placeholder="{{ __('Client Name') }}"  value="{{$setting->license_name}}" class="form-control @error('license_name')? is-invalid @enderror">
                            @error('license_name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit"  class="btn btn-primary demo-button">{{__('Submit')}}</button>

                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection
