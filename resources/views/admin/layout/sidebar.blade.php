@php
    $logo = \App\Models\Setting::find(1)->logo;
    $favicon = \App\Models\Setting::find(1)->favicon;
    $modules = \App\Models\Module::all();
@endphp
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
                <img src="{{ $logo ? asset('/images/upload/' . $logo) : asset('/images/logo.png') }}"
                    class="header-logo w-full  ">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">
                <img src="{{ $favicon ? asset('/images/upload/' . $favicon) : asset('/images/logo.png') }}"
                    class="header-sm-logo h-15 w-15">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Menu') }}</li>
            @role('admin')
                @can('admin_dashboard')
                    <li class="{{ request()->is('admin/home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/home') }}">
                            <i class="fas fa-chart-pie"></i> <span>{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                @endcan
            @endrole

            @role('Organizer')
                @can('organization_dashboard')
                    <li class="{{ request()->is('organization/home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('organization/home') }}">
                            <i class="fas fa-chart-pie"></i> <span>{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                @endcan
            @endrole
            @role('Organizer')
                @can('Book_tickets')
                    <li class="{{ request()->is('book-ticket') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('book-ticket') }}">
                            <i class="fas fa-ticket-alt"></i> <span>{{ __('Book Ticket') }}</span>
                        </a>
                    </li>
                @endcan
            @endrole
            @can('role_access')
                <li class="{{ request()->is('roles*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('roles') }}">
                        <i class="fas fa-user-secret"></i> <span>{{ __('Role') }}</span>
                    </a>
                </li>
            @endcan
            @can('user_access')
                <li class="{{ request()->is('users*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('users') }}">
                        <i class="fas fa-user-friends"></i> <span>{{ __('Users') }}</span>
                    </a>
                </li>
            @endcan
            <li class="{{ request()->is('orders*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('orders') }}">
                    <i class="fas fa-columns"></i><span>{{ __('Orders') }}</span>
                </a>
            </li>
            @can('category_access')
                <li class="{{ request()->is('category*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('category') }}">
                        <i class="fas fa-glass-cheers"></i> <span>{{ __('Category') }}</span>
                    </a>
                </li>
            @endcan

{{--            <li class="{{ request()->is('get-notification*') ? 'active' : '' }}">--}}
{{--                <a class="nav-link" href="{{ url('get-notification') }}">--}}
{{--                    <i class="fas fa-bell"></i> <span>{{ __('Send Notification') }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}

            @can('email_access')
                <li class="{{ request()->is('email*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('email') }}">
                        <i class="fas fa-envelope"></i> <span>{{ __('Email Notofications') }}</span>
                    </a>
                </li>
            @endcan

            @can('event_access')
                <li class="{{ request()->is('events*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('events') }}">
                        <i class="fas fa-calendar-alt"></i> <span>{{ __('Events') }}</span>
                    </a>
                </li>
            @endcan
            <li class="{{ request()->is('app-user*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('app-user') }}">
                    <i class="fas fa-users"></i> <span>{{ __('App Users') }}</span>
                </a>
            </li>
            @if (!Auth::user()->hasRole('Organizer'))
            <li class="{{ request()->is('wallet-transactions*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('allTransactions') }}">
                    <i class="fa-solid fa-wallet"></i><span>{{ __('Wallet Transactions') }}</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->hasRole('Organizer'))
                <li class="{{ request()->is('scanner*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('scanner') }}">
                        <i class="fas fa-id-card"></i> <span>{{ __('Scanner') }}</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->hasRole('Organizer'))
                <li class="{{ request()->is('/organization/income') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/organization/income') }}">
                        <i class="fa-solid fa-money-bill-wave"></i> <span>{{ __('Income') }}</span>
                    </a>
                </li>
            @endif
            @can('blog_access')
                <li class="{{ request()->is('blog*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('blog') }}">
                        <i class="fas fa-file-alt"></i><span>{{ __('Blog') }}</span>
                    </a>
                </li>
            @endcan
            @can('coupon_access')
                <li class="{{ request()->is('coupon*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('coupon') }}">
                        <i class="fas fa-tags"></i> <span>{{ __('Coupon') }}</span>
                    </a>
                </li>
            @endcan
            @can('banner_access')
                <li class="{{ request()->is('banner*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('banner') }}">
                        <i class="fas fa-images"></i><span>{{ __('Banner') }}</span>
                    </a>
                </li>
            @endcan
            <li class="{{ request()->is('user-review') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('user-review') }}">
                    <i class="fas fa-star"></i> <span>{{ __('Review') }}</span>
                </a>
            </li>
            {{-- @role('Organizer')
                <li class="{{ request()->is('organization/income') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('organization/income') }}">
                        <i class="fas fa-chart-pie"></i> <span>{{ __('Income') }}</span>
                    </a>
                </li>
            @endrole --}}
            @role('admin')
                <li class="{{ request()->is('event-review') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('event-review') }}">
                        <i class="fas fa  fa-flag"></i> <span>{{ __('Reported Events') }}</span>
                    </a>
                </li>
            @endrole
            @role('admin')
                @can('admin_report')
                    <li class="nav-item dropdown {{ request()->is('admin-report*') ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-bar"></i>
                            <span>{{ __('Reports') }}</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ url('admin-report/customer') }}">{{ __('Customer Report') }}</a>
                            </li>
                            <li><a class="nav-link"
                                    href="{{ url('admin-report/organization') }}">{{ __('Organization Report') }}</a></li>
                            <li><a class="nav-link" href="{{ url('admin-report/revenue') }}">{{ __('Revenue Report') }}</a>
                            </li>
                            <li><a class="nav-link"
                                    href="{{ url('admin-report/settlement') }}">{{ __('Settlement Report') }}</a></li>

                        </ul>
                    </li>
                @endcan
            @endrole

            @role('Organizer')
                @can('organization_report')
                    <li class="nav-item dropdown {{ request()->is('organization-report*') ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                class="fas fa-chart-bar"></i>
                            <span>{{ __('Reports') }}</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link"
                                    href="{{ url('organization-report/customer') }}">{{ __('Customer Report') }}</a></li>
                            <li><a class="nav-link"
                                    href="{{ url('organization-report/orders') }}">{{ __('Orders Report') }}</a></li>
                            <li><a class="nav-link"
                                    href="{{ url('organization-report/revenue') }}">{{ __('Revenue Report') }}</a></li>
                        </ul>
                    </li>
                @endcan
            @endrole

            @can('notification_template_access')
                <li class="{{ request()->is('notification-template*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('notification-template') }}">
                        <i class="fas fa-bell"></i><span>{{ __('Notification Template') }}</span>
                    </a>
                </li>
            @endcan
            @can('tax_access')
                <li class="{{ request()->is('tax*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('tax') }}">
                        <i class="fas fa-hand-holding-usd"></i><span>{{ __('Tax') }}</span>
                    </a>
                </li>
            @endcan
            @can('feedback_access')
                <li class="{{ request()->is('feedback*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('feedback') }}">
                        <i class="fas fa-comments"></i><span>{{ __('Feedback') }}</span>
                    </a>
                </li>
            @endcan
            @can('faq_access')
                <li class="{{ request()->is('faq*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('faq') }}">
                        <i class="fas fa-question-circle"></i><span>{{ __('FAQs') }}</span>
                    </a>
                </li>
            @endcan
            @can('language_access')
                <li class="{{ request()->is('language*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('language') }}">
                        <i class="fas fa-language"></i><span>{{ __('Language') }}</span>
                    </a>
                </li>
            @endcan
            @if (Auth::user()->hasRole('admin'))
                <li class="{{ request()->is('admin-setting') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('admin-setting') }}">
                        <i class="fas fa-cogs"></i><span>{{ __('Setting') }}</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->hasRole('Organizer'))
                <li class="{{ request()->is('organizer-setting') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('organizer-setting') }}">
                        <i class="fas fa-cogs"></i><span>{{ __('Setting') }}</span>
                    </a>
                </li>
            @endif
            @role('admin')
                @can('module_access')
                    <li class="{{ request()->is('module*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('module') }}">
                            <i class="fas fa-tasks"></i><span>{{ __('Module') }}</span>
                        </a>
                    </li>
                @endcan
            @endrole
            @foreach ($modules as $module)
                @if ($module->is_install && $module->is_enable === 1)
                    @if ($module->module === 'Seatmap')
                        <li class="">
                            <a class="nav-link" href="{{ url('seatmap/index') }}">
                                <i class="fas fa-wheelchair"></i><span>{{ __($module->module) }}</span>
                            </a>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </aside>
</div>
