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
<form method="GET" action="{{ route('mantenimientos.index') }}" class="mb-3">
        <div class="row g-2">
            <div class="col-md-5">
                <select class="form-select" name="maquina_id">
                    <option value="">Filtrar por Maquina</option>
                    @foreach ($maquinas as $maquina)
                        <option value="{{ $maquina->id }}" {{ request('maquina_id') == $maquina->id ? 'selected' : '' }}>
                            {{ $maquina->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5">
                <select class="form-select" name="tipo_id">
                    <option value="">Filtrar por tipo de mantenimiento</option>
                    @foreach ($tipo_mantenimientos as $tmantenimiento)
                        <option value="{{ $tmantenimiento->id }}" {{ request('tipo_id') == $tmantenimiento->id ? 'selected' : '' }}>
                            {{ $tmantenimiento->nombre }}
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
        <h2>Mantenimientos</h2>
        <a href="{{ route('mantenimientos.create') }}" class="btn btn-primary">Crear mantenimientos</a>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo de mantenimiento</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Tiempo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Máquina</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mantenimientos as $mantenimiento)
                <tr>
                    <td>{{ $mantenimiento->id }}</td>
                    <td>{{ $mantenimiento->tmantenimiento->nombre }}</td>
                    <td>{{ $mantenimiento->fecha }}</td>
                    <td>{{ $mantenimiento->costo }}</td>
                    <td>{{ $mantenimiento->tiempo }}</td>
                    <td>{{ $mantenimiento->descripcion }}</td>
                    <td>{{ $mantenimiento->maquina->nombre }}</td>
                    <td>
                        <div class="btn-group">
                            <a id="btn-edit" href="{{ route('mantenimientos.edit', $mantenimiento->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a id="btn-delete" href="{{ route('mantenimientos.destroy', $mantenimiento->id) }}"
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
                    <td colspan="5" class="text-center">No hay mantenimientos registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginador --}}
    <div>
        {{ $mantenimientos->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
