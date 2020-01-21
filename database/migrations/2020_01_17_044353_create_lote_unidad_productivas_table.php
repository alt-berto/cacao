<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoteUnidadProductivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote_unidad_productivas', function (Blueprint $table) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'lote_id' )->unsigned(  )->index(  );
            $table->bigInteger( 'sector_id' )->unsigned(  )->index(  );
            $table->string( 'note' )->nullable(  );
            $table->boolean( 'isactive' )->nullable( $value = false )->default( true );
            $table->timestamps(  );
            $table->foreign( 'lote_id' )->references( 'id' )->on( 'lotes' );
            $table->foreign( 'sector_id' )->references( 'id' )->on( 'sectores' );
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
        Schema::dropIfExists('lote_unidad_productivas');
        Schema::enableForeignKeyConstraints();
    }
}
