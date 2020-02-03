<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    //
    protected $table ='etapas';

    protected $guarded = [  ];
    

    public function procesos(  ) {
        return $this->hasMany( 'App\Models\Proceso' );
    }
}
