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
        <h2>Reportes</h2>
        <a href="{{ route('reportes.create') }}" class="btn btn-primary">Crear Reporte</a>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Obra</th>
                    <th scope="col">Empleado</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Contenido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->obra->nombre ?? '' }}</td>
                    <td>{{ $reporte->empleado->nombre ?? '' }}</td>
                    <td>{{ $reporte->tipo }}</td>
                    <td>{{ $reporte->contenido }}</td>
                    <td>{{ $reporte->fecha }}</td>

                    <td>
                        <div class="btn-group">

                            <a id="btn-edit"
                                href="{{ route('reportes.edit', $reporte->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>

                            <a id="btn-delete"
                                href="{{ route('reportes.destroy', $reporte->id) }}"
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
                    <td colspan="7" class="text-center">No hay reportes registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginador --}}
    <div>
        {{ $reportes->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection