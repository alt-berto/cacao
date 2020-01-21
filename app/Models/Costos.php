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
}
