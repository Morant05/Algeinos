<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre de la empresa"
        value="{{ old('nombre', $empresa->nombre ?? '') }}" />
</div>

<div class="mb-3">
    <label for="direccion" class="form-label">Direccion</label>
    <input type="number" class="form-control" name="direccion" id="direccion" placeholder="Ingrese la direccion de la empresa"
        value="{{ old('direccion', $empresa->direccion ?? '') }}" />
</div>

<div class="mb-3">
    <label for="telefono" class="form-label">Telefono</label>
    <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese el telefono de la empresa"
        value="{{ old('telefono', $empresa->telefono ?? '') }}" />
</div>

<div class="mb-3">
    <label for="rfc" class="form-label">RFC</label>
    <input type="text" class="form-control" name="rfc" id="rfc" placeholder="Ingrese el RFC de la empresa"
        value="{{ old('rfc', $empresa->rfc ?? '') }}" />
</div>

<div class="mb-3">
    <label for="correo" class="form-label">Correo</label>
    <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese el correo de la empresa"
        value="{{ old('correo', $empresa->correo ?? '') }}" />
</div>
<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($empresa) ? 'Editar' : 'Crear' }} empresa
</button>