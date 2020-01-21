<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadProductiva extends Model
{
    //
    protected $table ='unidad_productivas';

    protected $guarded = [  ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'lat', 'long', 'note', 'isactive', 'created_at', 'updated_at'
    ];
  
	public function sectores(  ) {
		return $this->hasMany( 'App\Models\Sector' );
	}
}
