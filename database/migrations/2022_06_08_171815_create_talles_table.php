<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inc');
            $table->string('nombre');
            $table->string('tipo');
            $table->unsignedBigInteger('val');
            $table->unsignedBigInteger('valid')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talles');
    }
}