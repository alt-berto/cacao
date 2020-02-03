<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'lote_id' )->unsigned(  )->index(  );
            $table->bigInteger( 'etapa_id' )->unsigned(  )->index(  );
            $table->date( 'fecha_entrada' );
            $table->date( 'fecha_salida' );
            $table->double( 'entrada_amount', 8, 2 );
            $table->double( 'salida_amount', 8, 2 );            
            $table->string( 'note' )->nullable(  );
            $table->boolean( 'isactive' )->nullable( $value = false )->default( true );
            $table->boolean( 'isdeleted' )->nullable( $value = false )->default( false );
            $table->timestamps(  );
            $table->foreign( 'lote_id' )->references( 'id' )->on( 'lotes' );
            $table->foreign( 'etapa_id' )->references( 'id' )->on( 'etapas' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procesos');
    }
}
