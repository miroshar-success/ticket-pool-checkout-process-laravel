@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Send Notification'),
        ])

        <div>
            <h2 class="section-title">{{ __('Send Notification') }}</h2>
        </div>
        <div class="row">

            <div class="col-12">
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

                <div class="card">
                    <div class="card-body">
                        <form method="post" class="event-form" action="{{ url('/send-notification') }} ">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('Title') }}</label>
                                <input type="text" name="title" placeholder="{{ __('New notification') }}"
                                    value="{{ old('title') }}" class="form-control @error('title') ? is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('Description') }}</label>
                                <textarea name="description" class="form-control @error('description') ? is-invalid @enderror">{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (Auth::user()->hasRole('admin'))
                            <div class="form-group">
                                <label for="organizer_ids">{{__('Organizer')}}</label>
                                <select name="organizer_ids[]" id="" multiple data-live-search="true"
                                    class=" selectpicker form-control">
                                    @foreach ($user as $item)
                                        @if ($item->hasRole('Organizer'))
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="form-group">

                                <label for="user_ids">{{__('Appuser')}}</label>
                                <select name="user_ids[]" id="" multiple  data-live-search="true"
                                    class=" selectpicker form-control">
                                    @foreach ($appuser as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Image') }}</label>
                                <input type="file" name="image" value="{{ old('image') }}"
                                    class="form-control @error('image') ? is-invalid @enderror" onchange="readURL(this)">
                                <img class="mt-3" src="" id="img" style='height:100px'>

                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-success" type="submit"
                                    name="submit">{{ __('Send Notification') }}</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>



    @section('js')
        <script>
            $('select').select2();
        </script>
    @endsection
</section>
@endsection
