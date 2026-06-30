<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Obra;
use App\Models\Empleado;

class Reporte extends Model
{
    use HasFactory;
   
    protected $table = 'reportes';

    protected $fillable = [
        'obra_id',
        'empleado_id',
        'tipo',
        'contenido',
        'fecha',
    ];

    public function obra()
    {
        return $this->belongsTo(Obra::class, 'obra_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}