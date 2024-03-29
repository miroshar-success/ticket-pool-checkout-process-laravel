@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Edit Ticket'),
            'headerData' => __('Ticket'),
            'url' => $event->id . '/' . preg_replace('/\s+/', '-', $event->name) . '/tickets',
        ])

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"> {{ __('Edit Ticket') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" class="ticket-form" action="{{ url('ticket/update/' . $ticket->id) }}"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <div class="form-group">
                                    <div class="selectgroup">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="type"
                                                {{ $ticket->type == 'free' ? '' : 'checked' }} value="paid"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">{{ __('Paid') }}</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" {{ $ticket->type == 'free' ? 'checked' : '' }}
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
                                                value="{{ $ticket->name }}"
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
                                                placeholder="{{ __('Quantity') }}" value="{{ $ticket->quantity }}"
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
                                                {{ $ticket->type == 'free' ? 'disabled' : '' }}
                                                placeholder="{{ __('Price') }}" id="price"
                                                value="{{ $ticket->price }}" step="any"
                                                class="form-control @error('price')? is-invalid @enderror">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Maximum ticket per order') }}</label>
                                            <input type="number" name="ticket_per_order" min="1"
                                                placeholder="{{ __('Maximum ticket per order') }}" id="ticket_per_order"
                                                value="{{ $ticket->ticket_per_order }}"
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
                                                value="{{ $ticket->start_time }}"
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
                                                value="{{ $ticket->end_time }}" placeholder="{{ __('Choose End time') }}"
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
                                                <option value="1" {{ $ticket->allday == 1 ? 'selected' : '' }}>
                                                    {{ __('Anyday of the event') }}
                                                </option>
                                                <option value="0" {{ $ticket->allday == 0 ? 'selected' : '' }}>
                                                    {{ __('Only on date chosen by the customer during booking') }}</option>
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
                                                value="{{ $ticket->maximum_checkins }}"
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
                                                class="form-control @error('description')? is-invalid @enderror">{{ $ticket->description }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('status') }}</label>
                                            <select name="status" class="form-control select2">
                                                <option value="1" {{ $ticket->status == '1' ? 'selected' : '' }}>
                                                    {{ __('Active') }}</option>
                                                <option value="0" {{ $ticket->status == '0' ? 'selected' : '' }}>
                                                    {{ __('Inactive') }}</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>{{ __('Ticket Key') }}</label>
                                        <input type="number" name="ticket_key" min="1" required
                                            placeholder="{{ __('Ticket Key') }}" id="ticket_key"
                                            value="{{ $ticket->ticket_key }}"
                                            class="form-control @error('ticket_key')? is-invalid @enderror">
                                        @error('ticket_key')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
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
