<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $table = 'incidencias';
    protected $fillable = [
        'usuario_id',
        'obra_id',
        'tipo',
        'prioridad',
        'estado',
        'fecha',
    ];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    public function obra()
    {
        return $this->belongsTo(Obra::class, 'obra_id');
    }
}
