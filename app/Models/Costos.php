<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costos extends Model
{
    //
    protected $table ='costos';

    protected $guarded = [  ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','note', 'isactive', 'created_at', 'updated_at'
    ];

    public function periodos(  ) {
        return $this->hasMany( 'App\Models\CostosPeriodos' );
    }

    public function proceso_costo(  ) {
        return $this->hasMany( 'App\Models\ProcesoCosto' );
    }
}
