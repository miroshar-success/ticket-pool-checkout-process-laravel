@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Edit Coupon'),
            'headerData' => __('Coupon'),
            'url' => 'coupon',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Edit Coupon') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('coupon/' . $coupon->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name" placeholder="{{ __('Name') }}"
                                                value="{{ $coupon->name }}"
                                                class="form-control @error('name')? is-invalid @enderror">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Event') }}</label>
                                            <select name="event_id" class="form-control select2">
                                                <option value="">{{ __('Select Event') }}</option>
                                                @foreach ($event as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $coupon->event_id ? 'Selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('event_id')
                                                <div class="invalid-feedback block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Discount (In percentage)') }}</label>
                                            <input type="number" min="1" max="100" name="discount" step="any"
                                                placeholder="{{ __('Discount') }}" value="{{ $coupon->discount }}"
                                                class="form-control @error('discount')? is-invalid @enderror">
                                            @error('discount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Maximum Usage count per Organizer') }}</label>
                                            <input type="number" min="1" name="max_use"
                                                placeholder="{{ __('Maximum Use') }}" value="{{ $coupon->max_use }}"
                                                class="form-control @error('max_use')? is-invalid @enderror">
                                            @error('max_use')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Discount type ') }}</label>
                                            @if ($coupon->discount_type == 0)
                                                <select name="discount_type" id="">
                                                    <option selected value=0>Percentage</option>
                                                    <option value=1>Amount</option>
                                                </select>
                                            @else
                                                <select name="discount_type" id="">
                                                    <option value=0>Percentage</option>
                                                    <option selected value=1>Amount</option>
                                                </select>
                                            @endif
                                            @error('discount_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Valid From') }}</label>
                                            <input type="text" name="start_date" placeholder="{{ __('Valid From') }}"
                                                id="start_date" value="{{ $coupon->start_date }}"
                                                class="form-control date @error('start_date')? is-invalid @enderror">
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Valid Till') }}</label>
                                            <input type="text" name="end_date" placeholder="{{ __('Valid Till') }}"
                                                id="end_date" value="{{ $coupon->end_date }}"
                                                class="form-control date @error('end_date')? is-invalid @enderror">
                                            @error('end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Minimum Amount') }}</label>
                                            <input type="number" name="minimum_amount"
                                                placeholder="{{ __('Minimum Amount') }}" id="minimum_amount"
                                                value="{{ $coupon->minimum_amount }}"
                                                class="form-control  @error('minimum_amount')? is-invalid @enderror">
                                            @error('minimum_amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Maximum Discount') }}</label>
                                            <input type="number" name="maximum_discount"
                                                placeholder="{{ __('Maximum Discount') }}" id="maximum_discount"
                                                value="{{ $coupon->maximum_discount }}"
                                                class="form-control  @error('maximum_discount')? is-invalid @enderror">
                                            @error('maximum_discount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Description') }}</label>
                                    <textarea name="description" class="form-control @error('description')? is-invalid @enderror"
                                        placeholder="{{ __('Description') }}">{{ $coupon->description }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('status') }}</label>
                                    <select name="status" class="form-control select2">
                                        <option value="1" {{ $coupon->status == '1' ? 'Selected' : '' }}>
                                            {{ __('Active') }}</option>
                                        <option value="0" {{ $coupon->status == '0' ? 'selected' : '' }}>
                                            {{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn-primary demo-button">{{ __('Submit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
