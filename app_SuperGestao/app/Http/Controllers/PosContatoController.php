<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosContatoController extends Controller
{
    public function posContato(){
        return view('site.pos-contato');
    }
}
