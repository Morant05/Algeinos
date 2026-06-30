<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    use HasFactory;


    public function rentas()
    {
        return $this->belongsToMany(Renta::class, 'rentas_maquinaria')
                    ->withPivot('precio', 'maquina_id', 'renta_id')
                    ->withTimestamps();
    }

}
