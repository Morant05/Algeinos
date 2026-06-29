<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;

    protected $table = 'maquinas';

     protected $fillable = [
        'nombre',
        'marca',
        'modelo',
        'serie',
        'estado',
        'categoria_id',
    ];
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function scopePorNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombre', 'like', "%$nombre%");
        }
        return $query;
    }
        public function scopePorCategoria($query, $categoria_id)
    {
        if ($categoria_id) {
            return $query->where('categoria_id', $categoria_id);
        }
        return $query;
    }
        public function maquinas()
    {
        return $this->belongsToMany(Maquina::class, 'rentas_maquinaria')
                    ->withPivot('precio', 'maquina_id', 'renta_id')
                    ->withTimestamps();
    }
}
