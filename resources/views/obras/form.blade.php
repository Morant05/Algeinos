<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del cliente"
        value="{{ old('nombre', $obra->nombre ?? '') }}" />
</div>
<div>
    <label for="descripcion" class="form-label">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion del cliente"
        value="{{ old('descripcion', $obra->descripcion ?? '') }}" />
</div>
<div>
    <label for="direccion" class="form-label">Direccion</label>
    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese la direccion del cliente"
        value="{{ old('direccion', $obra->direccion ?? '') }}" />
</div>
<div>
    <label for="latitud" class="form-label">Latitud</label>
    <input type="number" class="form-control" name="latitud" id="latitud" placeholder="Ingrese la latitud del cliente"
        value="{{ old('latitud', $obra->latitud ?? '') }}" />
</div>
<div>
    <label for="longitud" class="form-label">Longitud</label>
    <input type="number" class="form-control" name="longitud" id="longitud" placeholder="Ingrese la longitud del cliente"
        value="{{ old('longitud', $obra->longitud ?? '') }}" />
</div>
<div>
    <label for="presupuesto" class="form-label">Presupuesto</label>
    <input type="number" class="form-control" name="presupuesto" id="presupuesto" placeholder="Ingrese el presupuesto del cliente"
        value="{{ old('presupuesto', $obra->presupuesto ?? '') }}" />
</div>
<div>
    <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Ingrese la fecha de inicio"
        value="{{ old('fecha_inicio', $obra->fecha_inicio ?? '') }}" />
</div>
<div>
    <label for="fecha_fin" class="form-label">Fecha Fin</label>
    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Ingrese la fecha de fin"
        value="{{ old('fecha_fin', $obra->fecha_fin ?? '') }}" />
</div>
<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select class="form-control" name="estado" id="estado">
        <option value="no iniciada" {{ (old('estado', $obra->estado ?? '') == 'no iniciada') ? 'selected' : '' }}>No iniciada</option>
        <option value="iniciada" {{ (old('estado', $obra->estado ?? '') == 'iniciada') ? 'selected' : '' }}>Iniciada</option>
        <option value="pausada" {{ (old('estado', $obra->estado ?? '') == 'pausada') ? 'selected' : '' }}>Pausada</option>
        <option value="finalizada" {{ (old('estado', $obra->estado ?? '') == 'finalizada') ? 'selected' : '' }}>Finalizada</option>
    </select>
</div>
<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($obra) ? 'Editar' : 'Crear' }} Obra
</button>
