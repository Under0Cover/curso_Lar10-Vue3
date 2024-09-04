@extends('app.layouts.basico')
    @section('titulo', ' - Fornecedor')
    @section('conteudo')
        <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <p>Fornecedor - Adicionar</p>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                    <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                {{ isset($msg) ? $msg : '' }}
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                        @csrf
                        <input type="text" value="{{ old('nome') }}" class="borda-preta" name="nome" id="nome" placeholder="Nome">
                        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                        <input type="text" value="{{ old('site') }}" class="borda-preta" name="site" id="site" placeholder="Site">
                        {{ $errors->has('site') ? $errors->first('site') : '' }}
                        <input type="text" value="{{ old('uf') }}" class="borda-preta" name="uf" id="uf" placeholder="UF">
                        {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                        <input type="text" value="{{ old('email') }}" class="borda-preta" name="email" id="email" placeholder="E-mail">
                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                        <button type="submit" value="{{ old('') }}" class="borda-preta">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection