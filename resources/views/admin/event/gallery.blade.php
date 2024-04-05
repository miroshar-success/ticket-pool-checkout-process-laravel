@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Event Gallery'),
            'headerData' => __('Event'),
            'url' => 'events',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Event Gallery') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-12 form-group">
                                    <div class="image-gallery">
                                        <div class="row">
                                            @foreach (array_filter(explode(',', $data->gallery)) as $item)
                                                <div class="col-lg-12">
                                                    <div class="img">
                                                        <img src="{{ url('images/upload/' . $item) }}">
                                                        <h4>{{ $item }}</h4>
                                                        <a href="{{ url('remove-image/' . $item . '/' . $data->id) }}"
                                                            title="Remove Image" class="text-danger"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="data_id" value="{{ $data->id }}">
                                    <div class="dropzone dropzone-multiple" data-toggle="dropzone" data-dropzone-multiple
                                        data-dropzone-url="{{ url('add-event-gallery') }}">
                                        @csrf
                                        <div class="fallback">
                                            <div class="custom-file">

                                                <input type="file" name="image[]" accept=".png, .jpg, .jpeg, .svg"
                                                    class="custom-file-input" id="dropzoneMultipleUpload" multiple>
                                                <label class="custom-file-label" for="dropzoneMultipleUpload">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                        <ul
                                            class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                            <li class="list-group-item px-0">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar">
                                                            <img class="avatar-img rounded" src="" alt=""
                                                                data-dz-thumbnail>
                                                        </div>
                                                    </div>
                                                    <div class="col ml--3">
                                                        <h4 class="mb-1" data-dz-name>...</h4>
                                                        <p class="small text-muted mb-0" data-dz-size>...</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-ellipses dropdown-toggle"
                                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item" data-dz-remove>
                                                                    {{ __('Remove') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="{{ url('events') }} " class="btn" style="background-color: #65469b">
                                            Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
