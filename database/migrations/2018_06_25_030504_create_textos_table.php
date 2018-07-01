<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inicioEs',800);
            $table->string('inicioEn',800);
            $table->string('serviciosEs',800);
            $table->string('serviciosEn',800);
            $table->string('equipoEs',800);
            $table->string('equipoEn',800);
            $table->string('expEs',800);
            $table->string('expEn',800);
            $table->string('contactoEs',800);
            $table->string('contactoEn',800);
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
        Schema::dropIfExists('textos');
    }
}
