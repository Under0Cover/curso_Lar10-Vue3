<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        // Array simulando as informações do banco
        $motivo_contato = [
            '1' =>  'Dúvidas',
            '2' =>  'Elogio',
            '3' =>  'Reclamação'
        ];

        return view('site.principal', [
            'motivo_contato'    =>  $motivo_contato
        ]);
    }
}
