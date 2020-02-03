<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcesoCosto extends Model
{
    //
    //
    protected $table ='proceso_costos';

    protected $guarded = [  ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proceso_id', 'costo_id', 'cantidad', 'costo','note', 'isactive', 'created_at', 'updated_at'
    ];

    public function proceso(  ) {
        return $this->belongsTo( 'App\Models\Proceso' );
    }

    public function costo(  ) {
        return $this->belongsTo( 'App\Models\Costo' );
    }
}
