<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input
        type="text"
        class="form-control"
        name="nombre"
        id="nombre"
        placeholder="Ingrese el nombre de la evidencia"
        value="{{ old('nombre', $evidencia->nombre ?? '') }}"
    />
</div>

<div class="mb-3">
    <label for="tipo" class="form-label">Tipo</label>
    <input
        type="text"
        class="form-control"
        name="tipo"
        id="tipo"
        placeholder="Ingrese el tipo de archivo"
        value="{{ old('tipo', $evidencia->tipo ?? '') }}"
    />
</div>

<div class="mb-3">
    <label for="ruta" class="form-label">Ruta</label>
    <input
        type="text"
        class="form-control"
        name="ruta"
        id="ruta"
        placeholder="Ingrese la ruta del archivo"
        value="{{ old('ruta', $evidencia->ruta ?? '') }}"
    />
</div>

<div class="mb-3">
    <label for="tamaño" class="form-label">Tamaño</label>
    <input
        type="number"
        class="form-control"
        name="tamaño"
        id="tamaño"
        placeholder="Ingrese el tamaño del archivo"
        value="{{ old('tamaño', $evidencia->tamaño ?? '') }}"
    />
</div>

<div class="mb-3">
    <label for="empresa_id" class="form-label">Empresa</label>
    <select class="form-select" name="empresa_id" id="empresa_id">
        <option value="">Seleccione una empresa</option>

        @forelse ($empresas as $empresa)
            <option
                value="{{ $empresa->id }}"
                {{ old('empresa_id', $evidencia->empresa_id ?? '') == $empresa->id ? 'selected' : '' }}>
                {{ $empresa->nombre }}
            </option>
        @empty
            <option value="" disabled>No hay empresas disponibles</option>
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
                {{ old('empleado_id', $evidencia->empleado_id ?? '') == $empleado->id ? 'selected' : '' }}>
                {{ $empleado->nombre }}
            </option>
        @empty
            <option value="" disabled>No hay empleados disponibles</option>
        @endforelse
    </select>
</div>

<div class="mb-3">
    <label for="incidencia_id" class="form-label">Incidencia</label>
    <select class="form-select" name="incidencia_id" id="incidencia_id">
        <option value="">Seleccione una incidencia</option>

        @forelse ($incidencias as $incidencia)
            <option
                value="{{ $incidencia->id }}"
                {{ old('incidencia_id', $evidencia->incidencia_id ?? '') == $incidencia->id ? 'selected' : '' }}>
                Incidencia #{{ $incidencia->id }}
            </option>
        @empty
            <option value="" disabled>No hay incidencias disponibles</option>
        @endforelse
    </select>
</div>

<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($evidencia) ? 'Editar' : 'Crear' }} evidencia
</button>