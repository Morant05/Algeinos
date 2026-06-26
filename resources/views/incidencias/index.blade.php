@extends('layouts.app')

@section('title', 'Listado de Incidencias')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                {{-- Sección Buscador --}}
                <div class="card-body row">
                    <div class="col-12 col-md-6">
                        {!! Form::open(['method' => 'GET', 'class' => 'row']) !!}

                        <div class="col-12">
                            <div class="input-group">
                                {!! Form::text('busqueda', request('busqueda'), [
                                    'class' => 'form-control',
                                    'placeholder' => 'Buscar incidencia...',
                                ]) !!}

                                {{ Form::button('<i class="fa-solid fa-magnifying-glass"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn waves-effect waves-light btn-success text-light'
                                ]) }}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    <div class="col-12 col-md-6 text-end mt-3 mt-md-0">
                        <a href="{{ route('incidencias.create') }}"
                           class="btn waves-effect waves-light btn-rounded btn-light-info text-info border-info">
                            <i class="fa-solid fa-plus"></i> Crear
                        </a>
                    </div>
                </div>

                {{-- Tabla --}}
                <div class="table-responsive">
                    <table class="table customize-table mb-0 v-middle">
                        <thead class="table-light">
                        <tr>
                            <th>Usuario</th>
                            <th>Obra</th>
                            <th>Tipo</th>
                            <th>Prioridad</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($incidencias as $incidencia)
                            <tr>
                                <td>{{ $incidencia->usuario->nombre ?? 'N/A' }}</td>
                                <td>{{ $incidencia->obra->nombre ?? 'N/A' }}</td>
                                <td>{{ $incidencia->tipo }}</td>
                                <td>{{ $incidencia->prioridad }}</td>
                                <td>{{ $incidencia->estado }}</td>
                                <td>{{ $incidencia->fecha }}</td>

                                <td>
                                    <div class="btn-group">

                                        <a href="{{ route('incidencias.show', $incidencia->id) }}"
                                           class="btn waves-effect waves-light btn-rounded btn-light-info text-info border-info">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <a href="{{ route('incidencias.edit', $incidencia->id) }}"
                                           class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('incidencias.destroy', $incidencia->id) }}"
                                              method="POST"
                                              style="display:inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn waves-effect waves-light btn-rounded btn-light-danger text-danger border-danger"
                                                    onclick="return confirm('¿Desea eliminar esta incidencia?')">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    No se encontraron incidencias.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection