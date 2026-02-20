<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use SoftDeletes;

    protected $fillable = [

    'marca',
    'modelo',
    'anio',
    'precio_dia',
    'descripcion',
    'imagen',
    'estado',
    'tipo',
    'transmision',
    'pasajeros',
    'aire_acondicionado'

];

}