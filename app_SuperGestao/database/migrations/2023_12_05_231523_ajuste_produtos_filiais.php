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
        // Criando tabela filiais
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        // Criando tabela produto_filiais
        /**
         * Repare que os campos 'preco_venda', 'estoque_minimo' e 'estoque_maximo'
         * pertencem a tabela produtos, por tanto, termos que remover esses campos
        */
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->float('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);

            // FKs
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        // Removendo os campos 'preco_venda', 'estoque_minimo' e 'estoque_maximo' da tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn('preco_venda');
            $table->dropColumn('estoque_minimo');
            $table->dropColumn('estoque_maximo');
            // Sim! Eu poderia passar um array. Foi uma escolha pra ficar visualmente mais organizado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Devolvendo as colunas 'preco_venda', 'estoque_minimo' e 'estoque_maximo' para a tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->float('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
        });

        // Removendo a tabela produto_filiais
        Schema::dropIfExists('produto_filiais');

        // Removendo a tabela filiais
        Schema::dropIfExists('filiais');
    }
};
