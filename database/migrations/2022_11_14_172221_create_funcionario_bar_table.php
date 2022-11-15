<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_bar', function (Blueprint $table) {
            $table->id();
            $table->string('nome',30);
            $table->integer('idade');
            $table->string('funcao',10);
            $table->unsignedBigInteger('bar_id');

            $table->foreign('bar_id')->references('id')->on('bares');
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
        Schema::dropIfExists('funcionario_bars');
    }
};
