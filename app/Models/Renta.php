<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    use HasFactory;
         protected $fillable=[
        'fecha_inicio',
        'fecha_fin',
        'hora_inicio',
        'hora_fin',
        'total',
        'empresa_id',
        'usuario_id',
        'extra',
        'estado',
    ];
    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
     public function scopePorEmpresa($query, $empresa_id){
            if($empresa_id){
                return $query->where('empresa_id', $empresa_id);
            }
            return $query;
        }
        public function scopePorUsuario($query, $usuario_id){
            if($usuario_id){
                return $query->where('usuario_id', $usuario_id);
            }
            return $query;
        }
    public function rentas()
    {
        return $this->belongsToMany(Renta::class, 'rentas_maquinaria')
                    ->withPivot('precio', 'maquina_id', 'renta_id')
                    ->withTimestamps();
    }
}
