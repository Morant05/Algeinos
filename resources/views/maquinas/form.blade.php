<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre de la maquinaria"
     value="{{ old('nombre', $maquina->nombre ?? '') }}" />
</div>
<div class="mb-3">
    <label for="marca" class="form-label">Marca</label>
    <input type="text" class="form-control" name="marca" id="marca" placeholder="Ingrese la marca de la maquinaria"
    value="{{ old('marca', $maquina->marca ?? '') }}"/>
</div>
<div class="mb-3">
    <label for="modelo" class="form-label">Modelo</label>
    <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Ingrese el modelo de la maquinaria"
    value="{{ old('modelo', $maquina->modelo ?? '') }}"/>
</div>
<div class="mb-3">
    <label for="serie" class="form-label">Numero de serie</label>
    <input type="text" class="form-control" name="serie" id="serie" placeholder="Ingrese el numero de serie de la maquina"
    value="{{ old('serie', $maquina->serie ?? '') }}"/>
</div>
<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <input type="text" class="form-control" name="estado" id="estado" placeholder="Ingrese el estado de la maquina"
    value="{{ old('estado', $maquina->estado ?? '') }}"/>
</div>
<div>
    <label for="categoria_id" class="form-label">Categorias</label>
    <select class="form-select" name="categoria_id" id="categoria_id">
            <option value="">Seleccione una Categoria</option>
            @forelse ($categorias ?? [] as $categoria)
            <option value="{{ $categoria->id }}"{{ old('categoria_id', $maquina->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
            @empty
            <option value="">No Hay CATEGORIAS Disponibles</option>
            @endforelse
    </select>
</div>
<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($maquina) ? 'Editar' : 'Crear' }} Maquina
</button>
