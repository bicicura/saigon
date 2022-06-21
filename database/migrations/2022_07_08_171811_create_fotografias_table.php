<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotografiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotografias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('casting_id');
            $table->string('img');
            $table->unsignedBigInteger('order');
            $table->timestamps();

            $table->foreign('casting_id')
            ->references('id')->on('castings')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotografias');
    }
}