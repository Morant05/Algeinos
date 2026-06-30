<div class="mb-3">
    <label for="obra_id" class="form-label">Obra</label>
    <select class="form-select" name="obra_id" id="obra_id">
        <option value="">Seleccione una obra</option>
        @forelse ($obras as $obra)
        <option value="{{ $obra->id }}"
            {{ old('obra_id', $reporte->obra_id ?? '') == $obra->id ? 'selected' : '' }}>
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
        <option value="{{ $empleado->id }}"
            {{ old('empleado_id', $reporte->empleado_id ?? '') == $empleado->id ? 'selected' : '' }}>
            {{ $empleado->nombre }}
        </option>
        @empty
        <option value="" disabled>No hay empleados disponibles</option>
        @endforelse
    </select>
</div>

<div class="mb-3">
    <label for="tipo" class="form-label">Tipo</label>
    <select class="form-select" name="tipo" id="tipo">
        <option value="">Seleccione un tipo</option>
        @foreach (['diario' => 'Diario', 'semanal' => 'Semanal', 'mensual' => 'Mensual'] as $value => $label)
        <option value="{{ $value }}"
            @selected(old('tipo', $reporte->tipo ?? '') === $value)>
            {{ $label }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="contenido" class="form-label">Contenido</label>
    <textarea class="form-control" name="contenido" id="contenido" rows="4"
        placeholder="Ingrese el contenido del reporte">{{ old('contenido', $reporte->contenido ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" name="fecha" id="fecha"
        value="{{ old('fecha', $reporte->fecha ?? '') }}" />
</div>

<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($reporte) ? 'Editar' : 'Crear' }} reporte
</button>