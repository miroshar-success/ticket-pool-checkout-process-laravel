<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg main-navbar">

    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>


    <ul class="navbar-nav navbar-right">
        @if (Auth::user()->hasRole('Organizer'))
            <li>
                @php
                    $notification = \App\Models\Notification::where('status', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
                @endphp

                @if (count($notification) == 0)
                    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i
                            class="far fa-bell"></i></a>
                @else
                    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i
                            class="far fa-bell"></i></a>
                @endif

                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header">{{ __('Notifications') }}
                        <a class="text-decoration-none float-right"
                            href="{{ url('markAllAsRead') }}">{{ __('Mark All As Read') }}</a>
                        <div class="float-right">
                        </div>
                    </div>

                    @if (count($notification) == 0)
                        <div class="dropdown-list-content dropdown-list-icons">
                            <a href="#" class="dropdown-item">
                                <div class="dropdown-item-desc">
                                    <h6>{{ __('No notification found') }}</h6>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="dropdown-list-content dropdown-list-icons">
                            @foreach ($notification as $item)
                                @if ($item->user != null)
                                    @if ($loop->iteration <= 3)
                                        <a href="#" class="dropdown-item">
                                            <div class="dropdown-item-icon bg-danger text-white">
                                                <img class="avatar"
                                                    src="{{ url('images/upload/' . $item->user->image) }}">
                                            </div>
                                            <div class="dropdown-item-desc">
                                                {{ $item->message }}
                                                <div class="time">{{ $item->created_at->diffForHumans() }}</div>
                                            </div>
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="{{ url('notification') }}">{{ __('View All') }} <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    @endif
                </div>
            </li>
        @endif
        <?php $lang = session('locale') == null ? 'English' : session('locale'); ?>
        @php
            $languages = \App\Models\Language::where('status', 1)->get();
        @endphp
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img src="{{ url('images/upload/' . ($lang === 'English' ? 'uk_english' : $lang) . '.png') }}" class="mr-1 flag-icon">
                <div class="d-sm-none d-lg-inline-block"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @foreach ($languages as $language)
                    <a href="{{ url('change-language/' . $language->name) }}" class="dropdown-item has-icon">
                        <img src="{{ url('images/upload/' . ($language->name === 'English' ? 'uk_english' : $language->name) . '.png') }}" class="mr-2 flag-icon">
                        {{ $language->name === 'English' ? 'UK English' : $language->name}}
                    </a>
                @endforeach
            </div>
        </li>

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ url('images/upload/' . Auth::user()->image) }}"
                    class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->first_name ." ". Auth::user()->last_name  }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">{{ __('Welcome') }} {{ Auth::user()->first_name ." ". Auth::user()->last_name  }}!</div>
                <a href="{{ url('profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('Profile') }}
                </a>
                @if (Auth::user()->hasRole('admin'))
                    <a href="{{ url('admin-setting') }}" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> {{ __('Settings') }}
                    </a>
                    <a href="{{ url('license-setting') }}" class="dropdown-item has-icon">
                        <i class="fas fa-shield-alt"></i> {{ __('License Setting') }}
                    </a>
                @endif
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <a class="dropdown-item" type="button">

                            <button class=" btn btn-outline-danger" id="check" name="check">    <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}</button>
                        </a>
                        <script>
                            document.getElementById("check").addEventListener('click', function() {
                                Swal.fire({
                                    title: 'Are you sure to logout!!',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.location = base_url + "/logout";
                                    }
                                })
                            });
                        </script>
            </div>
        </li>
    </ul>
    <?php
    if (App::isDownForMaintenance()) {
    ?>
    <div class="alert alert-danger maintenance">
        Maintenance mode is enabled!
    </div>

    <?php
    } else {
    ?>

    <?php
    }
     ?>
</nav>
