<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(){

        $motivo_contato = MotivoContato::all();

        return view('site.contato', [
            'motivo_contato'    => $motivo_contato
        ]);
    }

    public function salvar(Request $request){
        // array de campos do formulário
        $regras = [
            'nome'              =>  'required|min:5|max:40',
            'telefone'          =>  'required|min:11|max:15',
            'email'             =>  'email|unique:site_contatos',
            'motivo_contato_id' =>  'required',
            'mensagem'          =>  'required|max:2000'
        ];

        // array com mensagens de erros traduzidas e customizadas
        $mensagemErros = [
            'nome.required'                 =>  'O "NOME" deve ser preenchido!',
            'nome.min'                      =>  '"NOME" deve ter no mínimo 5 caracteres!',
            'nome.max'                      =>  '"NOME" não deve ter mais de 40 caracteres',
            'telefone.required'             =>  'Um número de telefone deve ser informado',
            'telefone.min'                  =>  'Seu número de telefone deve ter no mínimo 11 números',
            'telefone.max'                  =>  'Seu número de telefone não pode ter mais de 15 números',
            'email.email'                   =>  'Um e-mail válido deve ser informado',
            'email.unique'                  =>  'Já existe um contato com este e-mail',
            'motivo_contato_id.required'    =>  'Por favor, indique o motivo do seu contato',
            'mensagem.required'             =>  'Por favor, insira a sua mensagem',
            'mensagem.max'                  =>  'Sua mensagem não deve possuir mais de 2 mil caracteres.',
            'required'                      =>  'O campo :attribute deve ser preenchido',
            'email'                         =>  'Informe um e-mail válido'
        ];
        /*
            Vou utilizar a validação unique no campo e-mail
            apenas com o objetivo de registrar o seu funcionamento,
            e claro, passando essa validação, temos que informar em qual tabela do banco será feita a consulta
            Visto que, neste nosso exemplo, um usuário poderia facilmente enviar mais de um contato 
        */
        $request->validate($regras, $mensagemErros);

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

        SiteContato::create($request->all());
        return redirect()->route('site.pos-contato');

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
