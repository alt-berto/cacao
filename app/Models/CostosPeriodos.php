<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostosPeriodos extends Model
{
    //
    protected $table ='costos_periodos';

    protected $guarded = [  ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'costo_id', 'fecha_inicio', 'fecha_fin', 'amount', 'note', 'isactive', 'created_at', 'updated_at'
    ];

    public function costo(  ) {
        return $this->belongsTo( 'App\Models\Costo' );
    }
}
