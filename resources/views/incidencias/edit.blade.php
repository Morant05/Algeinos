@extends('layouts.app')

@section('title', 'Editar Incidencia')

@section('breadcrumbs')
    {{ Breadcrumbs::render('editar-incidencia', $incidencia) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                {!! Form::open([
                    'method' => 'PUT',
                    'url' => route('incidencias.update', \Hashids::encode($incidencia->id)),
                    'enctype' => 'multipart/form-data'
                ]) !!}

                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 col-md-6 mb-4">
                                {!! Form::label('usuario_id', 'Usuario', ['class' => 'form-label']) !!}
                                {!! Form::select(
                                    'usuario_id',
                                    $usuarios->pluck('nombre', 'id'),
                                    $incidencia->usuario_id,
                                    [
                                        'class' => 'form-control',
                                        'placeholder' => 'Seleccione un usuario'
                                    ]
                                ) !!}
                            </div>

                            <div class="col-12 col-md-6 mb-4">
                                {!! Form::label('obra_id', 'Obra', ['class' => 'form-label']) !!}
                                {!! Form::select(
                                    'obra_id',
                                    $obras->pluck('nombre', 'id'),
                                    $incidencia->obra_id,
                                    [
                                        'class' => 'form-control',
                                        'placeholder' => 'Seleccione una obra'
                                    ]
                                ) !!}
                            </div>

                            <div class="col-12 col-md-6 mb-4">
                                {!! Form::label('tipo', 'Tipo', ['class' => 'form-label']) !!}
                                {!! Form::text('tipo', $incidencia->tipo, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Tipo de incidencia'
                                ]) !!}
                            </div>

                            <div class="col-12 col-md-6 mb-4">
                                {!! Form::label('prioridad', 'Prioridad', ['class' => 'form-label']) !!}
                                {!! Form::select(
                                    'prioridad',
                                    [
                                        'Baja' => 'Baja',
                                        'Media' => 'Media',
                                        'Alta' => 'Alta'
                                    ],
                                    $incidencia->prioridad,
                                    [
                                        'class' => 'form-control',
                                        'placeholder' => 'Seleccione la prioridad'
                                    ]
                                ) !!}
                            </div>

                            <div class="col-12 col-md-6 mb-4">
                                {!! Form::label('estado', 'Estado', ['class' => 'form-label']) !!}
                                {!! Form::select(
                                    'estado',
                                    [
                                        'Abierta' => 'Abierta',
                                        'En proceso' => 'En proceso',
                                        'Cerrada' => 'Cerrada'
                                    ],
                                    $incidencia->estado,
                                    [
                                        'class' => 'form-control',
                                        'placeholder' => 'Seleccione el estado'
                                    ]
                                ) !!}
                            </div>

                            <div class="col-12 col-md-6 mb-4">
                                {!! Form::label('fecha', 'Fecha', ['class' => 'form-label']) !!}
                                {!! Form::date('fecha', $incidencia->fecha, [
                                    'class' => 'form-control'
                                ]) !!}
                            </div>

                            <div class="col-12 col-md-6 mb-0 mb-md-4 mt-auto">
                                <div class="text-end">
                                    {{ Form::button('<i class="fa-solid fa-floppy-disk"></i> Guardar', [
                                        'type' => 'submit',
                                        'class' => 'btn waves-effect waves-light btn-rounded btn-light-info text-info border-info col-8 col-sm-6'
                                    ]) }}
                                </div>
                            </div>

                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection