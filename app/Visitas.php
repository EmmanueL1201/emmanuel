<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitas extends Model
{
    protected $table = 'visitas';
    	protected $primaryKey = 'id_visita';
		protected $fillable =['id_hotel','id_usuario','numero_visita','activo'];
		
}
