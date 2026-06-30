<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    use HasFactory;
    protected $table = 'evidencias';

    protected $fillable = [
        'empresa_id',
        'empleado_id',
        'nombre',
        'incidencia_id',
        'tipo',
        'ruta',
        'tamaño',
    ];

    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class, 'incidencia_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}