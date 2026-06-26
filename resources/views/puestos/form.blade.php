<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del puesto"
        value="{{ old('nombre', $puesto->nombre ?? '') }}" />
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion del puesto"
        value="{{ old('descripcion', $puesto->descripcion ?? '') }}" />
</div>

<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($puesto) ? 'Editar' : 'Crear' }} puesto
</button>