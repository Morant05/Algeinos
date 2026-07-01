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
    @can('crear-empleados')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Empleados</h2>
        <a href="{{ route('empleados.create') }}" class="btn btn-primary">Crear Empleado</a>
    </div>
    @endcan

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Rol</th>
                    @canany(['editar-empleados', 'eliminar-empleados'])
                    <th scope="col">Acciones</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @forelse ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellido }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->estado }}</td>
                    <td>{{ $empleado->empresa->nombre }}</td>
                    <td>{{ $empleado->rol_name }}</td>
                    @canany(['editar-empleados', 'eliminar-empleados'])
                    <td>
                        <div class="btn-group">
                            @can('editar-empleados')
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning">
                                Editar
                            </a>
                            @endcan

                            @can('eliminar-empleados')
                            <a href="{{ route('empleados.destroy', $empleado->id) }}"
                                class="btn btn-danger">
                                Eliminar
                            </a>
                            @endcan
                        </div>
                    </td>
                    @endcanany
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay empleados registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginador --}}
    <div>
        {{ $empleados->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection