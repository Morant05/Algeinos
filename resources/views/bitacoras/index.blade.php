@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Mensajes de sesión --}}
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Bitácoras</h2>
        <a href="{{ route('bitacoras.create') }}" class="btn btn-primary">Crear bitácora</a>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Obra</th>
                    <th>Empleado</th>
                    <th>Fecha</th>
                    <th>Actividades</th>
                    <th>Comentarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bitacoras as $bitacora)
                    <tr>
                        <td>{{ $bitacora->id }}</td>
                        <td>{{ $bitacora->obra->nombre ?? '-' }}</td>
                        <td>{{ $bitacora->empleado->nombre ?? '-' }}</td>
                        <td>{{ $bitacora->fecha }}</td>
                        <td>{{ Str::limit($bitacora->actividades, 60) }}</td>
                        <td>{{ Str::limit($bitacora->comentarios, 60) }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('bitacoras.edit', $bitacora->id) }}"
                                    class="btn btn-sm btn-warning text-white"
                                    title="Editar">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('bitacoras.destroy', $bitacora->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Seguro que deseas eliminar esta bitácora?')"
                                        title="Eliminar">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay bitácoras registradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $bitacoras->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection