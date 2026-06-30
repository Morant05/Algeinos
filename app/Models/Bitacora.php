<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'obra_id',
        'empleado_id',
        'fecha',
        'actividades',
        'comentarios',
    ];

    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}

