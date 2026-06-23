@extends('layouts.app')

@section('title', trans('panel.listado.roles.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('menu-roles') }}
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
                        <a href="{{ route('roles.create') }}"
                           class="btn waves-effect waves-light btn-rounded btn-light-info text-info border-info col-6 col-sm-4 col-md-auto">
                            <i class="fa-solid fa-plus"></i> @lang('panel.acciones.crear')
                        </a>
                    </div>
                </div>
                {{-- Fin de Seccion --}}

                <div class="table-responsive">
                    <table class="table customize-table mb-0 v-middle">
                        <thead class="table-light">
                        <tr>
                            <th class="border-bottom border-top">@lang('panel.tablas.descripcion')</th>
                            <th class="border-bottom border-top">@lang('panel.tablas.nombre')</th>
                            <th class="border-bottom border-top">@lang('panel.tablas.guard_name')</th>
                            <th class="border-bottom border-top">@lang('panel.tablas.acciones')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $rol)
                            <tr>
                                <td>{{ $rol->descripcion }}</td>
                                <td>{{ $rol->name }}</td>
                                <td>{{ $rol->guard_name }}</td>
                                <td>
                                    <div class="dropdown dropstart btn-group">
                                        <a id="btn-permisos" href="{{ route('roles.rol-permisos', \Hashids::encode($rol->id)) }}"
                                           class="btn waves-effect waves-light btn-rounded btn-light-info text-info border-info" title="{{ trans('panel.acciones.editar_permisos') }}"
                                           data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Editar permisos" style="font-size: 14px; padding: 3px 15px;">
                                            <i class="fa-solid fa-list-check"></i>
                                        </a>

                                        <a id="btn-edit" href="{{ route('roles.edit', \Hashids::encode($rol->id)) }}"
                                            class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning" title="{{ trans('panel.acciones.editar') }}"
                                           data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Editar" style="font-size: 14px; padding: 3px 15px;">
                                           <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <a id="btn-destroy" href="{{ route('roles.destroy', \Hashids::encode($rol->id)) }}"
                                            class="action-destroy btn waves-effect waves-light btn-rounded btn-light-danger text-danger border-danger"
                                            title="{{ trans('panel.acciones.borrar') }}"
                                            data-bs-target="#dialog-destroy" data-bs-toggle="modal" 
                                            style="font-size: 14px; padding: 3px 15px;">
                                           <i class="far fa-trash-alt remove-note"></i>
                                        </a>
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

                @if($roles->hasPages())
                    <div class="p-3">
                        {!! $roles->appends(request()->all())->links() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
