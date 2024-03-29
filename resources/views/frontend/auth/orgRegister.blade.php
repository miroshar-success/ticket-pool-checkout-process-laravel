@extends('frontend.auth.app')
@section('title',__('Organizer Register'))
@section('content')

    <div class="Card-sc-8zkhaa-0 card-register styled__StyledCard-mxvrth-1 fogDtz">
        <form action="{{url('user/org-register')}}" method="post">
        @csrf
            <p data-qa="title" class="Text-st1i2q-0 styled__Title-sc-1subqgs-0 jTZzYs">{{__('Sign up as organizer')}} </p>
            <input type="hidden" value="{{url()->previous()}}" name="url" >
            <div class="NGrUbJBA _1Z8A3Tz5 _1FaKA6Nk _3cNt_ILG LoginForm__StyledGrid-sc-1jdwe0j-1 iPBaVu">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="_1RLMtIP3 _1w0U-CY6 Qso_pkui mb-4">
                            <div class="_2iCrTJcD"><label class="_2x_Fz5Ot" data-qa="label-name">{{__('First Name')}}</label></div>
                            <div class="_2fessCXR p2xx3nlH up-A7EAi">
                                <input autocomplete="off" class="RJT7RW5k" required name="first_name" type="text" value="{{old('first_name')}}" placeholder="{{ __('First Name') }}">
                            </div>
                            @error('first_name')
                                <div class="_2OcwfRx4" data-qa="email-status-message">{{$message}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="_1RLMtIP3 _1w0U-CY6 Qso_pkui mb-4">
                            <div class="_2iCrTJcD"><label class="_2x_Fz5Ot" data-qa="label-name">{{__('Last Name')}}</label></div>
                            <div class="_2fessCXR p2xx3nlH up-A7EAi">
                                <input autocomplete="off" class="RJT7RW5k" required name="last_name" value="{{old('last_name')}}"  type="text" placeholder="{{ __('Last Name') }}">
                            </div>
                            @error('last_name')
                                <div class="_2OcwfRx4" data-qa="email-status-message">{{$message}}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="_1RLMtIP3 _1w0U-CY6 Qso_pkui mb-4">
                            <div class="_2iCrTJcD"><label class="_2x_Fz5Ot" data-qa="label-name">{{__('Email')}}</label></div>
                            <div class="_2fessCXR p2xx3nlH up-A7EAi">
                                <input autocomplete="off" class="RJT7RW5k" required name="email" type="email" value="{{old('email')}}"  placeholder="{{ __('Your Email') }}">
                            </div>
                            @error('email')
                                <div class="_2OcwfRx4" data-qa="email-status-message">{{$message}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="_1RLMtIP3 _1w0U-CY6 Qso_pkui mb-4">
                            <div class="_2iCrTJcD"><label class="_2x_Fz5Ot" data-qa="label-name">{{__('Phone')}}</label></div>
                            <div class="_2fessCXR p2xx3nlH up-A7EAi">
                                <input autocomplete="off" class="RJT7RW5k" required name="phone" type="text" value="{{old('phone')}}"  placeholder="{{ __('Contact') }}">
                            </div>
                            @error('phone')
                                <div class="_2OcwfRx4" data-qa="email-status-message">{{$message}}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="_1RLMtIP3 Qso_pkui mb-4">
                            <div class="_2iCrTJcD"> <label class="_2x_Fz5Ot" data-qa="label-name">{{__('Password')}}</label> </div>
                            <div class="_2fessCXR p2xx3nlH">
                                <input autocomplete="off" class="RJT7RW5k" required name="password" type="password" placeholder="{{ __('Your password') }}">
                            </div>
                            @error('password')
                                <div class="_2OcwfRx4" data-qa="email-status-message">{{$message}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="_1RLMtIP3 Qso_pkui mb-4">
                            <div class="_2iCrTJcD"> <label class="_2x_Fz5Ot" data-qa="label-name">{{__('Confirm Password')}}</label> </div>
                            <div class="_2fessCXR p2xx3nlH">
                                <input autocomplete="off" class="RJT7RW5k" required name="confirm_password" type="password" placeholder="{{ __('Confirm password') }}">
                            </div>
                            @error('confirm_password')
                                <div class="_2OcwfRx4" data-qa="email-status-message">{{$message}}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <?php $country = App\Models\Currency::get(); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="_1RLMtIP3 Qso_pkui mb-4">
                            <div class="_2iCrTJcD"> <label class="_2x_Fz5Ot" data-qa="label-name">{{__('Organization Name')}}</label> </div>
                            <div class="_2fessCXR p2xx3nlH">
                                <input autocomplete="off" class="RJT7RW5k" required name="name" type="text" placeholder="{{ __('Organization Name') }}">
                            </div>
                            @error('name')
                                <div class="_2OcwfRx4" data-qa="email-status-message">{{$message}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="_1RLMtIP3 Qso_pkui mb-4">
                            <div class="_2iCrTJcD"> <label class="_2x_Fz5Ot" data-qa="label-name">{{__('Country')}}</label> </div>
                            <div class="_2fessCXR p2xx3nlH">
                                <select class="RJT7RW5k select2" required name="country" >
                                    <option value=""> {{ __('Choose Country') }}</option>
                                    @foreach ($country as $item)
                                        <option value="{{$item->country}}" {{old('country') == $item->country ? 'Selected' : ''}}>{{$item->country}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('country')
                                <div class="_2OcwfRx4" data-qa="email-status-message">{{$message}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="Flex-nqja63-0 styled__ButtonWrapper-sc-1vy69nr-0 lhtHXX">
                <button type="submit" data-qa="login-button" class="styled__ButtonWrapper-sc-56doij-3 hnulbU">
                    {{__('Sign up')}}
                </button>
            </div>
            <div class="styled__Container-sc-1hvy7mz-0 gszpcs text-center">
                <p class="Text-st1i2q-0 styled__Description-sc-1hvy7mz-1 haeOQU">{{__('Already have a business account?')}}</p>
                <a class="_3Li0AqmO" href="{{url('login')}}">{{__('Sign in now')}}</a>
            </div>
        </form>
    </div>


@endsection
