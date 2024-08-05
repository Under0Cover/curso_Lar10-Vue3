<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = $request->get('erro');

        if($erro == 1){
            $erro = 'Usuário ou senha inexistentes!';
        }
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'É necessário informar um e-mail!',
            'senha.required' => 'É necessário informar uma senha!'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if($usuario){
            echo 'Usuário existente!';
        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }
}
