<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Usuarios extends Model{
     
    	protected $table = 'usuarios';
    	protected $primaryKey = 'id';
		protected $fillable =['nombre','ap_paterno','ap_materno','correo','contrasena','activo'];
		


	}

