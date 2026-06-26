@extends('layouts.app')
@section('content')
<div class="container">

    {{-- Mensaje de sesión --}}
    @if (Session::has('mensaje'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Mensaje:</strong> {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Empresas</h2>
        <a href="{{ route('sucursales.create') }}" class="btn btn-primary">Crear Sucursal</a>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sucursales as $sucursal)
                <tr>
                    <td>{{ $sucursal->id }}</td>
                    <td>{{ $sucursal->nombre }}</td>
                    <td>{{ $sucursal->direccion }}</td>
                    <td>{{ $sucursal->telefono }}</td>
                    <td>{{ $sucursal->correo }}</td>
                    <td>{{ $sucursal->empresa->nombre }}</td>
                    <td>
                    <td>
                        <div class="btn-group">
                            <a id="btn-edit" href="{{ route('sucursales.edit', $sucursal->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a id="btn-delete" href="{{ route('sucursales.destroy', $sucursal->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="action-destroy btn waves-effect waves-light btn-rounded btn-light-danger text-danger border-danger"
                                data-bs-target="#dialog-destroy" data-bs-toggle="modal">
                                <i class="far fa-trash-alt remove-note"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay sucursales registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginador --}}
    <div>
        {{ $sucursales->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection