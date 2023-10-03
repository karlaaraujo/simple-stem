<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('artigo', function (Blueprint $table) {
            $table->id('id_artigo');
            $table->integer('fk_categoria');
            $table->integer('fk_autor');
            $table->integer('fk_nivel_habilidade');
            $table->string('titulo');
            $table->longText('conteudo');
            $table->string('descricao');
            $table->timestamp('dt_criacao')->nullable();
            $table->timestamp('dt_ultima_atualizacao')->nullable();
            $table->integer('tempo_leitura_segundos')->nullable();
            $table->integer('artigo_pre_requisito')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artigo');
    }
};
