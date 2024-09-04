<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedoresController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site',     'like', '%'.$request->input('site').'%')
        ->where('uf',       'like', '%'.$request->input('uf').'%')
        ->where('email',    'like', '%'.$request->input('email').'%')
        ->get();

        return view('app.fornecedor.listar', ['fornecedores'    =>  $fornecedores]);
    }

    public function adicionar(Request $request){
        if($request->input('_token')){
            try{
                $regras = [
                    'nome'  => 'required|min:3|max:40',
                    'site'  => 'required',
                    'uf'    => 'required|max:2|min:2',
                    'email' => 'email'
                ];

                $feedback = [
                    'required'  =>  'O campo ' .strtoupper(':attribute'). ' deve ser preenchido',
                    'nome.min'  =>  'O campo NOME deve ter no mínomo 3 caracteres',
                    'nome.max'  =>  'O campo NOME deve ter no máximo 40 caracteres',
                    'uf.min'    =>  'O campo UF deve ter no mínimo 2 caracteres',
                    'uf.max'    =>  'O campo UF deve ter no máximo 2 caracteres',
                    'email'     =>  'O campo EMAIL não foi preenchido corretamente'
                ];

                $request->validate($regras, $feedback);

                $fornecedor = new Fornecedor();
                $fornecedor->create($request->all());
                $msg= 'Informação salva com sucesso!';
            }catch (Exception $e){
                $msg = 'Algo deu errado: ' .$e->getMessage();
            }
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
