@section('content')
<div class="container">

    {{-- Mensaje de sesión --}}
    @if (Session::has('mensaje'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Mensaje:</strong> {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
<form method="GET" action="{{ route('pagos.index') }}" class="mb-3">
        <div class="row g-2">
            <div class="col-md-5">
                <input type="text" name="referencia" class="form-control" placeholder="Buscar por referencia"
                    value="{{ request('referencia') }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-secondary w-100" type="submit">Filtrar</button>
            </div>
        </div>
</form>
    {{-- Formulario de búsqueda --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Pagos</h2>
        <a href="{{ route('pagos.create') }}" class="btn btn-primary">Crear pagos</a>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ID De La Renta</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha Del Pago</th>
                    <th scope="col">Metodo De Pago</th>
                    <th scope="col">Referencia</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pagos as $pago)
                <tr>
                    <td>{{ $pago->id }}</td>
                    <td>{{ $pago->renta->id }}</td>
                    <td>{{ $pago->monto }}</td>
                    <td>{{ $pago->fecha_pago }}</td>
                    <td>{{ $pago->metodo_pago }}</td>
                    <td>{{ $pago->referencia }}</td>
                    <td>{{ $pago->estado }}</td>
                    <td>{{ $pago->observaciones }}</td>
                    <td>
                        <div class="btn-group">
                            <a id="btn-edit" href="{{ route('pagos.edit', $pago->id) }}"
                                style="padding: 3px 20px; font-size: 14px;"
                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a id="btn-delete" href="{{ route('pagos.destroy', $pago->id) }}"
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
                    <td colspan="8" class="text-center">No hay pagos registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginador --}}
    <div>
        {{ $pagos->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
