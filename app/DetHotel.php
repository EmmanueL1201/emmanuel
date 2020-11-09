<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetHotel extends Model
{
    protected $table = 'detalle_hotel';
    protected $primaryKey = 'id_det_hotel';
    protected $fillable =['id_hotel','id_habitacion','activo'];
}
