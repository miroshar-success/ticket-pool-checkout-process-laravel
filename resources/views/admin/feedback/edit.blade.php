@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Edit Feedback'),
            'headerData' => __('Feedback'),
            'url' => 'feedback',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" class="feedback-form" action="{{ url('feedback/' . $feedback->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="rate">
                                    <div class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $feedback->rate >= $i ? 'active' : '' }}"
                                                onclick="addRatee('{{ $i }}')" id="rate-{{ $i }}"></i>
                                        @endfor
                                    </div>
                                    @error('rate')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" readonly value="{{ $feedback->email }}" name="email"
                                        placeholder="{{ __('Email') }}" value="{{ old('email') }}"
                                        class="form-control @error('email')? is-invalid @enderror">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Message') }}</label>
                                    <textarea name="message" placeholder="{{ __('Message') }}"
                                        class="form-control @error('message')? is-invalid @enderror">{{ $feedback->message }}</textarea>
                                    @error('message')
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
