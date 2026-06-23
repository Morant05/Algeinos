@extends('layouts.app')

@section('title', trans('panel.listado.permisos.edit'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('editar-permiso', $permiso) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                {!! Form::open(['method' => 'PUT', 'url' => route('permisos.update', \Hashids::encode($permiso->id)), 'enctype' => 'multipart/form-data']) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6 mb-4">
                                {!! Form::label('descripcion', trans('panel.tablas.descripcion'), ['class' => 'form-label']) !!}
                                {!! Form::text('descripcion', $permiso->descripcion, ['class' => 'form-control', 'placeholder' => trans('panel.tablas.descripcion')]) !!}
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 mb-4">
                                {!! Form::label('name', trans('panel.tablas.nombre'), ['class' => 'form-label']) !!}
                                {!! Form::text('name', $permiso->name, ['class' => 'form-control', 'placeholder' => trans('panel.tablas.nombre')]) !!}
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                {!! Form::label('guard_name', trans('panel.tablas.guard_name'), ['class' => 'form-label']) !!}
                                {!! Form::text('guard_name', $permiso->guard_name, ['class' => 'form-control', 'placeholder' => trans('panel.tablas.guard_name')]) !!}
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                {!! Form::label('grupo', trans('panel.tablas.grupo'), ['class' => 'form-label']) !!}
                                {!! Form::text('grupo', $permiso->grupo, ['class' => 'form-control', 'placeholder' => trans('panel.tablas.grupo')]) !!}
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 mt-auto mb-0 mb-md-4">
                                <div class="text-end">
                                    {{ Form::button('<i class="fa-solid fa-floppy-disk"></i> ' . trans('panel.acciones.guardar'), ['type' => 'submit', 'class' => 'btn waves-effect waves-light btn-rounded btn-light-info text-info border-info col-8 col-sm-12'] )  }}
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
