<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamePlataformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_plataform', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            
            //plataforms
            $table->unsignedBigInteger('plataform_id');
            $table->foreign('plataform_id')->references('id')->on('plataforms');

            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games');

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
        Schema::dropIfExists('game_plataform');
    }
}
