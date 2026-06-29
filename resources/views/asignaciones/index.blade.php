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
<form method="GET" action="{{ route('asignaciones.index') }}" class="mb-3">
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
                <select class="form-select" name="obra_id">
                    <option value="">Filtrar por Obra</option>
                    @foreach ($obras as $obra)
                        <option value="{{ $obra->id }}" {{ request('obra_id') == $obra->id ? 'selected' : '' }}>
                            {{ $obra->nombre }}
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
        <h2>Asignaciones</h2>
        <a href="{{ route('asignaciones.create') }}" class="btn btn-primary">Crear asignaciones</a>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Fecha de Finalizacion</th>
                    <th scope="col">Maquina asignada</th>
                    <th scope="col">Obra</th>
                    <th scope="col">Empleado Asignado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($asignaciones as $asignacion)
                <tr>
                    <td>{{ $asignacion->id }}</td>
                    <td>{{ $asignacion->fecha_inicio }}</td>
                    <td>{{ $asignacion->fecha_fin }}</td>
                    <td>{{ $asignacion->maquina->nombre }}</td>
                    <td>{{ $asignacion->obra->nombre }}</td>
                    <td>{{ $asignacion->empleado->nombre }}</td>
                    <td>
                        <div class="btn-group">
                            <a id="btn-edit" href="{{ route('asignaciones.edit', $asignacion->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a id="btn-delete" href="{{ route('asignaciones.destroy', $asignacion->id) }}"
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
                    <td colspan="5" class="text-center">No hay asignaciones registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginador --}}
    <div>
        {{ $asignaciones->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
