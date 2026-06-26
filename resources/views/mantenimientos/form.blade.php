
<div class="mb-3">
    <label for="tipo_id" class="form-label">Tipo de mantenimiento</label>
    <select class="form-select" name="tipo_id" id="tipo_id">
        <option value="">Seleccione un tipo de mantenimiento</option>
        @forelse ($tmantenimientos as $tmantenimiento )
        <option value="{{ $tmantenimiento->id }}"{{ old('tipo_id', $mantenimiento->tipo_id ?? '') == $tmantenimiento->id ? 'selected' : '' }}>
                {{ $tmantenimiento->nombre }}
            </option>
        @empty
        <option value="">No hay tipos de mantenimiento disponibles</option>
        @endforelse
    </select>
</div>
<div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Ingrese la fecha del mantenimiento"
        value="{{ old('fecha', $mantenimiento->fecha ?? '') }}" />
</div>
<div class="mb-3">
    <label for="costo" class="form-label">Costo</label>
    <input type="number" class="form-control" name="costo" id="costo" placeholder="Ingrese el costo del mantenimiento"
        value="{{ old('costo', $mantenimiento->costo ?? '') }}" />
</div>
<div>
    <label for="tiempo" class="form-label">Tiempo</label>
    <input type="number" class="form-control" name="tiempo" id="tiempo" placeholder="Ingrese el tiempo del mantenimiento"
        value="{{ old('tiempo', $mantenimiento->tiempo ?? '') }}" />
</div>
<div>
    <label for="descripcion" class="form-label">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion del mantenimiento"
        value="{{ old('descripcion', $mantenimiento->descripcion ?? '') }}" />
</div>
<div class="mb-3">
    <label for="maquina_id" class="form-label">Maquina</label>
    <select class="form-select" name="maquina_id" id="maquina_id">
        <option value="">Seleccione una maquina</option>
        @forelse ($maquinas as $maquina )
        <option value="{{ $maquina->id }}"{{ old('maquina_id', $mantenimiento->maquina_id ?? '') == $maquina->id ? 'selected' : '' }}>
                {{ $maquina->nombre }}
            </option>
        @empty
        <option value="">No hay maquinas disponibles</option>
        @endforelse
    </select>
</div>
<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($mantenimiento) ? 'Editar' : 'Crear' }} Mantenimiento
</button>
