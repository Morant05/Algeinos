<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Laravel\Passport\HasApiTokens;
class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles, AuthenticationLoggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'notificaciones',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Obtener el Nombre Completo
     *
     * @return Attribute
     */
    protected function nombreCompleto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => rtrim($this->nombre . ' ' . $this->apellidos),
        );
    }

    /**
     * Filtros de sector
     * Buscador
     *
     * @param \Illuminate\Database\Eloquent\Builder  $consulta
     * @param string|null $busqueda
     * @return void
     */
    public function scopeBusqueda(Builder $consulta, ?string $busqueda): void
    {
        if ($busqueda) {
            $consulta->where('nombre', 'LIKE', "%$busqueda%")
                ->orWhere('email', 'LIKE', "%$busqueda%");
        }
    }
}
