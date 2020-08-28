<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('marcas', function(Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->timestamps();
        });

        Schema::create('pais', function(Blueprint $table) {
            $table->id();
            $table->string('pais');
            $table->timestamps();
        });

        Schema::create('carrocerias', function(Blueprint $table) {
            $table->id();
            $table->string('carroceria');
            $table->timestamps();
        });

        Schema::create('combustibles', function(Blueprint $table) {
            $table->id();
            $table->string('combustible');
            $table->timestamps();
        });

        Schema::create('imagens', function(Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->timestamps();
        });

        Schema::create('tags', function(Blueprint $table) {
            $table->id();
            $table->string('etiqueta');
            $table->timestamps();
        });

        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->unsignedBigInteger('carroceria_id');
            $table->foreign('carroceria_id')->references('id')->on('carrocerias');
            $table->unsignedBigInteger('combustible_id');
            $table->foreign('combustible_id')->references('id')->on('combustibles');
            $table->unsignedBigInteger('imagen_id');
            $table->foreign('imagen_id')->references('id')->on('imagens');
            $table->timestamps();
        });
        
         Schema::create('tag_vehiculo', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->unsignedBigInteger('vehiculo_id');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('vehiculos');
        Schema::dropIfExists('imagen');
        Schema::dropIfExists('combustible');
        Schema::dropIfExists('carroceria');
        Schema::dropIfExists('pais');
        Schema::dropIfExists('marca');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('tag_vehiculo');
    }

}
