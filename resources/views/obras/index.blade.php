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
    <form method="GET" action="{{ route('obras.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre"
                value="{{ request('nombre') }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Obras</h2>
        @can('crear-obras')
        <a href="{{ route('obras.create') }}" class="btn btn-primary">Crear Obra</a>
        @endcan
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Difeccion</th>
                    <th scope="col">Latitud</th>
                    <th scope="col">Longitud</th>
                    <th scope="col">Presupuesto</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Estado</th>
                    @canany(['editar-obras', 'eliminar-obras'])
                    <th scope="col">Acciones</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @forelse ($obras as $obra)
                <tr>
                    <td>{{ $obra->id }}</td>
                    <td>{{ $obra->nombre }}</td>
                    <td>{{ $obra->descripcion }}</td>
                    <td>{{ $obra->direccion }}</td>
                    <td>{{ $obra->latitud }}</td>
                    <td>{{ $obra->longitud }}</td>
                    <td>{{ $obra->presupuesto }}</td>
                    <td>{{ $obra->fecha_inicio }}</td>
                    <td>{{ $obra->fecha_fin }}</td>
                    <td>{{ $obra->estado }}</td>
                    @canany(['editar-obras', 'eliminar-obras'])
                    <td>
                        <div class="btn-group">
                            @can('editar-obras')
                            <a id="btn-edit" href="{{ route('obras.edit', $obra->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            @endcan
                            @can('eliminar-obras')
                            <a id="btn-delete" href="{{ route('obras.destroy', $obra->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="action-destroy btn waves-effect waves-light btn-rounded btn-light-danger text-danger border-danger"
                                data-bs-target="#dialog-destroy" data-bs-toggle="modal">
                                <i class="far fa-trash-alt remove-note"></i>
                            </a>
                        </div>
                    </td>
                    @endcanany
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No hay obras registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginador --}}
    <div>
        {{ $obras->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
