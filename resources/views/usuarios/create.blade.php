@extends('layouts.app')

@section('title', trans('panel.listado.usuarios.create'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('crear-usuario') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                {!! Form::open(['method' => 'POST', 'url' => route('usuarios.store'), 'enctype' => 'multipart/form-data']) !!}
                {{-- Seccion de datos --}}
                <div class="card-body">
                    <div class="row">
                        {{-- Seccion de datos --}}
                        <div class="col-xs-12 col-sm-12 col-md-6 mb-4">
                            <div class="form-group">
                                {!! Form::label('nombre', trans('panel.tablas.nombre'), ['class' => 'form-label']) !!}
                                {!! Form::text('nombre', null, [
                                    'class' => 'form-control',
                                    'placeholder' => trans('placeholders.usuarios.nombre'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 mb-4">
                            <div class="form-group">
                                {!! Form::label('email', trans('panel.tablas.email'), ['class' => 'form-label']) !!}
                                {!! Form::text('email', null, [
                                    'class' => 'form-control',
                                    'placeholder' => trans('placeholders.usuarios.email'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 mb-4">
                            <div class="form-group">
                                {!! Form::label('password', trans('panel.tablas.password'), ['class' => 'form-label']) !!}
                                {!! Form::password('password', [
                                    'class' => 'form-control',
                                    'placeholder' => trans('placeholders.usuarios.password'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 mb-4">
                            <div class="form-group">
                                {!! Form::label('confirmar-password', trans('panel.tablas.confirmarpassword'), ['class' => 'form-label']) !!}
                                {!! Form::password('confirmar-password', [
                                    'class' => 'form-control',
                                    'placeholder' => trans('placeholders.usuarios.confirmpassword'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 mb-4">
                            <div class="form-group">
                                {!! Form::label('rol', trans('panel.tablas.rol'), ['class' => 'form-label']) !!}
                                {!! Form::select('rol', $roles, null, [
                                    'class' => 'form-control buscador',
                                    'id' => 'rol_id',
                                    'placeholder' => trans('placeholders.usuarios.rol'),
                                    'height' => '20px',
                                ]) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 mt-auto mb-0 mb-md-4">
                            <div class="text-end">
                                {{ Form::button('<i class="fa-solid fa-floppy-disk"></i> ' . trans('panel.acciones.guardar'), ['type' => 'submit', 'class' => 'btn waves-effect waves-light btn-rounded btn-light-info text-info border-info col-8 col-sm-6']) }}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
