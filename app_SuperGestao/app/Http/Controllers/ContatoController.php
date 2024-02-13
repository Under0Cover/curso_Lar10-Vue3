<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(){
        return view('site.contato');
    }

    public function salvar(Request $request){

        $contato = new SiteContato();        
        $request->validate = ([
            'nome'              =>  'required|min:5|max:40',
            'telefone'          =>  'required|min:11|max:15',
            'email'             =>  'required',
            'motivo_contato'    =>  'required|max:2000'
        ]);

        /*
            O Framework possibilita uma solução muito mais simples neste exemplo.
            Basta utilizar duas funções do Framework
            $contato->fill($request->all());
                O 'fill' preenche os atributos do objeto com um array associativo
                Array associativo, $request->all()
                E o 'all' que retorna todos os parâmetros do formulário e nos devolve um array associativo.
                /-------------------------------------------------------------------------------------------/
                Para ter essa possibilidade é necessário declarar o fillable com o array na declaração da classe.
                Sim, o projeto está preparado para isso.
            
            /------------------------------------------------------------------------------------------------------/
            Resta nos lembrar que não é aconselhável passar informações recebidas por input sem tratamento!!
            Vale a leitura: https://pt.wikipedia.org/wiki/Cross-site_scripting

            MELHOR PREVINIR DO QUE REMEDIAR
            /------------------------------------------------------------------------------------------------------/
            O metódo create() é uma outra alternativa para associar o array vindo do formulário
            $contato->create($request->all());
        */

        // $contato->save();

    }

    /*
        A função 'salvar()' pode ser muito simplificada utilizando uma sintaxe do Framework bem facilitadora:

            public function salvar(Request $request){
                SiteContato::create($request->all());
            }
        
        Aqui vale lembrar a necessidade de garantir que todos os campos estejam preenchidos conforme instruções do banco.
        Se o banco não tiver o dado da forma que ele espera, o Framework vai explodir um erro de \QueryException
    */
}
