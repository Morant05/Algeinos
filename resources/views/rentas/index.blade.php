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
<form method="GET" action="{{ route('rentas.index') }}" class="mb-3">
        <div class="row g-2">
            <div class="col-md-5">
                <select class="form-select" name="empresa_id">
                    <option value="">Filtrar por empresa</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}" {{ request('empresa_id') == $empresa->id ? 'selected' : '' }}>
                            {{ $empresa->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5">
                <select class="form-select" name="usuario_id">
                    <option value="">Filtrar por usuario</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ request('usuario_id') == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->name }}
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
        <h2>Rentas</h2>
        <a href="{{ route('rentas.create') }}" class="btn btn-primary">Crear Renta</a>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Hora De Inicio</th>
                    <th scope="col">Hora De Finalizacion</th>
                    <th scope="col">Total por horas</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Extra</th>
                    <th scope="col">Estado De La Renta</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rentas as $renta)
                <tr>
                    <td>{{ $renta->id }}</td>
                    <td>{{ $renta->fecha_inicio }}</td>
                    <td>{{ $renta->fecha_fin }}</td>
                    <td>{{ $renta->hora_inicio }}</td>
                    <td>{{ $renta->hora_fin }}</td>
                    <td>{{ $renta->total }}</td>
                    <td>{{ $renta->empresa->nombre }}</td>
                    <td>{{ $renta->usuario->nombre }}</td>
                    <td>{{ $renta->extra }}</td>
                    <td>{{ $renta->estado }}</td>
                    <td>
                        <div class="btn-group">
                            <a id="btn-edit" href="{{ route('rentas.edit', $renta->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a id="btn-delete" href="{{ route('rentas.destroy', $renta->id) }}"
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
                    <td colspan="11" class="text-center">No hay rentas registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- Paginador --}}
    <br>
    <br>
    <h2>Carrito De Rentas</h2>
<div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Hora De Inicio</th>
                    <th scope="col">Hora De Finalizacion</th>
                    <th scope="col">Total por horas</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Extra</th>
                    <th scope="col">Estado De La Renta</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rentas as $renta)
                <tr>
                    <td>{{ $renta->id }}</td>
                    <td>{{ $renta->fecha_inicio }}</td>
                    <td>{{ $renta->fecha_fin }}</td>
                    <td>{{ $renta->hora_inicio }}</td>
                    <td>{{ $renta->hora_fin }}</td>
                    <td>{{ $renta->total }}</td>
                    <td>{{ $renta->empresa->nombre }}</td>
                    <td>{{ $renta->usuario->nombre }}</td>
                    <td>{{ $renta->extra }}</td>
                    <td>{{ $renta->estado }}</td>
                    <td>
                        <div class="btn-group">
                            <a id="btn-edit" href="{{ route('rentas.edit', $renta->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a id="btn-delete" href="{{ route('rentas.destroy', $renta->id) }}"
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
                    <td colspan="11" class="text-center">No hay rentas registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- Paginador --}}
    <div>
        {{ $rentas->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
