@section('header')
    <header>
        <nav id="header" class="navbar navbar-expand-sm navbar-expand-md navbar-expand-lg navbar-dark bg-dark">
            <div class="container">

                <a class="navbar-brand" href="/"> <img src="{{ asset('/cs-icon.ico') }}" alt="Logo"> </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">
                                <i class="bi bi-house-door"></i> @lang('title.home')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() === 'catalog' ? 'active' : '' }}" href="{{ route('catalog') }}">
                                <i class="bi bi-journal"></i> @lang('title.catalog')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() === 'calendar' ? 'active' : '' }}" href="{{ route('calendar') }}">
                                <i class="bi bi-calendar"></i> @lang('title.calendar')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Route::currentRouteName() === 'visited.pages' ? 'active' : '' }}" href="{{ route('visited.pages') }}">
                                <i class="bi bi-list-ul"></i> @lang('title.visited-pages')
                            </a>
                        </li>
                        @auth
                            @if (auth()->check() && auth()->user()->role === 'admin')
                                <li class="nav-item">
                                    <a class="nav-link  {{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-shield-lock-fill"></i> @lang('title.admin-dashboard')
                                    </a>
                                </li>
                            @endif
                        @endauth
                        <li class="dropdown d-flex align-items-center ms-3">
                            <a href="#" class="d-block link-body-emphasis text-decoration-none" data-bs-toggle="dropdown">
                                <i class="bi bi-globe-americas" style="font-size: 1.5rem"></i>
                            </a>

                            <ul class="dropdown-menu ">
                                <li>
                                    <a class="dropdown-item" href="{{ route('change-language', 'en') }}">English</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('change-language', 'ru') }}">Русский</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item d-flex">
                            <form action="{{ route('catalog') }}" method="GET" class="d-flex mb-0">
                                <input class="form-control me-2" type="search" placeholder=@lang('header.find') aria-label="Search" name="query">
                                <button class="btn btn-outline-success me-2" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                        </li>
                        <li class="nav-item">
                            @if(auth()->check())
                                <a class="nav-link {{ Route::currentRouteName() === 'user' ? 'active' : '' }}" href="{{ route('user') }}">
                                    <i class="bi bi-person" style="font-size: 1.5rem"></i>
                                </a>
                            @else
                                <a class="nav-link {{ Route::currentRouteName() === 'login' ||
                                                      Route::currentRouteName() === 'register' ? 'active' : '' }}" href="{{ route('login') }}">
                                    <i class="bi bi-person" style="font-size: 1.5rem"></i>
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
