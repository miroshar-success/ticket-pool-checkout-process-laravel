@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Add Blog'),
            'headerData' => __('Blog'),
            'url' => 'blog',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Add Blog') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('blog') }}" enctype="multipart/form-data">
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
                                                <div class="invalid-feedback block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label>{{ __('Title') }}</label>
                                            <input type="text" name="title" placeholder="{{ __('Title') }}"
                                                value="{{ old('title') }}"
                                                class="form-control @error('title')? is-invalid @enderror">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __('Category') }}</label>
                                                    <select name="category_id" class="form-control select2">
                                                        <option value="">{{ __('Select Category') }}</option>
                                                        @foreach ($category as $item)
                                                            <option
                                                                value="{{ $item->id }}"{{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __('status') }}</label>
                                                    <select name="status" class="form-control select2">
                                                        <option value="1">{{ __('Active') }}</option>
                                                        <option value="0"
                                                            {{ old('status') == '0' ? 'selected' : '' }}>
                                                            {{ __('Inactive') }}</option>
                                                    </select>
                                                    @error('status')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Tags') }}</label>
                                            <input type="text" name="tags" value="{{ old('tags') }}"
                                                class="form-control inputtags @error('tags')? is-invalid @enderror">
                                            @error('tags')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group ">
                                            <label>{{ __('Description') }}</label>
                                            <textarea name="description" placeholder="{{ __('Description') }}"
                                                class="textarea_editor custom-height @error('description')? is-invalid @enderror">{{ old('description') }}</textarea>
                                            @error('description')
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
        <style>
            .modal-backdrop {
               display: none;
            }
        </style>
    </section>
@endsection
