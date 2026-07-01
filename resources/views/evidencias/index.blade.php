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
        <h2>Evidencias</h2>
        @can('crear-evidencias')
        <a href="{{ route('evidencias.create') }}" class="btn btn-primary">Crear Evidencia</a>
        @endcan
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Ruta</th>
                    <th scope="col">Tamaño</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Empleado</th>
                    <th scope="col">Incidencia</th>
                    @canany(['editar-evidencias', 'eliminar-evidencias'])
                    <th scope="col">Acciones</th>
                    @endcanany
                </tr>
            </thead>

            <tbody>

                @forelse ($evidencias as $evidencia)
                <tr>
                    <td>{{ $evidencia->id }}</td>
                    <td>{{ $evidencia->nombre }}</td>
                    <td>{{ $evidencia->tipo }}</td>
                    <td>{{ $evidencia->ruta }}</td>
                    <td>{{ $evidencia->tamaño }}</td>
                    <td>{{ $evidencia->empresa->nombre }}</td>
                    <td>{{ $evidencia->empleado->nombre }}</td>
                    <td>{{ $evidencia->incidencia->id }}</td>
                    @canany(['editar-evidencias', 'eliminar-evidencias'])
                    <td>
                        <div class="btn-group">
                            @can('editar-evidencias')
                            <a id="btn-edit"
                                href="{{ route('evidencias.edit', $evidencia->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip"
                                data-bs-placement="bottom"
                                title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            @endcan
                            @can('eliminar-evidencias')
                            <a id="btn-delete"
                                href="{{ route('evidencias.destroy', $evidencia->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="action-destroy btn waves-effect waves-light btn-rounded btn-light-danger text-danger border-danger"
                                data-bs-target="#dialog-destroy"
                                data-bs-toggle="modal">
                                <i class="far fa-trash-alt remove-note"></i>
                            </a>
                            @endcan
                        </div>
                    </td>
                    @endcanany
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">
                        No hay evidencias registradas
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

    {{-- Paginador --}}
    <div>
        {{ $evidencias->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection