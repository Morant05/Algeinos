<!--Modal Eliminar -->
<div class="modal fade show" id="dialog-destroy" tabindex="-1" aria-labelledby="dialog-destroy" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-light-warning text-warning">
            <div class="modal-body p-4">
                <div class="text-center text-warning">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <h4 class="mt-2">@lang('panel.acciones.borrar_modal_titulo')</h4>
                    <p class="mt-3 text-warning-50">
                        @lang('panel.acciones.borrar_modal')
                    </p>
                    {!! Form::open(['method' => 'DELETE', 'id' => 'form-destroy', 'url' => $_SERVER['REQUEST_URI']]) !!}
                    {!! Form::close() !!}
                    <button id="confirm" type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">
                        @lang('panel.acciones.aceptar')
                    </button>
                    <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">@lang('panel.acciones.cancelar')</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Recuperar-->
<div class="modal fade show" id="dialog-recovery" tabindex="-1" aria-labelledby="dialog-recovery" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-light-warning text-warning">
            <div class="modal-body p-4">
                <div class="text-center text-warning">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <h4 class="mt-2">@lang('panel.acciones.borrar_modal_titulo')</h4>
                    <p class="mt-3 text-warning-50">
                        @lang('panel.acciones.borrar_modal')
                    </p>
                    {!! Form::open(['method' => 'DELETE', 'id' => 'form-destroy', 'url' => $_SERVER['REQUEST_URI']]) !!}
                    {!! Form::close() !!}
                    <button id="confirm" type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">
                        @lang('panel.acciones.aceptar')
                    </button>
                    <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">@lang('panel.acciones.cancelar')</button>
                </div>
            </div>
        </div>
    </div>
</div>
