<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contato = new SiteContato();
        $contato->nome = 'José Seeder Silva';
        $contato->telefone = '55 98855 5588';
        $contato->email = 'joseseedersilva@seeder.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Mensagem de teste, dados enviados pelo Seeder.';
        $contato->save();
    }

    /*
        * Como não foi declarado a variável fillable na declaração da Classe SiteContatos, 
            neste momento não podemos utilizar o método create(), 
            como está no Seeder do Fornecedor.
        * Para que seja utilizado o create é necessário declarar a variável fillable.
        * Exemplos para isso, os arquivos do Fornecedor.
    */
}
