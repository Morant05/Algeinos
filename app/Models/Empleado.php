<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'apellido',
        'telefono',
        'email',
        'estado',
        'empresa_id',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'email', 'email');
    }

    public function getRolNameAttribute(): string
    {
        $rol = optional($this->usuario)->roles->first();

        return $rol?->name ?? 'Sin rol';
    }
}
