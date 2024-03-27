@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Edit Roles'),
            'headerData' => __('Roles'),
            'url' => 'roles',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Edit Roles') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('roles.update', [$role->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" name="name" value="{{ $role->name }}"
                                        placeholder="{{ __('Name') }}"
                                        class="form-control @error('name')? is-invalid @enderror" readonly>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Permissions') }}</label>
                                    <select name="permissions[]" class="form-control select2" multiple="multiple">
                                        @foreach ($permissions as $per)
                                            <option value="{{ $per['id'] }}"
                                                {{ in_array($per->id, old('permissions', [])) || (isset($role) && $role->permissions->contains($per->id)) ? 'selected' : '' }}>
                                                {{ $per['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('permissions')
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
