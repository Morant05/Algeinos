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
    <form method="GET" action="{{ route('tmantenimientos.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre"
                value="{{ request('nombre') }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>



    {{-- Formulario de búsqueda --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Tipo de Mantenimientos</h2>
        <a href="{{ route('tmantenimientos.create') }}" class="btn btn-primary">Crear Tipo de Mantenimiento</a>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tipo_mantenimientos as $tipo_mantenimiento)
                <tr>
                    <td>{{ $tipo_mantenimiento->id }}</td>
                    <td>{{ $tipo_mantenimiento->nombre }}</td>
                    <td>{{ $tipo_mantenimiento->descripcion }}</td>
                    <td>
                        <div class="btn-group">
                            <a id="btn-edit" href="{{ route('tmantenimientos.edit', $tipo_mantenimiento->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a id="btn-delete" href="{{ route('tmantenimientos.destroy', $tipo_mantenimiento->id) }}"
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
                    <td colspan="5" class="text-center">No hay tipos de mantenimientos registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginador --}}
    <div>
        {{ $tipo_mantenimientos->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
