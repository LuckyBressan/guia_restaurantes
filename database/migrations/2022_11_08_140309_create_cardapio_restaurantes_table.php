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
        Schema::create('cardapio_restaurantes', function (Blueprint $table) {
            $table->id();
            $table->text('nome',50);
            $table->text('descricao',100);
            $table->decimal('valor',10,2);
            $table->unsignedBigInteger('restaurante_id');

            $table->foreign('restaurante_id')->references('id')->on('restaurantes');
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
        Schema::dropIfExists('cardapio_restaurantes');
    }
};
