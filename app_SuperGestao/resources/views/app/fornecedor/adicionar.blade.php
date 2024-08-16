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
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <form action="" method="post">
                        <input type="text" class="borda-preta" name="nome" id="nome" placeholder="Nome">
                        <input type="text" class="borda-preta" name="site" id="site" placeholder="Site">
                        <input type="text" class="borda-preta" name="uf" id="uf" placeholder="UF">
                        <input type="text" class="borda-preta" name="email" id="email" placeholder="E-mail">
                        <button type="submit" class="borda-preta">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection