<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del empleado"
        value="{{ old('nombre', $empleado->nombre ?? '') }}" />
</div>

<div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese el apellido del empleado"
        value="{{ old('apellido', $empleado->apellido ?? '') }}" />
</div>

<div class="mb-3">
    <label for="telefono" class="form-label">Telefono</label>
    <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese el telefono del empleado"
        value="{{ old('telefono', $empleado->telefono ?? '') }}" />
</div>


<div class="mb-3">
    <label for="email" class="form-label">Correo</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese el email del empleado"
        value="{{ old('email', $empleado->email ?? '') }}" />
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="password">Contraseña @if(!isset($empleado) || !$empleado)<span class="text-danger">*</span>@endif</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                id="password" name="password" placeholder="Mínimo 8 caracteres"
                {{ (!isset($empleado) || !$empleado) ? 'required' : '' }}>
            @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="confirmar-password">Confirmar contraseña @if(!isset($empleado) || !$empleado)<span class="text-danger">*</span>@endif</label>
            <input type="password" class="form-control @error('confirmar-password') is-invalid @enderror"
                id="confirmar-password" name="confirmar-password" placeholder="Repite la contraseña"
                {{ (!isset($empleado) || !$empleado) ? 'required' : '' }}>
            @error('confirmar-password')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-6 mb-4">
    <label for="estado" class="form-label">Estado</label>
    <select class="form-select" name="estado" id="estado">
        <option value="">Seleccione un estado</option>
        @foreach (['activo' => 'Activo', 'inactivo' => 'Inactivo'] as $value => $label)
        <option value="{{ $value }}" @selected(old('estado', $empleado->estado ?? 'activo') === $value)>{{ $label }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="empresa_id" class="form-label">Empresa</label>
    <select class="form-select" name="empresa_id" id="empresa_id">
        <option value="">Seleccione una empresa</option>
        @forelse ($empresas as $empresa)
        <option value="{{ $empresa->id }}" {{ old('empresa_id', $empleado->empresa_id ?? '') == $empresa->id ? 'selected' : '' }}>
            {{ $empresa->nombre }}
        </option>
        @empty
        <option value="" disabled>No hay empresas disponibles</option>
        @endforelse
    </select>
</div>

<div class="mb-3">
    <label for="puesto_id" class="form-label">Puesto</label>
    <select class="form-select" name="puesto_id" id="puesto_id">
        <option value="">Seleccione un puesto</option>
        @forelse ($puestos as $puesto)
        <option value="{{ $puesto->id }}" {{ old('puesto_id', $empleado->puesto_id ?? '') == $puesto->id ? 'selected' : '' }}>
            {{ $puesto->nombre }}
        </option>
        @empty
        <option value="" disabled>No hay puestos disponibles</option>
        @endforelse
    </select>
</div>

<button type="submit" class="btn waves-effect waves-light btn-success text-light rounded-pill">
    {{ isset($empleado) ? 'Editar' : 'Crear' }} empleado
</button>