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
<form method="GET" action="{{ route('maquinas.index') }}" class="mb-3">
        <div class="row g-2">
            <div class="col-md-5">
                <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre"
                    value="{{ request('nombre') }}">
            </div>
            <div class="col-md-5">
                <select class="form-select" name="categoria_id">
                    <option value="">Filtrar por categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-secondary w-100" type="submit">Filtrar</button>
            </div>
        </div>
    </form>

    {{-- Formulario de búsqueda --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Maquinas</h2>
        @can('crear-maquinas')
        <a href="{{ route('maquinas.create') }}" class="btn btn-primary">Crear Maquina</a>
        @endcan
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Categoria</th>
                    @canany(['editar-maquinas', 'eliminar-maquinas'])
                    <th scope="col">Acciones</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @forelse ($maquinas as $maquina)
                <tr>
                    <td>{{ $maquina->id }}</td>
                    <td>{{ $maquina->nombre }}</td>
                    <td>{{ $maquina->marca }}</td>
                    <td>{{ $maquina->modelo }}</td>
                    <td>{{ $maquina->serie }}</td>
                    <td>{{ $maquina->precio }}</td>
                    <td>{{ $maquina->estado }}</td>
                    <td>{{ $maquina->categoria->nombre }}</td>
                    @canany(['editar-maquinas', 'eliminar-maquinas'])
                    <td>
                        <div class="btn-group">
                            @can('editar-maquinas')
                            <a id="btn-edit" href="{{ route('maquinas.edit', $maquina->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            @endcan
                            @can('eliminar-maquinas')
                            <a id="btn-delete" href="{{ route('maquinas.destroy', $maquina->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="action-destroy btn waves-effect waves-light btn-rounded btn-light-danger text-danger border-danger"
                                data-bs-target="#dialog-destroy" data-bs-toggle="modal">
                                <i class="far fa-trash-alt remove-note"></i>
                            </a>
                            @endcan
                        </div>
                    </td>
                    @endcanany
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No hay maquinaria registrada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginador --}}
    <div>
        {{ $maquinas->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
