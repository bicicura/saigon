<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('castings', function (Blueprint $table) {
            $table->id();
            $table->string('seccion');
            $table->string('nombre');
            $table->string('slug')->nullable();
            $table->string('productora')->nullable();
            $table->unsignedBigInteger('productora_id')->nullable();
            $table->string('director')->nullable();
            $table->string('categoria')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('video_provider')->nullable();
            $table->integer('orden')->nullable();
            $table->string('url')->nullable();
            $table->tinyInteger('sticky')->nullable();
            $table->tinyInteger('reel')->default(0);
            $table->string('reel_video')->nullable();
            $table->timestamps();
            
            $table->foreign('productora_id')->references('id')->on('productoras')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('castings');
    }
}
