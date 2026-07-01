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
        <h2>Incidencias</h2>
        <a href="{{ route('incidencias.create') }}" class="btn btn-primary">Crear Incidencia</a>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Obra</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($incidencias as $incidencia)
                <tr>

                    <td>{{ $incidencia->id }}</td>
                    <td>{{ $incidencia->tipo }}</td>
                    <td>{{ $incidencia->prioridad }}</td>
                    <td>{{ $incidencia->estado }}</td>
                    <td>{{ $incidencia->fecha }}</td>
                    <td>{{ $incidencia->usuario->name }}</td>
                    <td>{{ $incidencia->obra->nombre }}</td>

                    <td>
                        <div class="btn-group">

                            <a id="btn-edit"
                                href="{{ route('incidencias.edit', $incidencia->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip"
                                data-bs-placement="bottom"
                                title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>

                            <a id="btn-delete"
                                href="{{ route('incidencias.destroy', $incidencia->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="action-destroy btn waves-effect waves-light btn-rounded btn-light-danger text-danger border-danger"
                                data-bs-target="#dialog-destroy"
                                data-bs-toggle="modal">
                                <i class="far fa-trash-alt remove-note"></i>
                            </a>

                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">
                        No hay incidencias registradas
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

    {{-- Paginador --}}
    <div>
        {{ $incidencias->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection