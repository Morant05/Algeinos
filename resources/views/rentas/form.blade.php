
<div class="mb-3">
    <label for="fecha_inicio" class="form-label">Fecha De Inicio</label>
    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Ingrese la fecha de inicio"
        value="{{ old('fecha_inicio', $renta->fecha_inicio ?? '') }}" />
</div>
<div class="mb-3">
    <label for="fecha_fin" class="form-label">Fecha De Finalizacion</label>
    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Ingrese la fecha de finalizacion"
        value="{{ old('fecha_fin', $renta->fecha_fin ?? '') }}" />
</div>
<div>
    <label for="hora_inicio" class="form-label">Hora De Inicio</label>
    <input type="time" class="form-control" name="hora_inicio" id="hora_inicio" placeholder="Ingrese la hora de inicio"
        value="{{ old('hora_inicio', $renta->hora_inicio ?? '') }}" />
</div>
<div>
    <label for="hora_fin" class="form-label">Hora De Finalizacion</label>
    <input type="time" class="form-control" name="hora_fin" id="hora_fin" placeholder="Ingrese la hora de finalizacion"
        value="{{ old('hora_fin', $renta->hora_fin ?? '') }}" />
</div>
<div>
    <label for="total" class="form-label">Total De La Renta</label>
    <input type="number" class="form-control" name="total" id="total" placeholder="Ingrese el total de la renta"
        value="{{ old('total', $renta->total ?? '') }}" />
</div>
<div class="mb-3">
    <label for="empresa_id" class="form-label">Empresa</label>
    <select class="form-select" name="empresa_id" id="empresa_id">
        <option value="">Seleccione una empresa</option>
        @forelse ($empresas as $empresa )
        <option value="{{ $empresa->id }}"{{ old('empresa_id', $renta->empresa_id ?? '') == $empresa->id ? 'selected' : '' }}>
                {{ $empresa->nombre }}
            </option>
        @empty
        <option value="">No hay empresas disponibles</option>
        @endforelse
    </select>
</div>
<div class="mb-3">
    <label for="usuario_id" class="form-label">Usuario</label>
    <select class="form-select" name="usuario_id" id="usuario_id">
        <option value="">Seleccione un usuario</option>
        @forelse ($usuarios as $usuario )
        <option value="{{ $usuario->id }}"{{ old('usuario_id', $renta->usuario_id ?? '') == $usuario->id ? 'selected' : '' }}>
                {{ $usuario->nombre }}
            </option>
        @empty
        <option value="">No hay usuarios disponibles</option>
        @endforelse
    </select>
</div>
<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($renta) ? 'Editar' : 'Crear' }} Renta
</button>
