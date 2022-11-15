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
        Schema::create('cardapio_bares', function (Blueprint $table) {
            $table->id();
            $table->string('nome',30);
            $table->text('descricao');
            $table->decimal('valor',10,2);
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
        Schema::dropIfExists('cardapio_bares');
    }
};
