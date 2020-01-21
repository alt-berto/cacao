<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    //
    protected $table ='sectores';

    protected $guarded = [  ];
    //
    public function unidadproductiva(  ) {
        return $this->belongsTo( 'App\Models\UnidadProductiva' );
    }
  
	public function lote_unidadproductivas(  ) {
		return $this->hasMany( 'App\Models\Lote_UnidadProductiva' );
	}
}
