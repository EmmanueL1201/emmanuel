<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoteles extends Model
{
    protected $table = 'Hoteles';
    	protected $primaryKey = 'id_hotel';
		protected $fillable =['nombre','activo'];
		
}
