@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Edit Language'),
            'headerData' => __('Language'),
            'url' => 'language',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Edit language') }}</h2>
                </div>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('language/' . $language->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group center">
                                            <label>{{ __('Image') }}</label>
                                            <div id="image-preview" class="image-preview"
                                                style="background-image: url({{ url('images/upload/' . $language->image) }})">
                                                <label for="image-upload" id="image-label">
                                                    <i class="fas fa-plus"></i></label>
                                                <input type="file" name="image" id="image-upload" />
                                            </div>
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label>{{ __('Language Name') }}</label>
                                            <input type="text" readonly name="name"
                                                placeholder="{{ __('Language Name') }}" value="{{ $language->name }}"
                                                class="form-control @error('name')? is-invalid @enderror">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Language Json File') }}</label>
                                            <input type="file" name="json_file" class="form-control" accept=".json">
                                            @error('json_file')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Direction')}}</label>
                                            <select name="direction" class="form-control select2">
                                                <option value="ltr" {{ $language->direction == 'ltr' ? 'selected' : '' }}>{{__('Ltr')}}</option>
                                                <option value="rtl" {{ $language->direction == 'rtl' ? 'selected' : '' }}>{{__('Rtl')}}</option>
                                            </select>
                                            @error('direction')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('status') }}</label>
                                            <select name="status" class="form-control select2">
                                                <option value="1" {{ $language->status == '1' ? 'selected' : '' }}>
                                                    {{ __('Active') }}</option>
                                                <option value="0" {{ $language->status == '0' ? 'selected' : '' }}>
                                                    {{ __('Inactive') }}</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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
