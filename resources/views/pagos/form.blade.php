<div class="mb-3">
    <label for="renta_id" class="form-label">Renta</label>
    <select class="form-select" name="renta_id" id="renta_id">
        <option value="">Seleccione una renta</option>
        @forelse ($rentas as $renta )
        <option value="{{ $renta->id }}"{{ old('renta_id', $pago->renta_id ?? '') == $renta->id ? 'selected' : '' }}>
                {{ $renta->nombre }}
            </option>
        @empty
        <option value="">No hay rentas disponibles</option>
        @endforelse
    </select>
</div>
<div class="mb-3">
    <label for="monto" class="form-label">Monto de la renta</label>
    <input type="number" class="form-control" name="monto" id="monto" placeholder="Ingrese el monto de la renta"
        value="{{ old('monto', $pago->monto ?? '') }}" />
</div>
<div>
    <label for="fecha_pago" class="form-label">Fecha Del Pago</label>
    <input type="date" class="form-control" name="fecha_pago" id="fecha_pago" placeholder="Ingrese la fecha del pago"
        value="{{ old('fecha_pago', $pago->fecha_pago ?? '') }}" />
</div>
<div class="mb-3">
    <label for="metodo_pago" class="form-label">Metodo De Pago</label>
    <select class="form-control" name="metodo_pago" id="metodo_pago">
        <option value="efectivo" {{ (old('metodo_pago', $pago->metodo_pago ?? '') == 'efectivo') ? 'selected' : '' }}>Efectivo</option>
        <option value="tarjeta" {{ (old('metodo_pago', $pago->metodo_pago ?? '') == 'tarjeta') ? 'selected' : '' }}>Tarjeta</option>
        <option value="transferencia" {{ (old('metodo_pago', $pago->metodo_pago ?? '') == 'transferencia') ? 'selected' : '' }}>Transferencia</option>
    </select>
</div>
<div>
    <label for="referencia" class="form-label">Referencia</label>
    <input type="text" class="form-control" name="referencia" id="referencia" placeholder="Ingrese la referencia del pago"
        value="{{ old('referencia', $pago->referencia ?? '') }}" />
</div>
<div class="mb-3">
    <label for="estado" class="form-label">Estado Del Pago</label>
    <select class="form-control" name="estado" id="estado">
        <option value="realizado" {{ (old('estado', $pago->estado ?? '') == 'realizado') ? 'selected' : '' }}>Realizado</option>
        <option value="denegado" {{ (old('estado', $pago->estado ?? '') == 'denegado') ? 'selected' : '' }}>Denegado</option>
        <option value="pendiente" {{ (old('estado', $pago->estado ?? '') == 'pendiente') ? 'selected' : '' }}>Pendiente</option>
    </select>
</div>
<div>
    <label for="observaciones" class="form-label">Observaciones</label>
    <input type="text" class="form-control" name="observaciones" id="observaciones" placeholder="Ingrese las observaciones del pago"
        value="{{ old('observaciones', $pago->observaciones ?? '') }}" />
</div>
<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($pago) ? 'Editar' : 'Crear' }} Pago
</button>
