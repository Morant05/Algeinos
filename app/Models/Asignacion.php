<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;
        protected $fillable=[
        'fecha_inicio',
        'fecha_fin',
        'maquina_id',
        'obra_id',
        'empleado_id',

    ];
    public function maquina(){
        return $this->belongsTo(Maquina::class, 'maquina_id');
    }
    public function obra(){
        return $this->belongsTo(Obra::class, 'obra_id');
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
     public function scopePorMaquina($query, $maquina_id){
            if($maquina_id){
                return $query->where('maquina_id', $maquina_id);
            }
            return $query;
        }
        public function scopePorObra($query, $obra_id){
            if($obra_id){
                return $query->where('obra_id', $obra_id);
            }
            return $query;
        }
}
