<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del la categoria"
        value="{{ old('nombre', $categoria->nombre ?? '') }}" />
</div>
<div class="mb-3">
    <label for="descripcion" class="form-label">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion de la categoria"
        value="{{ old('descripcion', $categoria->descripcion ?? '') }}" />
</div>
<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($categoria) ? 'Editar' : 'Crear' }} Categoria
</button>
