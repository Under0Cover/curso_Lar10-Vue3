<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo 'store';
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        echo 'edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        echo 'update';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        echo 'destroy';
    }
}
