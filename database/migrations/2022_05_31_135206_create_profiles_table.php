<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->string('celular');
            $table->string('dni');
            $table->string('nacionalidad');
            $table->string('cuit')->nullable();;
            $table->string('sexo');
            $table->date('date_of_birth');
            $table->unsignedInteger('altura');
            $table->string('remera');
            $table->string('pantalon');
            $table->string('calzado');
            $table->string('skills');
            $table->string('link');
            $table->timestamps();
            $table->text('cara');
            $table->text('cuerpo');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}