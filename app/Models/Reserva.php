<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    // campos que se pueden guardar
    protected $fillable = [
        'vehiculo_id',
        'user_id', // importante para relacionar con el cliente
        'fecha_inicio',
        'fecha_fin',
        'total',
        'estado'
    ];

    // relacion con vehiculo
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    // relacion con usuario (cliente)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
