<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lote_UnidadProductiva extends Model
{
    //
    protected $table ='lote_unidad_productivas';

    protected $guarded = [  ];
    //
    public function lote(  ) {
        return $this->belongsTo( 'App\Models\Lote' );
    }
    //
    public function sector(  ) {
        return $this->belongsTo( 'App\Models\Sector' );
    }
}
