<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadProductiva extends Model
{
    //
    protected $table ='unidad_productivas';

    protected $guarded = [  ];
  
	public function sectores(  ) {
		return $this->hasMany( 'App\Models\Sector' );
	}
}
