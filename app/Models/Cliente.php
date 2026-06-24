<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'direccion',
        'empresa_id',
    ];
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
