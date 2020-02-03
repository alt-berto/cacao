<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostosPeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costos_periodos', function (Blueprint $table) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'costo_id' )->unsigned(  )->index(  );            
            $table->date( 'fecha_inicio' );
            $table->date( 'fecha_fin' );
            $table->double( 'amount', 8, 2 );
            $table->string( 'note' )->nullable(  );
            $table->boolean( 'isactive' )->nullable( $value = false )->default( true );
            $table->boolean( 'isdeleted' )->nullable( $value = false )->default( false );
            $table->timestamps(  );
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
        Schema::dropIfExists('costos_periodos');
    }
}
