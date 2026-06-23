@extends('layouts.app')

@section('title', trans('panel.listado.usuarios.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('menu-usuarios') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                {{-- Seccion Buscardor --}}
                <div class="card-body row">
                    <div class="col-12 col-md-6">
                        {!! Form::open(['method' => 'GET', 'class' => 'row']) !!}

                            <div class="col-12">
                                <div class="input-group">
                                    {!! Form::text('busqueda', request('busqueda'), [
                                        'class' => 'form-control',
                                        'placeholder' => trans('placeholders.filtros.busqueda'),
                                        'aria-describedby' => 'basic-addon1',
                                    ]) !!}
                                    {{ Form::button('<i class="fa-solid fa-magnifying-glass"></i> ', ['type' => 'submit', 'class' => 'btn waves-effect waves-light btn-success text-light']) }}
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                    <div class="col-12 col-md-6 text-end mt-3 mt-md-0">
                        <a href="{{ route('usuarios.create') }}"
                            class="btn waves-effect waves-light btn-rounded btn-light-info text-info border-info col-6 col-sm-4 col-md-auto">
                            <i class="fa-solid fa-plus"></i> @lang('panel.acciones.crear')
                        </a>
                    </div>
                </div>
                {{-- Fin de Seccion --}}


                {{-- Seccion tabla --}}
                <div class="table-responsive">
                    <table class="table customize-table mb-0 v-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="border-bottom border-top">@lang('panel.tablas.nombre')</th>
                                <th class="border-bottom border-top">@lang('panel.tablas.email')</th>
                                <th class="border-bottom border-top">@lang('panel.tablas.rol')</th>
                                <th class="border-bottom border-top">@lang('panel.tablas.acciones')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        @if (!empty($usuario->getRoleNames()))
                                            @foreach ($usuario->getRoleNames() as $rolnombre)
                                                <h5><span class="badge bg-dark">{{ $rolnombre }}</span></h5>

                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a id="btn-edit"
                                                href="{{ route('usuarios.edit', \Hashids::encode($usuario->id)) }}"
                                                style="padding: 3px 20px; font-size: 14px;"
                                                class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                                title="{{ trans('panel.acciones.editar') }}" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Editar">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>

                                            <a id="btn-delete"
                                                href="{{ route('usuarios.destroy', \Hashids::encode($usuario->id)) }}"
                                                style="padding: 3px 20px; font-size: 14px;"
                                                class="action-destroy btn waves-effect waves-light btn-rounded btn-light-danger text-danger border-danger"
                                                title="{{ trans('panel.acciones.borrar') }}"
                                                data-bs-target="#dialog-destroy" data-bs-toggle="modal">
                                                <i class="far fa-trash-alt remove-note"></i>
                                            </a>
                            @endforeach
                            @endif
                </div>
                </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            @lang('panel.tablas.sin_resultados')
                        </td>
                    </tr>
                    @endforelse
                    </tbody>
                    </table>
                </div>
                {{-- Fin de Seccion --}}

                {{-- Seccion de Paginacion --}}
                @if ($usuarios->hasPages())
                    <div class="p-3">
                        {!! $usuarios->appends(request()->all())->links() !!}
                    </div>
                @endif
                {{-- Fin de Seccion --}}
            </div>
        </div>
        </div>
    @endsection
