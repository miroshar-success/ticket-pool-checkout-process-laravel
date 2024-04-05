@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Add Ticket'),
            'headerData' => __('Ticket'),
            'url' => $event->id . '/' . preg_replace('/\s+/', '-', $event->name) . '/tickets',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Add Ticket') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" class="ticket-form" action="{{ url('ticket/create') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <div class="form-group">
                                    <div class="selectgroup">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type"
                                                {{ old('type') == 'free' ? '' : 'checked' }} value="paid"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">{{ __('Paid') }}</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" {{ old('type') == 'free' ? 'checked' : '' }}
                                                name="type" value="free" class="selectgroup-input">
                                            <span class="selectgroup-button">{{ __('Free') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Name') }}</label>
                                            <input type="text" name="name" placeholder="{{ __('Name') }}"
                                                value="{{ old('name') }}"
                                                class="form-control @error('name')? is-invalid @enderror">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Quantity') }}</label>
                                            <input type="number" name="quantity" min="1"
                                                placeholder="{{ __('Quantity') }}" value="{{ old('quantity') }}"
                                                class="form-control @error('quantity')? is-invalid @enderror">
                                            @error('quantity')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <label>{{ __('Price') }} ({{ $currency }})</label>
                                            <input type="number" name="price" min="1"
                                                placeholder="{{ __('Price') }}" id="price" step="any"
                                                value="{{ old('price') }}"
                                                class="form-control @error('price')? is-invalid @enderror">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Maximum ticket per order') }}</label>
                                            <input type="number" name="ticket_per_order" min="1" required
                                                placeholder="{{ __('Maximum ticket per order') }}" id="ticket_per_order"
                                                value="{{ old('ticket_per_order') }}"
                                                class="form-control @error('ticket_per_order')? is-invalid @enderror">
                                            @error('ticket_per_order')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Sale Start Time') }}</label>
                                            <input type="text" name="start_time" id="start_time"
                                                value="{{ old('start_time') }}"
                                                placeholder="{{ __('Choose Start time') }}"
                                                class="form-control date @error('start_time')? is-invalid @enderror">
                                            @error('start_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Sale End Time') }}</label>
                                            <input type="text" name="end_time" id="end_time"
                                                value="{{ old('end_time') }}" placeholder="{{ __('Choose End time') }}"
                                                class="form-control date @error('end_time')? is-invalid @enderror">
                                            @error('end_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Valid on') }}</label>
                                            <select name="allday" id=""
                                                class="form-control @error('allday')? is-invalid @enderror  w-100">
                                                <option value="1">{{ __('Anyday of the event') }}
                                                </option>
                                                <option value="0">{{ __('Only on date chosen by the customer during booking') }}</option>
                                            </select>
                                            @error('allday')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Maximum Check-ins (leave blank to allow unlimited)') }}</label>
                                            <input type="number" name="maximum_checkins"
                                                placeholder="{{ __('Maximum Check-ins') }}" id="maximum_checkins"
                                                value="{{ old('maximum_checkins') }}"
                                                class="form-control @error('maximum_checkins')? is-invalid @enderror">
                                            @error('maximum_checkins')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Description') }}</label>
                                            <textarea name="description" placeholder="{{ __('Description') }}"
                                                class="form-control @error('description')? is-invalid @enderror">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('status') }}</label>
                                            <select name="status" class="form-control select2">
                                                <option value="1">{{ __('Active') }}</option>
                                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                                    {{ __('Inactive') }}</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if ($seatModule->is_enable ==1 )
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Seatmap (After saving this form, you cannot remove or change this choice)' ) }}</label>
                                            <select name="seatmap_id" id="" class="form-control select2">
                                                <option value="null" selected>{{__('None')}}</option>
                                                @foreach ($seatMaps as $item)
                                                    <option value="{{$item->id}}">{{$item->map_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('seatmap_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>{{ __('Ticket Key') }}</label>
                                        <input type="number" name="ticket_key" min="1"
                                            placeholder="{{ __('Ticket Key') }}" id="ticket_key"
                                            value="{{ old('ticket_key') }}"
                                            class="form-control @error('ticket_key')? is-invalid @enderror">
                                        @error('ticket_key')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <button type="submit"
                                                class="btn btn-primary demo-button">{{ __('Submit') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
