<div class="mb-3">
    <label for="usuario_id" class="form-label">Usuario</label>
    <select class="form-select" name="usuario_id" id="usuario_id">
        <option value="">Seleccione un usuario</option>

        @forelse ($usuarios as $usuario)
            <option
                value="{{ $usuario->id }}"
                {{ old('usuario_id', $incidencia->usuario_id ?? '') == $usuario->id ? 'selected' : '' }}>
                {{ $usuario->name }}
            </option>
        @empty
            <option value="" disabled>No hay usuarios disponibles</option>
        @endforelse
    </select>
</div>

<div class="mb-3">
    <label for="obra_id" class="form-label">Obra</label>
    <select class="form-select" name="obra_id" id="obra_id">
        <option value="">Seleccione una obra</option>

        @forelse ($obras as $obra)
            <option
                value="{{ $obra->id }}"
                {{ old('obra_id', $incidencia->obra_id ?? '') == $obra->id ? 'selected' : '' }}>
                {{ $obra->nombre }}
            </option>
        @empty
            <option value="" disabled>No hay obras disponibles</option>
        @endforelse
    </select>
</div>

<div class="mb-3">
    <label for="tipo" class="form-label">Tipo</label>
    <input
        type="text"
        class="form-control"
        name="tipo"
        id="tipo"
        placeholder="Ingrese el tipo de incidencia"
        value="{{ old('tipo', $incidencia->tipo ?? '') }}"
    />
</div>

<div class="mb-3">
    <label for="prioridad" class="form-label">Prioridad</label>
    <select class="form-select" name="prioridad" id="prioridad">
        <option value="">Seleccione una prioridad</option>

        @foreach (['Baja', 'Media', 'Alta'] as $prioridad)
            <option
                value="{{ $prioridad }}"
                {{ old('prioridad', $incidencia->prioridad ?? '') == $prioridad ? 'selected' : '' }}>
                {{ $prioridad }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select class="form-select" name="estado" id="estado">
        <option value="">Seleccione un estado</option>

        @foreach (['Pendiente', 'En proceso', 'Resuelta'] as $estado)
            <option
                value="{{ $estado }}"
                {{ old('estado', $incidencia->estado ?? '') == $estado ? 'selected' : '' }}>
                {{ $estado }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input
        type="date"
        class="form-control"
        name="fecha"
        id="fecha"
        value="{{ old('fecha', $incidencia->fecha ?? '') }}"
    />
</div>

<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($incidencia) ? 'Editar' : 'Crear' }} incidencia
</button>