<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre de la sucursal"
        value="{{ old('nombre', $sucursal->nombre ?? '') }}" />
</div>

<div class="mb-3">
    <label for="direccion" class="form-label">Direccion</label>
    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese la direccion de la sucursal"
        value="{{ old('direccion', $sucursal->direccion ?? '') }}" />
</div>

<div class="mb-3">
    <label for="telefono" class="form-label">Telefono</label>
    <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese el telefono de la sucursal"
        value="{{ old('telefono', $sucursal->telefono ?? '') }}" />
</div>

<div class="mb-3">
    <label for="email" class="form-label">Correo</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese el correo de la sucursal" required
        value="{{ old('email', $sucursal->email ?? '') }}" />
</div>

<div class="mb-3">
    <label for="empresa_id" class="form-label">Empresa</label>
    <select class="form-select" name="empresa_id" id="empresa_id">
        <option value="">Seleccione una empresa</option>
        @forelse ($empresas as $empresa)
        <option value="{{ $empresa->id }}" {{ old('empresa_id', $sucursal->empresa_id ?? '') == $empresa->id ? 'selected' : '' }}>
            {{ $empresa->nombre }}
        </option>
        @empty
        <option value="" disabled>No hay empresas disponibles</option>
        @endforelse
    </select>
</div>

<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($sucursal) ? 'Editar' : 'Crear' }} sucursal
</button>