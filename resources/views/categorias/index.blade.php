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
    <form method="GET" action="{{ route('categorias.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre"
                value="{{ request('nombre') }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>



    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Categorias de Maquina</h2>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Crear Categoria</a>
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
                @forelse ($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nombre }}</td>
                    <td>{{ $autor->descripcion }}</td>
                    <td>
                        <div class="btn-group">
                            <a id="btn-edit" href="{{ route('categorias.edit', $categoria->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a id="btn-delete" href="{{ route('categorias.destroy', $categoria->id) }}"
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
                    <td colspan="5" class="text-center">No hay categorias registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $categorias->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
