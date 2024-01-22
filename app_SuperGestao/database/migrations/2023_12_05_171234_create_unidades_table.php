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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        /**
         * Como o relacionamento abaixo é 1:N não é utilizado a especificação unique,
         * como na tabela produto_detalhes;
         * $table->unique('produto_id');
        */

        // Adicionar o relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // Adicionar o relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /**
         * Como foram criadas chaves estrangeiras no método up,
         * é necessário remover essas chaves ANTES de excluir a tabela
        */

        // Removendo relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            // Removendo FK
            $table->dropForeign('produtos_unidade_id_foreign'); // Nome da FK = [tabela]_[coluna]_foreign
            // Removendo a coluna
            $table->dropColumn('unidade_id');
        });

        // Removendo relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table){
            // Removendo FK
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); // Nome da FK = [tabela]_[coluna]_foreign
            // Removendo a coluna
            $table->dropColumn('unidade_id');
        });

        // Removendo a tabela unidades
        Schema::dropIfExists('unidades');
    }
};