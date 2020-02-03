<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    //
    protected $table ='procesos';

    protected $guarded = [  ];

    //
    public function etapa(  ) {
        return $this->belongsTo( 'App\Models\Etapa' );
    }

    public function lote(  ) {
        return $this->belongsTo( 'App\Models\Lote' );
    }

    public function costos(  ) {
        return $this->hasMany( 'App\Models\ProcesoCosto' );
    }
}
