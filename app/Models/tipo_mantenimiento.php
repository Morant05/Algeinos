<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_mantenimiento extends Model
{
    use HasFactory;
        protected $fillable = [
        'nombre',
        'descripcion',
    ];
    public function mantenimientos(){
        return $this->hasMany(Mantenimiento::class);
    }
public function scopePorNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombre', 'like', "%$nombre%");
        }
        return $query;
    }
}

