<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesoCostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proceso_costos', function (Blueprint $table) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'proceso_id' )->unsigned(  )->index(  );
            $table->bigInteger( 'costo_id' )->unsigned(  )->index(  );
            $table->double( 'cantidad', 8, 2 )->default( 1 );            
            $table->double( 'costo', 8, 2 );            
            $table->string( 'note' )->nullable(  );
            $table->boolean( 'isactive' )->nullable( $value = false )->default( true );
            $table->boolean( 'isdeleted' )->nullable( $value = false )->default( false );
            $table->timestamps(  );
            $table->foreign( 'proceso_id' )->references( 'id' )->on( 'procesos' );
            $table->foreign( 'costo_id' )->references( 'id' )->on( 'costos' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proceso_costos');
    }
}
