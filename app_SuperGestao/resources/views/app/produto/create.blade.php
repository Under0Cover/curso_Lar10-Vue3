@extends('app.layouts.basico')
    @section('titulo', ' - Produtos')
    @section('conteudo')
        <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <p>Adicionar Produto</p>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                    <li><a href="">Consulta</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <form action="" method="post">
                        @csrf
                        <input type="text" value="" class="borda-preta" name="nome" id="nome" placeholder="Nome">
                        <input type="text" value="" class="borda-preta" name="descricao" id="descricao" placeholder="Descrição">
                        <input type="text" value="" class="borda-preta" name="peso" id="peso" placeholder="Peso">
                        <select name="unidade_id">
                            <option>-- Selecione a Unidade de Medida --</option>
                            @foreach($unidades as $unidade)
                                <option value="{{ $unidade->id }}"> {{ $unidade->descricao }} </option>
                            @endforeach
                        </select>
                        <button type="submit" class="borda-preta">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection