<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;
        protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'latitud',
        'longitud',
        'presupuesto',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];
    public function obras(){
        return $this->hasMany(Obras::class);
    }
public function scopePorNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombre', 'like', "%$nombre%");
        }
        return $query;
    }
}
