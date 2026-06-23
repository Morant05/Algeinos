@extends('layouts.app')

@section('title', trans('panel.listado.roles.permisos'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('editar-rol-permisos', $rol) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                {!! Form::open(['method' => 'POST', 'url' => route('roles.update-rol-permisos', ['id' => \Hashids::encode($rol->id)]), 'enctype' => 'multipart/form-data']) !!}

                <div class="card-body">
                    @foreach($grupos as $grupo => $permisos)
                        <table class="table">
                            @if (count($permisos) > 0)
                                <tr class="row">
                                    <td class="d-none d-md-grid col-3 text-center" style="align-items: center !important;">
                                        <h4>{{ $grupo }}</h4>
                                    </td>
                                    <td class="align-middle col-12 col-md-9">
                                        <h4 class="d-md-none d-block text-center mb-4">{{ $grupo }}</h4>
                                        @foreach($permisos->chunk(3) as $permisos_chunk)
                                            <div class="row">
                                                @foreach($permisos_chunk as $permiso)
                                                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 mb-2">
                                                        <input type="checkbox" class="material-inputs chk-col-red" name="permisos[]"
                                                               id="permiso_{{ $permiso->id }}"
                                                               value="{{ $permiso->id }}" @checked(in_array($permiso->id, $permisos_rol))>
                                                        <label for="permiso_{{ $permiso->id }}">
                                                            {{$permiso->descripcion}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                        </table>
                    @endforeach
                </div>
                <div class="mb-3 me-3">
                    <div class="text-end">
                        {{ Form::button('<i class="fa-solid fa-floppy-disk"></i> ' . trans('panel.acciones.guardar'), ['type' => 'submit', 'class' => 'btn waves-effect waves-light btn-rounded btn-light-info text-info border-info px-5'] )  }}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
