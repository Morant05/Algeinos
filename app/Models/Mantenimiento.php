<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;
     protected $fillable=[
        'tipo_id',
        'fecha',
        'costo',
        'tiempo',
        'descripcion',
        'maquina_id',
    ];
    public function maquina(){
        return $this->belongsTo(Maquina::class, 'maquina_id');
    }
    public function tmantenimiento(){
        return $this->belongsTo(tipo_mantenimiento::class, 'tipo_id');
    }
     public function scopePorMaquina($query, $maquina_id){
            if($maquina_id){
                return $query->where('maquina_id', $maquina_id);
            }
            return $query;
        }
        public function scopePorTipo($query, $tipo_id){
            if($tipo_id){
                return $query->where('tipo_id', $tipo_id);
            }
            return $query;
        }
}
