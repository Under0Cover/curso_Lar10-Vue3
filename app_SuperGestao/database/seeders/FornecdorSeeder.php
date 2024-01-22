<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FornecdorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor Seeder';
        $fornecedor->uf = 'MG';
        $fornecedor->email = 'fornecedor.seeder@seeder.com';
        $fornecedor->site = 'fornecedor.seeder.com';
        $fornecedor->save();

        
        /*
            Uma segunda forma de popular o banco é utilizando o método estático create.
            Entretanto, é necessário que na declaração da classe, esteja declarado o fillable com os campos que poderão ser preenchidos.

            /--------------------------------------------------------------------------------------------------------------------------/
        
        Fornecedor::create([
            'nome'      =>  'Fornecedor Create',
            'uf'        =>  'SP',
            'email'     =>  'fornecedor.create@create.com',
            'site'      =>  'fornecedor.create.com'
        ]);

            /--------------------------------------------------------------------------------------------------------------------------/

            Existe uma terceira opção de popular o banco de dados, e nesse caso é utilizando o objeto DB
        
        DB::table('fornecedores')->insert([
            'nome'      =>  'Fornecedor Insert DB',
            'uf'        =>  'RJ',
            'email'     =>  'fornecedor.insertDB@insert.com',
            'site'      =>  'fornecedor.insertDB.com'
        ]);

        */
    }
}
