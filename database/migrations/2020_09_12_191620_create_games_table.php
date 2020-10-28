<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->string('serie');
            $table->string('gender');

            $table->string('plataform');
            $table->string('developer');
            $table->string('publisher');

            $table->string('director');
            $table->string('productor');
            $table->date('release_date');

            $table->string('admin_verification');
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
        Schema::dropIfExists('games');
    }
}
