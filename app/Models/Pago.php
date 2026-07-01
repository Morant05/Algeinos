<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $fillable=[
        'renta_id',
        'monto',
        'fecha_pago',
        'monto_pago',
        'referencia',
        'estado',
        'observaciones',
    ];
    public function renta(){
        return $this->belongsTo(Renta::class, 'renta_id');
    }
     public function scopePorRenta($query, $renta_id){
            if($renta_id){
                return $query->where('renta_id', $renta_id);
            }
            return $query;
        }
        public function scopePorReferencia($query, $referencia){
            if($referencia){
                return $query->where('referencia', $referencia);
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
