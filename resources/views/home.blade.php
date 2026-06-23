@extends('layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('portada') }}
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="row mb-3" style="margin-top: -20px;">
                <div class="col-12">
                    <div class="brand-text float-left text-center text-md-start mt-2">
                        <h3 style="text-transform: uppercase; color: #292929;">Bienvenido <span class="text-principal">{{ Auth::user()->nombre_completo }}</span>
                        </h3>
                    </div>
                </div>
            </div>
           
            <!--Usuarios-->
            @can('ver-usuarios')
                <div class="col-md-3">
                    <a href="{{route('usuarios.index')}}">
                        <div class="card border-bottom shadow border-dark">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h2>{{ $contador_usuarios }}</h2>
                                        <h6 class="text-dark">@lang('panel.sidebar.usuarios')</h6>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="text-dark display-6"><i class="fa-solid fa-user"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endcan

            <!--Roles-->
            @can('ver-roles')
                <div class="col-md-3">
                    <a href="{{route('roles.index')}}">
                        <div class="card border-bottom-principal shadow">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h2>{{ $contador_roles }}</h2>
                                        <h6 class="text-principal">@lang('panel.sidebar.roles')</h6>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="text-principal display-6"><i class="fa-solid fa-user-gear"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endcan
     
        </div>
    </div>
@endsection
