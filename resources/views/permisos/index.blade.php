@extends('layouts.app')

@section('title', trans('panel.listado.permisos.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('menu-permisos') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body row">
                    <div class="col-12 col-md-8">
                        {!! Form::open(['method' => 'GET', 'class' => 'row']) !!}

                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                {!! Form::text('busqueda', request('busqueda'), ['class' => 'form-control', 'placeholder' => trans('panel.filtros.busqueda')]) !!}
                            </div>

                            <div class="col-9 col-md-4">
                                {!! Form::select('grupo', $grupos, request('grupo'), ['class' => 'form-control select2', 'placeholder' => trans('panel.filtros.grupo')]) !!}
                            </div>

                            <div class="col-auto">
                                {{ Form::button('<i class="fa-solid fa-magnifying-glass"></i> ' , ['type' => 'submit', 'class' => 'btn btn-success'] )  }}
                            </div>

                        {!! Form::close() !!}
                    </div>

                    <div class="col-12 col-md-4 text-end mt-3 mt-md-0">
                        <a href="{{ route('permisos.create') }}"
                           class="btn waves-effect waves-light btn-rounded btn-light-info text-info border-info col-6 col-sm-4 col-md-auto">
                            <i class="fa-solid fa-plus"></i> @lang('panel.acciones.crear')
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table customize-table mb-0 v-middle">
                        <thead class="table-light">
                        <tr>
                            <th class="border-bottom border-top">@lang('panel.tablas.descripcion')</th>
                            <th class="border-bottom border-top">@lang('panel.tablas.nombre')</th>
                            <th class="border-bottom border-top">@lang('panel.tablas.guard_name')</th>
                            <th class="border-bottom border-top">@lang('panel.tablas.grupo')</th>
                            <th class="border-bottom border-top">@lang('panel.tablas.acciones')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($permisos as $permiso)
                            <tr>
                                <td>{{ $permiso->descripcion }}</td>
                                <td>{{ $permiso->name }}</td>
                                <td>{{ $permiso->guard_name }}</td>
                                <td>{{ $permiso->grupo }}</td>
                                <td>
                                    <div class="dropdown dropstart btn-group">
                                        <a id="btn-edit" href="{{ route('permisos.edit', \Hashids::encode($permiso->id)) }}"
                                            style="padding: 3px 20px; font-size: 14px;" class="btn waves-effect waves-light btn-rounded btn-light-warning text-warning border-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Editar">
                                           <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <a id="btn-destroy" href="{{ route('permisos.destroy', \Hashids::encode($permiso->id)) }}"
                                            style="padding: 3px 20px; font-size: 14px;" 
                                            class="action-destroy btn waves-effect waves-light btn-rounded btn-light-danger text-danger border-danger"
                                            title="{{ trans('panel.acciones.borrar') }}"
                                            data-bs-target="#dialog-destroy" data-bs-toggle="modal">
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

                @if($permisos->hasPages())
                    <div class="p-3">
                        {!! $permisos->appends(request()->all())->links() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
