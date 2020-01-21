<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->bigIncrements( 'id' );
            $table->string( 'consecutive' );
            $table->string( 'name' )->nullable(  );
            $table->date( 'date' );
            $table->string( 'note' )->nullable(  );
            $table->enum( 'status', ['process', 'finished', 'defective' ] )->nullable( $value = false )->default( 'process' );
            $table->boolean( 'isactive' )->nullable( $value = false )->default( true );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lotes');
    }
}
