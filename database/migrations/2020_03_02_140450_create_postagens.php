<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postagens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('titulo');
            $table->text('imagem');
            $table->longtext('conteudo');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('autor_id');
            $table->timestamps();
        });
    }
    // autor, imagem de identificação, título, conteúdo, data de publicação, categorias

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postagens');
    }
}
