<aside class="left-sidebar">
    <div class="scroll-sidebar">
        {{-- Perfil --}}
        <div class="user-profile position-relative"
            style="background: url({{ asset('imagenes/bg-user.jpg') }}) no-repeat;">

            {{-- Imagen Perfil --}}
            <div class="profile-img">
                <img src="{{ Avatar::create(Auth::user()->nombre_completo)->toBase64() }}" alt="user"
                    class="w-100 rounded-circle" />
            </div>

            {{-- Desplegable Usuario --}}
            <div class="profile-text pt-1 dropdown">
                <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative"
                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    {{ generarName(Auth::user()->nombre_completo) }}
                </a>
                <div class="dropdown-menu animated flipInY" aria-labelledby="dropdownMenuLink">
                    {{-- <a class="dropdown-item" href="#">
                        <i data-feather="user" class="feather-sm text-info me-1 ms-1"></i>Mi perfil
                    </a> --}}

                    {{-- <div class="dropdown-divider"></div> --}}

                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        title="{{ __('Logout') }}">
                        <i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i> {{ __('Logout') }}
                    </a>

                </div>
            </div>
        </div>


        {{-- Sidebar --}}
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                {{-- Tablero --}}
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" id="tablero"
                        href="{{ route('home') }}" aria-expanded="false">
                        <i class="fas fa-tachometer-alt"></i> <span class="hide-menu">@lang('panel.sidebar.tablero')</span>
                    </a>
                </li>

                {{-- Usuarios --}}
                @can('ver-usuarios')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('usuarios.index') }}"
                        aria-expanded="false">
                        <i class="fa-solid fa-user"></i> <span class="hide-menu">@lang('panel.sidebar.usuarios')</span>
                    </a>
                </li>
                @endcan

                {{-- Roles --}}
                @can('ver-roles')
                <li class="sidebar-item">
                    <a href="{{ route('roles.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-user-gear"></i>
                        <span class="hide-menu"> @lang('panel.sidebar.roles') </span>
                    </a>
                </li>
                @endcan

                {{-- Permisos --}}
                @can('mostrar-permisos')
                <li class="sidebar-item">
                    <a href="{{ route('permisos.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-lock"></i>
                        <span class="hide-menu"> @lang('panel.sidebar.permisos') </span>
                    </a>
                </li>
                @endcan
                {{-- Maquinaria --}}
                <li class="sidebar-item">
                    <a href="{{ route('categorias.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="hide-menu"> Categorías </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('maquinas.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-truck-pickup"></i>
                        <span class="hide-menu"> Maquinas </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('tmantenimientos.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-gears"></i>
                        <span class="hide-menu"> Tipos de Mantenimiento </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('mantenimientos.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="hide-menu"> Mantenimientos </span>
                    </a>
                </li>

                {{-- Empresas --}}
                <li class="sidebar-item">
                    <a href="{{ route('empresas.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-building"></i>
                        <span class="hide-menu"> Empresas </span>
                    </a>
                </li>

                {{-- Sucursales --}}
                <li class="sidebar-item">
                    <a href="{{ route('sucursales.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-building"></i>
                        <span class="hide-menu"> Sucursales </span>
                    </a>
                </li>

                {{-- Empleados --}}
                <li class="sidebar-item">
                    <a href="{{ route('empleados.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-person-digging"></i>
                        <span class="hide-menu"> Empleados </span>
                    </a>
                </li>

                {{-- Puestos --}}
                <li class="sidebar-item">
                    <a href="{{ route('puestos.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-users-gear"></i>
                        <span class="hide-menu"> Puestos </span>
                    </a>
                </li>

                {{-- Clientes --}}
                <li class="sidebar-item">
                    <a href="{{ route('clientes.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-user"></i>
                        <span class="hide-menu"> Clientes </span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

    {{-- Footer sidebar --}}
    <div class="sidebar-footer">
        <a href="" class="link ms-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings">
            <i class="ti-settings"></i>
        </a>

        <a href="" class="link me-auto" data-bs-toggle="tooltip" data-bs-placement="top"
            title="{{ __('Logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="mdi mdi-power"></i>
        </a>
    </div>
</aside>