@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Module'),
        ])

        <div class="section-body">

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
                <div class="col-12 d-none" id="moduleRemove-success">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div id="successMessageText"></div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-none" id="moduleRemove-error">
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div id="errorMessageText"></div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4 mt-2">
                                <div class="col-lg-8">
                                    <h2 class="section-title mt-0"> {{ __('All Module') }}</h2>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="report_table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Upload') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($modules as $module)
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <h6 class="mt-3">{{ $module->module }}</h6>
                                                </td>
                                                <td>
                                                    <h5>
                                                        <span class="badge {{ $module->is_enable == '1' ? 'badge-success' : 'badge-danger' }}  m-1">{{ $module->is_enable == '1' ? 'Enable' : 'Disable' }}</span>
                                                    </h5>
                                                </td>
                                                <td>
                                                    <a href="{{ url('module/' . $module->id . '/edit')}}" class="btn btn-primary">
                                                        <i class="fas fa-cloud-upload-alt"></i> Upload Module
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($module->is_install === 1)
                                                        <a onclick="deleteModule({{ $module->id }})"
                                                            href="javascript:void(0);" class="btn-icon text-danger ml-2">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                        <label class="custom-switch pl-0 ml-2">
                                                            <input type="checkbox" name="module_enable" {{ $module->is_enable == '1' ? 'checked' : '' }} value="1" class="custom-switch-input" data-param1="{{ $module->id }}" onchange="checkboxChanged(this)">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
