@extends('master')

@section('content')
    <section class="section">
        @include('admin.layout.breadcrumbs', [
            'title' => __('Email Notifications'),
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4 mt-2">
                                <div class="col-lg-8">
                                    <h2 class="section-title mt-0"> {{ __('All Emails') }}</h2>
                                </div>
                                <div class="col-lg-4 text-right">
                                    @can('event_create')
                                        <button class="btn btn-primary add-button"><a href="{{ url('email/create') }}"><i
                                                    class="fas fa-plus"></i> {{ __('Add New') }}</a></button>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="report_table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Subject') }}</th>
                                            <th>{{ __('Description') }}</th>
{{--                                            <th>{{ __('To User') }}</th>--}}
                                            <th>{{ __('Modified Date') }}</th>
                                            @if (Gate::check('email_edit') || Gate::check('email_delete'))
                                                <th>{{ __('Action') }}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $item)
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <p class="mb-0">{{ $item->title }}</p>
                                                </td>
                                                <td>
                                                    <p class="mb-0">{{ $item->subject }}</p>
                                                </td>
{{--                                                <td>--}}
{{--                                                    <p class="mb-0">{{ $item->description }}</p>--}}
{{--                                                </td>--}}
                                                <td>
                                                    @php
                                                        $toUserIds = explode(',', $item->to_user);
                                                        $toUserNames = [];
                                                        foreach ($toUserIds as $userId) {
                                                            $user = \App\Models\AppUser::find($userId);
                                                            if ($user) {
                                                                $toUserNames[] = $user->name . ' ' . $user->last_name;
                                                            }
                                                        }
                                                    @endphp
                                                    <p class="mb-0">{{ implode(', ', $toUserNames) }}</p>
                                                </td>

                                                <td>
                                                    <p class="mb-0">
                                                        {{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d h:i a') . ', ' . $item->created_at->format('l') }}
                                                    </p>
                                                </td>

                                                @if (Gate::check('event_edit') || Gate::check('event_delete'))
                                                    <td>
{{--                                                        <a href="{{ url('/email/show', $item->id) }}" title="View Email"--}}
{{--                                                            class="btn-icon"><i class="fas fa-eye"></i></a>--}}
                                                        @can('email_edit')
                                                            <a href="{{ route('email.edit', $item->id) }}" title="Edit Email"
                                                                class="btn-icon"><i class="fas fa-edit"></i></a>
                                                        @endcan
                                                        @can('email_delete')
                                                            <a href="#"
                                                                onclick="deleteData('email','{{ $item->id }}');"
                                                                title="Delete Email" class="btn-icon text-danger"><i
                                                                    class="fas fa-trash-alt text-danger"></i></a>
                                                        @endcan
                                                    </td>
                                                @endif
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
