<div class="mb-3">
    <label for="obra_id" class="form-label">Obra</label>
    <select class="form-select" name="obra_id" id="obra_id">
        <option value="">Seleccione una obra</option>

        @forelse ($obras as $obra)
            <option
                value="{{ $obra->id }}"
                {{ old('obra_id', $bitacora->obra_id ?? '') == $obra->id ? 'selected' : '' }}>
                {{ $obra->nombre }}
            </option>
        @empty
            <option value="" disabled>No hay obras disponibles</option>
        @endforelse
    </select>
</div>

<div class="mb-3">
    <label for="empleado_id" class="form-label">Empleado</label>
    <select class="form-select" name="empleado_id" id="empleado_id">
        <option value="">Seleccione un empleado</option>

        @forelse ($empleados as $empleado)
            <option
                value="{{ $empleado->id }}"
                {{ old('empleado_id', $bitacora->empleado_id ?? '') == $empleado->id ? 'selected' : '' }}>
                {{ $empleado->nombre }}
            </option>
        @empty
            <option value="" disabled>No hay empleados disponibles</option>
        @endforelse
    </select>
</div>

<div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input
        type="date"
        class="form-control"
        name="fecha"
        id="fecha"
        value="{{ old('fecha', $bitacora->fecha ?? '') }}"
    />
</div>

<div class="mb-3">
    <label for="actividades" class="form-label">Actividades</label>
    <textarea
        class="form-control"
        name="actividades"
        id="actividades"
        rows="4"
        placeholder="Ingrese las actividades realizadas">{{ old('actividades', $bitacora->actividades ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="comentarios" class="form-label">Comentarios</label>
    <textarea
        class="form-control"
        name="comentarios"
        id="comentarios"
        rows="4"
        placeholder="Ingrese los comentarios">{{ old('comentarios', $bitacora->comentarios ?? '') }}</textarea>
</div>

<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($bitacora) ? 'Editar' : 'Crear' }} bitácora
</button> 