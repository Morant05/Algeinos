
<div class="mb-3">
    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Ingrese la fecha de inicio"
        value="{{ old('fecha_inicio', $asignacion->fecha_inicio ?? '') }}" />
</div>
<div class="mb-3">
    <label for="fecha_fin" class="form-label">Fecha de Finalización</label>
    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Ingrese la fecha de finalización"
        value="{{ old('fecha_fin', $asignacion->fecha_fin ?? '') }}" />
</div>
<div class="mb-3">
    <label for="maquina_id" class="form-label">Maquina Asignada</label>
    <select class="form-select" name="maquina_id" id="maquina_id">
        <option value="">Seleccione una maquina</option>
        @forelse ($maquinas as $maquina )
        <option value="{{ $maquina->id }}"{{ old('maquina_id', $asignacion->maquina_id ?? '') == $maquina->id ? 'selected' : '' }}>
                {{ $maquina->nombre }}
            </option>
        @empty
        <option value="">No hay maquinas disponibles</option>
        @endforelse
    </select>
</div>
<div class="mb-3">
    <label for="obra_id" class="form-label">Obra</label>
    <select class="form-select" name="obra_id" id="obra_id">
        <option value="">Seleccione una obra</option>
        @forelse ($obras as $obra )
        <option value="{{ $obra->id }}"{{ old('obra_id', $asignacion->obra_id ?? '') == $obra->id ? 'selected' : '' }}>
                {{ $obra->nombre }}
            </option>
        @empty
        <option value="">No hay obras disponibles</option>
        @endforelse
    </select>
</div>
<div class="mb-3">
    <label for="empleado_id" class="form-label">Empleado Asignado</label>
    <select class="form-select" name="empleado_id" id="empleado_id">
        <option value="">Seleccione un empleado</option>
        @forelse ($empleados as $empleado )
        <option value="{{ $empleado->id }}"{{ old('empleado_id', $asignacion->empleado_id ?? '') == $empleado->id ? 'selected' : '' }}>
                {{ $empleado->nombre }}
        </option>
        @empty
        <option value="">No hay empleados disponibles</option>
        @endforelse
    </select>
</div>
<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($asignacion) ? 'Editar' : 'Crear' }} Asignación
</button>
