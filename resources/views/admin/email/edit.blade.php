@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Edit Email'),
            'headerData' => __('Email'),
            'url' => 'events',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Edit Email') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" class="event-form" action="{{ route('email.update', $email->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Title') }}</label>
                                            <input type="text" name="title" id="title"
                                                   value="{{ $email->title }}"
                                                   placeholder="{{ __('Enter Title') }}"
                                                   class="form-control date @error('title') is-invalid @enderror">
                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Subject') }}</label>
                                            <input type="text" name="subject" id="subject"
                                                   value="{{ $email->subject }}" placeholder="{{ __('Enter Subject') }}"
                                                   class="form-control date @error('subject') is-invalid @enderror">
                                            @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>{{ __('Users') }}</label>
                                            <select name="to_user[]" class="form-control to_user select2" multiple>
                                                @foreach ($appUsers as $user)
                                                    <option value="{{ $user->id }}" {{ in_array($user->id, $toUserArray) ? 'selected' : '' }}>
                                                        {{ $user->name . ' ' . $user->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('to_user')
                                            <div class="invalid-feedback block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Description') }}</label>
                                    <textarea name="description" Placeholder="Description"
                                              class="textarea_editor @error('description') is-invalid @enderror">
                                        {{ $email->description }}
                                    </textarea>
                                    @error('description')
                                    <div class="invalid-feedback block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-primary demo-button">{{ __('Update') }}
                                    </button>
                                </div>
                            </form>
                            <form action="{{ route('email.resend', $email->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Resend Email</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
