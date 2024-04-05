@php
    $admin = \App\Models\User::find(1);
    if (\App\Models\Category::find(1)) {
        $category = \App\Models\category::where('status', 1)->get();
    }
    $user = Auth::guard('appuser')->user();
    $logo = \App\Models\Setting::find(1)->logo;
    $wallet = \App\Models\PaymentSetting::first()->wallet;
@endphp
<!-- component -->
<div class="font-sans main-navbar w-full m-0 xxsm:max-md:hidden">
    <div class="bg-primary shadow" style="padding: 7px 8px 7px 24px;border-bottom: 1px solid #eeedf2;">
        <div class="container-fluid mx-auto">
            <div class="flex flex-no-wrap items-center justify-between">
                <div class="main-logo">
                    {{-- App Logo --}}
                    <a href="{{ url('/') }}" class="object-cover ">
                        <img src="{{ $logo ? url('images/upload/' . $logo) : asset('/images/logo.png') }}"
                            class="object-scale-down h-5 " alt="Logo">
                    </a>
                </div>


                <div class="sm:flex sm:gap-3 sm:items-center main-search">
                    <div class="search-bar">
                        <form action="{{ url('user/search_event') }}" method="post">
                            @csrf
                            <div class="relative">
                                <div class="flex absolute inset-y-0 items-center pl-left pointer-events-none">
                                    <img src="{{ asset('images/search.svg') }}" class="w-5 h-5" alt="">
                                </div>
                                <input type="search" id="default-search" name="search"
                                    class="searchbox block p-2 pl-10 text-gray bg-white border border-gray-light text-left font-poppins font-normal
                            text-base leading-6 rounded-md mx-1 focus:outline-none xxsm:w-full sm:w-58 lg:w-50"
                                    placeholder="{{ __('Search..') }}" required>
                            </div>
                        </form>
                    </div>
                    
                    <div class="cursor-pointer ml-3 xl:hidden">
                        <button id="nav-toggle"
                            class="btn text-gray bg-white text-left font-poppins font-normal nav-toggle">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                
                <div class="sm:flex sm:items-center main-nav">
                    <ul class="navbar-nav flex space-x-4 items-center">
                        <li class="xxsm:max-lg:hidden nav-item {{ $activePage == 'home' ? 'active' : '' }} ">
                            <a href="{{ url('/') }}"
                                class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('Home') }}</a>
                        </li>
                        <li class="xxsm:max-lg:hidden nav-item {{ Request::is('all-events') ? 'active' : '' }}">
                            <div class="relative inline-block text-left">
                                <a href="{{ url('/all-events') }}" class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('Events') }}</a>
                            </div>
                        </li>
                        <li class="xxsm:max-lg:hidden nav-item {{ Request::is('all-category') ? 'active' : '' }} ">
                            <div class="relative inline-block text-left">
                                <a href="#"
                                    class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray flex focus:outline-none categories"
                                    id="">{{ __('Categories') }}
                                    <img src="{{ asset('images/downwhite.png') }}" alt=""
                                        class=" ml-1 h-2 w-3 mt-2">
                                </a>
                                <div
                                    class="categoriesClass hidden rigin-top-left absolute left-0 w-44 rounded-md shadow-2xl z-30">
                                    <div class="rounded-md bg-primary shadow-lg p-3">
                                        <div class="">
                                            @php
                                                if (!isset($catactive)) {
                                                    $catactive = null;
                                                }
                                            @endphp
                                            @if (isset($category))
                                                @foreach ($category as $item)
                                                    <div class="flex items-left justify-left">
                                                        <a href="{{ url('/events-category/' . $item->id . '/' . $item->name) }}"
                                                            class="flex items-left text-base font-poppins font-normal leading-5 {{ $catactive == $item->name ? ' text-primary capitalize p-2 bg-primary-light' : ' ' }}  capitalize p-2 hover:bg-primary-light rounded-md w-full">{{ $item->name }}</a>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <!-- <div class="flex items-left justify-left">
                                                <a href="{{ url('/all-category') }}"
                                                    class="flex items-left text-base font-poppins font-normal leading-5 {{ $catactive == 'all' ? 'text-primary capitalize p-2 bg-primary-light' : ' ' }} capitalize p-2 hover:bg-primary-light rounded-md w-full">{{ __('All categories') }}
                                                    <img src="{{ asset('image/right-dropdown.png') }}" alt=""
                                                        class=" ml-2 h-2 w-2 mt-2">
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- <li class="xxsm:max-lg:hidden nav-item {{ $activePage == 'blog' ? 'active' : '' }}">
                            <a href="{{ url('/all-blogs') }}"
                                class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('Blog') }}</a>
                        </li> -->
                        <li class="xxsm:max-lg:hidden nav-item {{ $activePage == 'contact' ? 'active' : '' }} ">
                            <a href="{{ url('/contact') }}"
                                class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('Contact Us') }}</a>
                        </li>
                    </ul>
                </div>
                

                    @if (Auth::guard('appuser')->check())
                        <div class="flex justify-center relative dropdownScreenButton cursor-pointer">
                            <div class="pt-3 mr-5">
                                <p class="font-poppins font-medium text-sm leading-5 text-white">
                                    {{ $user->name ?? ' ' }}</p>
                            </div>
                            <div class="">
                                <img src="{{ asset('images/upload/' . $user->image) }}"
                                    class="w-10 h-10 bg-cover object-contain border border-gray-light rounded-full"
                                    alt="">
                            </div>
                            <div class="ml-3 pt-1 dropdown relative flex">
                                <div class="relative inline-block text-left">
                                    <div
                                        class="dropdownMenuClass hidden rigin-top-right absolute right-0 w-56 rounded-md shadow-2xl z-30 mt-10">
                                        <div class="rounded-md bg-white shadow-xs">
                                            <div class="py-1">
                                                <div
                                                    class="overflow-y-auto py-4 px-3 bg-gray-50 rounded pt-10 border-b border-gray-light pb-5">
                                                    <ul class="space-y-8 ">
                                                        <li>
                                                            <a href="{{ url('/my-tickets') }}"
                                                                class="flex items-center font-normal font-poppins leading-6 text-black text-base capitalize">{{ __('My tickets') }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/user/profile') }}"
                                                                class="flex items-center font-normal font-poppins leading-6 text-black text-base capitalize">{{ __('Profile') }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/change-password') }}"
                                                                class="flex items-center font-normal font-poppins leading-6 text-black text-base capitalize">{{ __('Change password') }}
                                                            </a>
                                                        </li>
                                                        @if ($wallet == 1)
                                                            <li>
                                                                <a href="{{ route('myWallet') }}"
                                                                    class="flex items-center font-normal font-poppins leading-6 text-black text-base capitalize">{{ __('My Wallet') }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="px-3 py-5">
                                                    <a href="{{ route('logoutUser') }}"
                                                        class="flex items-center  font-poppins font-medium leading-4 text-danger capitalize">
                                                        <i class="fa-solid fa-right-from-bracket"></i><span
                                                            id="check"
                                                            class="flex-1  whitespace-nowrap">{{ __('Logout') }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="sm:px-4 flex xxsm:flex-wrap justify-end mt-2 sm:mt-0">
                            <a type="button" href="{{ url('user/login') }}"
                                class="btn-top px-5 py-2 text-white bg-primary text-center font-poppins font-normal text-nowrap text-base leading-6 rounded-md">{{ __('Sign In') }}</a>
                        </div>
                    @endif


                
            </div>
            <div class="hidden nav-content" id="nav-content">
                <ul class="list-reset lg:flex gap-5 justify-end flex-1 items-center text-end pb-5">
                    <li class="mt-2 nav-item {{ $activePage == 'home' ? 'active' : '' }} ">
                        <a href="{{ url('/') }}"
                            class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('Home') }}</a>
                    </li>
                    <li class="mt-2 nav-item {{ Request::is('all-events') ? 'active' : '' }}">
                        <a href="{{ url('/all-events') }}"
                            class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('Events') }}</a>
                    </li>
                    <li class="mt-2 nav-item {{ Request::is('all-category') ? 'active' : '' }} ">
                        <div class="relative inline-block text-left">
                            <a type="button" href="#"
                                class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray flex focus:outline-none categories">{{ __('Categories') }}
                                <img src="{{ asset('images/downwhite.png') }}" alt=""
                                    class=" ml-1 h-2 w-3 mt-2">
                            </a>
                        </div>
                        <div id="cattab"
                            class="categoriesClass hidden rigin-top-right absolute right-18 w-44 rounded-md shadow-2xl z-30">
                            <div class="rounded-md bg-white shadow-lg p-3">
                                <div class="">
                                    @php
                                        if (!isset($catactive)) {
                                            $catactive = null;
                                        }
                                    @endphp
                                    @if (isset($category))
                                        @foreach ($category as $item)
                                            <div class="flex items-left justify-left">
                                                <a href="{{ url('/events-category/' . $item->id . '/' . $item->name) }}"
                                                    class="flex items-left text-base font-poppins font-normal leading-5 {{ $catactive == $item->name ? ' text-primary capitalize p-2 bg-primary-light' : ' ' }}  capitalize p-2 hover:bg-primary-light rounded-md w-full">{{ $item->name }}</a>
                                            </div>
                                        @endforeach
                                    @endif
                                    <!-- <div class="flex items-left justify-left">
                                        <a href="{{ url('/all-category') }}"
                                            class="flex items-left text-base font-poppins font-normal leading-5 {{ $catactive == 'all' ? 'text-primary capitalize p-2 bg-primary-light' : ' ' }} capitalize p-2 hover:bg-primary-light rounded-md w-full">{{ __('All categories') }}
                                            <img src="{{ asset('image/right-dropdown.png') }}" alt=""
                                                class=" ml-2 h-2 w-2 mt-2">
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- <li class="mt-2 nav-item {{ $activePage == 'blog' ? 'active' : '' }}">
                        <a href="{{ url('/all-blogs') }}"
                            class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('Blog') }}</a>
                    </li> -->
                    <li class="mt-2 nav-item {{ $activePage == 'contact' ? 'active' : '' }}">
                        <a href="{{ url('/contact') }}"
                            class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('contact Us') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- Mobile View --}}
