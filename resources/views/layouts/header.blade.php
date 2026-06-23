<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            {{-- This is for the sidebar toggle which is visible on mobile only --}}
            <a class="nav-toggler waves-effect waves-light d-block d-md-none"
               href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>

            {{-- Logo --}}
            <a class="navbar-brand bg-light" href="{{ route('home') }}">

                {{-- Logo icon --}}
                <b class="logo-icon">
                    <img src="{{ asset('imagenes/logo-icon.png') }}" alt="homepage" class="light-logo"/>
                </b>

                {{-- Logo text --}}
                <span class="logo-text">
                    <img src="{{ asset('imagenes/logo-alargado.png') }}" class="light-logo" alt="homepage"/>
                  </span>
            </a>

            {{-- Toggle which is visible on mobile only --}}
            <a class="topbartoggler d-block d-md-none waves-effect waves-light"
                href="javascript:void(0)"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-collapse collapse bg-light" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark text-info" href="javascript:void(0)" >
                        <i class="ti-menu"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav">
                {{-- Perfl --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark"
                        href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside">
                        <img src="{{ Avatar::create(Auth::user()->nombre_completo)->toBase64() }}"
                             alt="user" width="30" class="profile-pic rounded-circle" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end user-dd animated flipInY">

                        <div class="d-flex no-block align-items-center p-3 bg-info text-white mb-2">
                            <div class="">
                                <img src="{{ Avatar::create(Auth::user()->nombre_completo)->toBase64() }}"
                                     alt="user" class="rounded-circle" width="60" />
                            </div>
                            <div class="ms-3">
                                <h4 class="mb-0 text-white">{{ Auth::user()->nombre_completo }}</h4>
                                <p class="mb-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        {{-- <a class="dropdown-item" href="#">
                            <i data-feather="user" class="feather-sm text-info me-1 ms-1"></i> Mi perfil
                        </a> --}}

                        {{-- <div class="dropdown-divider"></div> --}}

                        <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            title="title="{{ __('Logout') }}"">
                            <i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i> {{ __('Logout') }}
                        </a>

                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
