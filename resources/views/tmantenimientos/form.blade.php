<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del tipo de mantenimiento"
        value="{{ old('nombre', $tipo_mantenimiento->nombre ?? '') }}" />
</div>
<div class="mb-3">
    <label for="descripcion" class="form-label">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion del autor"
        value="{{ old('descripcion', $tipo_mantenimiento->descripcion ?? '') }}" />
</div>
<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($tipo_mantenimiento) ? 'Editar' : 'Crear' }} Tipo de Mantenimiento
</button>
