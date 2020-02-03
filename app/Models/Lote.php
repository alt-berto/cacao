<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    //
    protected $table ='lotes';

    protected $guarded = [  ];
  
	public function lote_unidadproductivas(  ) {
		return $this->hasMany( 'App\Models\Lote_UnidadProductiva' )->where( 'isdeleted', false );
    }
    
    public function procesos(  ) {
		return $this->hasMany( 'App\Models\Proceso' )->where( 'isdeleted', false );
	}
}
