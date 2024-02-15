<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
    Essa migration foi criada com o objetivo de implementar uma chave estrangeira à tabela site_contatos
    Tabela que fica armazenada os contatos feitos atráves do site.
    Antes não era necessário uma chave estrangeira, pois não existia a tabela motivo_contato
    Agora, precisamos associar essas duas tabelas, com chave estrangeira
    Com o objetivo de criar um relacionamento entre as tabelas.
    Como as melhores práticas de programação sugerem, é uma boa prática manter os dados relacionados.
    Banco de dados relacional = relacionamento dos dados 
*/

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Pra isso vamos alterar a tabela criando um campo novo
        Schema::table('site_contatos', function (Blueprint $table){
            $table->unsignedBigInteger('motivo_contato_id');  
        });

        // Vamos migrar os dados que existem no campo motivo_contato
        DB::statement('update site_contatos set motivo_contato_id = motivo_contato');

        // Criando a chave estrangeira
        Schema::table('site_contatos', function (Blueprint $table){
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contato');
            // Removendo a coluna motivo_contato da tabela site_contato
            $table->dropColumn('motivo_contato');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // O método down TEM que desfazer o que o método up fez
        // Criando a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table){
            $table->integerr('motivo_contato');
            // Removendo a Foreign
            $table->dropForeign('site_contato_motivo_contato_id_foreign');
        });

        // Vamos migrar os dados que existem no campo motivo_contato_id
        DB::statement('update site_contatos set motivo_contato = motivo_contato_id');

        // Removendo a coluna motivo_contato_id
        Schema::table('site_contatos', function (Blueprint $table){
            $table->dropColumn('motivo_contato_idd');
        });
    }
};
