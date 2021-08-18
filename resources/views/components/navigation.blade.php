<div class="horizontal-menu">
    <nav class="bottom-navbar">
        <div class="container">
            <div class="page-header flex-wrap m-0">
                <div class="header-left">
                    <ul class="nav page-navigation">
                        <li class="navbar-brand">
                            <div class="mt-1">
                                <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                                    <img src="{{ asset('images/'.env('COMPANY_ICON')) }}" alt="" style="width: 150px; height: auto;" />
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-3" href="{{ route('home') }}">
                                <i class="mdi mdi-home menu-icon"></i>
                                <span class="menu-title">{{ __('Home') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-3" href="{{ route('hotel.booking') }}">
                                <i class="mdi mdi-hotel menu-icon"></i>
                                <span class="menu-title">{{ __('Hotels') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
                    <ul class="nav page-navigation">
                        @auth
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-account menu-icon"></i>
                                <span class="menu-title">{{ Auth::user()->name }}</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('dashboard') }}">
                                            <i class="mdi mdi-compass-outline menu-icon"></i>
                                            <span class="menu-title">{{ __('Dashboard') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" 
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="mdi mdi-login-variant menu-icon"></i>
                                            <span class="menu-title">{{ __('Logout') }}</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @else
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link p-3" href="{{ route('login') }}">
                                        <i class="mdi mdi-login-variant menu-icon"></i>
                                        <span class="menu-title">{{ __('Login') }}</span>
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link p-3" href="{{ route('register') }}">
                                        <i class="mdi mdi-account-card-details menu-icon"></i>
                                        <span class="menu-title">{{ __('Register') }}</span>
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
