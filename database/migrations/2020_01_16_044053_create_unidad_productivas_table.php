<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadProductivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_productivas', function (Blueprint $table) {
            $table->bigIncrements( 'id' );
            $table->string( 'name' );
            $table->string( 'address' )->nullable(  );
            $table->string( 'lat' )->nullable(  );
            $table->string( 'long' )->nullable(  );
            $table->string( 'note' )->nullable(  );
            $table->boolean( 'isactive' )->nullable( $value = false )->default( true );
            $table->boolean( 'isdeleted' )->nullable( $value = false )->default( false );
            $table->timestamps(  );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad_productivas');
    }
}
