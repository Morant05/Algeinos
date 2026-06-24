<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'RFC',
        'email',
    ];
    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
    public function sucursales()
    {
        return $this->hasMany(Sucursal::class);
    }
}
