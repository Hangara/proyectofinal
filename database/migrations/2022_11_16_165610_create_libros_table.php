<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string("Nombre");
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string("Autor");
            $table->string("Editorial");
            $table->string("Categoria");
            $table->string("Isbn");
            $table->string("Paginas");
            $table->string("Encuadernacion");
            $table->string("Tipo");
            $table->string("Foto");
            
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
        Schema::dropIfExists('libros');
    }
}
