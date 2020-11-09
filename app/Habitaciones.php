<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitaciones extends Model
{
    protected $table = 'Habitaciones';
    protected $primaryKey = 'id_habitacion';
    protected $fillable =['tipo','activo'];
}
