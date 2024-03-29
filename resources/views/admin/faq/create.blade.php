@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Add Faq'),
            'headerData' => __('Faq'),
            'url' => 'faq',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Add Faq') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('faq') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>{{ __('Question') }}</label>
                                    <input type="text" name="question" placeholder="{{ __('Question') }}"
                                        value="{{ old('question') }}"
                                        class="form-control @error('question')? is-invalid @enderror">
                                    @error('question')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Answer') }}</label>
                                    <textarea name="answer" placeholder="{{ __('Answer') }}" class="form-control @error('answer')? is-invalid @enderror">{{ old('answer') }}</textarea>
                                    @error('answer')
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
