@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Add Module'),
            'headerData' => __('Module'),
            'url' => 'module',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Upload Module') }}</h2>
                </div>
            </div>
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
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="my-0">
                                <div class="form-group">
                                    <div class="module-section-header mb-3">
                                        <h1>Seating Arrangement Module <a href="#" target="_blank">(Coming Soon)</a></h1>
                                    </div>
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ url('module') }}">
                                        @csrf
                                        <input type="hidden" name="module_id" value="{{ $module->id }}"/>
                                        <label class="form-control-label" for="zip">{{ __('Upload File') }}</label>
                                        <div class="input-group">
                                            <input type="file" accept=".zip" name="upload_file" id="zip" style="border: 1px solid #ccc; padding: 8px; width: 100%;">
                                        </div>
                                        <div class="invalid-div"><span class="zip"></span></div>
                                        <div class="mt-4">
                                            <button type="submit" name="action" value="store" class="btn rtl-float-none btn-primary mb-5">{{ __('Submit') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
