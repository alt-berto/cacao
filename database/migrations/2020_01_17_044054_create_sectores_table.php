<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectores', function (Blueprint $table) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'unidad_productiva_id' )->unsigned(  )->index(  );
            $table->string( 'name' );
            $table->string( 'address' )->nullable(  );
            $table->string( 'lat' )->nullable(  );
            $table->string( 'long' )->nullable(  );
            $table->string( 'note' )->nullable(  );
            $table->boolean( 'isactive' )->nullable( $value = false )->default( true );
            $table->timestamps(  );
            $table->foreign( 'unidad_productiva_id' )->references( 'id' )->on( 'unidad_productivas' );
        });
        Schema::enableForeignKeyConstraints();
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('sectores');
        Schema::enableForeignKeyConstraints();
    }
}
