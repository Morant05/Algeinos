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
        'puesto_id',
    ];
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }

}
