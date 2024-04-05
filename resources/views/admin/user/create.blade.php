@extends('master')

@section('content')
<section class="section">
    @include('admin.layout.breadcrumbs', [
        'title' => __('Add User'),
        'headerData' => __('Users') ,
        'url' => 'users' ,
    ])

    <div class="section-body">
        <div class="row">
            <div class="col-lg-8"><h2 class="section-title"> {{__('Add User')}}</h2></div>
        </div>

        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <form method="post" action="{{url('users')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{__('First Name')}}</label>
                                    <input type="text" name="first_name" placeholder="{{__('First Name')}}" value="{{old('first_name')}}" class="form-control @error('first_name')? is-invalid @enderror">
                                    @error('first_name')

                                        <div class="invalid-feedback">{{$message}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{__('Last Name')}}</label>
                                    <input type="text" name="last_name" placeholder="{{__('Last Name')}}" value="{{old('last_name')}}" class="form-control @error('last_name')? is-invalid @enderror">
                                    @error('last_name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{__('Email')}}</label>
                            <input type="email" name="email" placeholder="{{__('Email')}}" value="{{old('email')}}" class="form-control @error('email')? is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{__('Phone')}}</label>
                            <input type="text" name="phone" placeholder="{{__('Phone')}}" value="{{old('phone')}}" class="form-control @error('phone')? is-invalid @enderror">
                            @error('phone')
                                <div class="invalid-feedback">{{$message}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{__('Password')}}</label>
                            <input type="password" value="{{ old('password') }}" name="password" placeholder="{{__('Password')}}" class="form-control @error('password')? is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{__('Roles')}}</label>

                            <select name="roles[]" class="form-control select2" multiple="multiple" id="role">
                                @foreach ($roles as $per)
                                    <option value="{{$per['id']}}"{{ (collect(old('roles'))->contains($per->id)) ? 'selected':'' }}>{{$per['name']}}</option>
                                @endforeach
                            </select>
                            @error('roles')
                            <div class="invalid-feedback" style="display: inline-block;">{{$message}}</div>
                           @endif

                        </div>

                        <div class="form-group display-none" id="org">
                            <label>{{__('Organization')}}</label>
                            <select name="organization" class="form-control select2">
                                @foreach ($orgs as $org)
                                    <option value="{{$org['id']}}">{{$org['first_name'] .' '. $org['last_name']}}</option>
                                @endforeach
                            </select>
                            @error('organization')
                                <div class="invalid-feedback">{{$message}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary demo-button">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection
