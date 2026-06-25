<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
        protected $fillable=[
        'nombre',
        'descripcion',
    ];
    public function categorias(){
        return $this->hasMany(categoria::class);
    }
    public function scopePorNombre($query, $nombre){
        if($nombre){
            return $query->where('nombre','like',"%$nombre%");
        }
        return $query;
    }
}