<nav class="navbar rounded m-0 bg-white z-30 shadow-md relative md:hidden">
    <div
        class="flex xxsm:space-y-2 xmd:space-y-0 md:space-y-2 msm:flex-col md:flex-col xmd:flex-col xxsm:flex-col lg:flex-wrap xmd:flex-wrap justify-between
     3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-10 xlg:mx-10 lg:mx-35 xxmd:mx-24 xmd:mx-32 sm:mx-20 msm:mx-16 xsm:mx-5 xxsm:mx-5 py-3 pt-4 z-30 xl2:flex-row">
        <div class="flex items-center lg:items-left w-auto">
            <ul
                class="navbar-nav flex lg:flex-row xmd:flex-row md:flex-row md:text-xs md:space-x-3 sm:flex-row msm:flex-col xsm:flex-col xxsm:flex-col msm:space-x-2 sm:space-x-2 lg:space-x-10 temp:max-temp2:space-x-5 md:mt-0">
                {{-- App Logo --}}
                <a href="{{ url('/') }}" class="object-cover ">
                    <img src="{{ $logo ? url('images/upload/' . $logo) : asset('/images/logo.png') }}"
                        class="object-scale-down h-10 " alt="Logo">
                </a>
            </ul>
            <div class="w-full text-right xxsm:max-lg:block hidden">
                <button class="btn text-gray bg-white text-left font-poppins font-normal nav-toggle">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="hidden nav-content" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center text-end">
                <li class="mt-2 nav-item {{ $activePage == 'home' ? 'active' : '' }} ">
                    <a href="{{ url('/') }}"
                        class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('Home') }}</a>
                </li>
                <li class="mt-2 nav-item {{ Request::is('all-events') ? 'active' : '' }}">
                    <a href="{{ url('/all-events') }}"
                        class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('Events') }}</a>
                </li>
                <li class="mt-2 nav-item {{ Request::is('all-category') ? 'active' : '' }} ">
                    <div class="relative inline-block text-left">
                        <a type="button" href="#" id="showcattab"
                            class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray flex focus:outline-none categories"
                            id="categories">{{ __('Categories') }}
                            <img src="{{ asset('images/dropdown.png') }}" alt="" class=" ml-1 h-2 w-3 mt-2">
                        </a>
                    </div>
                    <div id="cattab"
                        class="categoriesClass hidden rigin-top-left left-0 rounded-md shadow-2xl z-30 mr-10 w-full">
                        <div class="rounded-md bg-white shadow-lg p-3">
                            <div class="">
                                @php
                                    if (!isset($catactive)) {
                                        $catactive = null;
                                    }
                                @endphp
                                @if (isset($category))
                                    @foreach ($category as $item)
                                        <div class="flex items-left justify-left">
                                            <a href="{{ url('/events-category/' . $item->id . '/' . $item->name) }}"
                                                class="flex items-left text-base font-poppins font-normal leading-5 {{ $catactive == $item->name ? ' text-primary capitalize p-2 bg-primary-light' : ' ' }}  capitalize p-2 hover:bg-primary-light rounded-md w-full">{{ $item->name }}</a>
                                        </div>
                                    @endforeach
                                @endif
                                <!-- <div class="flex items-left justify-left">
                                    <a href="{{ url('/all-category') }}"
                                        class="flex items-left text-base font-poppins font-normal leading-5 {{ $catactive == 'all' ? 'text-primary capitalize p-2 bg-primary-light' : ' ' }} capitalize p-2 hover:bg-primary-light rounded-md w-full">{{ __('All categories') }}
                                        <img src="{{ asset('image/right-dropdown.png') }}" alt=""
                                            class=" ml-2 h-2 w-2 mt-2">
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </li>
                <!-- <li class="mt-2 nav-item {{ $activePage == 'blog' ? 'active' : '' }}">
                    <a href="{{ url('/all-blogs') }}"
                        class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('Blog') }}</a>
                </li> -->
                <li class="mt-2 nav-item {{ $activePage == 'contact' ? 'active' : '' }}">
                    <a href="{{ url('/contact') }}"
                        class="nav-link md:px-1 capitalize font-poppins font-normal text-base leading-6 text-gray">{{ __('contact Us') }}</a>
                </li>
            </ul>
        </div>
        {{-- Search Button and Login button --}}
        <div class="">
            <div class="flex justify-between sm:space-x-6 xxsm:flex-col sm:flex-row">
                <div>
                    <form action="{{ url('user/search_event') }}" method="post">
                        @csrf
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <img src="{{ asset('images/search.svg') }}" class="w-5 h-5" alt="">
                            </div>
                            <input type="search" id="default-search" name="search"
                                class="block p-2 pl-10 text-gray bg-white border border-gray-light text-left font-poppins font-normal
                                text-base leading-6 rounded-md mx-1 focus:outline-none xxsm:w-full sm:w-48 lg:w-72"
                                placeholder="{{ __('Search..') }}" required>
                        </div>
                    </form>
                </div>
                @if (Auth::guard('appuser')->check())
                    <div class="flex justify-end mt-2 dropdownScreenButton">
                        <div class="pt-3 mr-5">
                            <p class="font-poppins font-medium text-sm leading-5 text-black">
                                {{ $user->name ?? ' ' }}</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('images/upload/' . $user->image) }}"
                                class="w-10 h-10 bg-cover object-contain border border-gray-light rounded-full"
                                alt="">
                        </div>
                        <div class="ml-3 pt-1 dropdown relative flex">
                            <div class="relative inline-block text-left">
                                <div
                                    class="dropdownMenuClass hidden rigin-top-right absolute right-0 w-56 rounded-md shadow-2xl z-30 mt-10">
                                    <div class="rounded-md bg-white shadow-xs">
                                        <div class="py-1">
                                            <div
                                                class="overflow-y-auto py-4 px-3 bg-gray-50 rounded pt-10 border-b border-gray-light pb-5">
                                                <ul class="space-y-8 ">
                                                    <li>
                                                        <a href="{{ url('/my-tickets') }}"
                                                            class="flex items-center font-normal font-poppins leading-6 text-black text-base capitalize">{{ __('My tickets') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/user/profile') }}"
                                                            class="flex items-center font-normal font-poppins leading-6 text-black text-base capitalize">{{ __('Profile') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/change-password') }}"
                                                            class="flex items-center font-normal font-poppins leading-6 text-black text-base capitalize">{{ __('Change password') }}
                                                        </a>
                                                    </li>
                                                    @if ($wallet == 1)
                                                        <li>
                                                            <a href="{{ route('myWallet') }}"
                                                                class="flex items-center font-normal font-poppins leading-6 text-black text-base capitalize">{{ __('My Wallet') }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="px-3 py-5">
                                                <a href="{{ route('logoutUser') }}"
                                                    class="flex items-center  font-poppins font-medium leading-4 text-danger capitalize">
                                                    <i class="fa-solid fa-right-from-bracket"></i><span id="check"
                                                        class="flex-1  whitespace-nowrap">{{ __('Logout') }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="sm:px-4 flex xxsm:flex-wrap justify-end mt-2 sm:mt-0">
                        <a type="button" href="{{ url('user/login') }}"
                            class="px-5 py-2 text-white bg-primary text-center font-poppins font-normal text-base leading-6 rounded-md">{{ __('Sign In') }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>
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
                document.location = "/user/logoutuser";
            }
        })
    });
</script>
