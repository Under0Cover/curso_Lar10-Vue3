@extends('app.layouts.basico')
    @section('titulo', ' - Produtos')
    @section('conteudo')
        <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <p>Listagem de Produtos</p>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="">Novo</a></li>
                    <li><a href="">Consulta</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Peso</th>
                                <th>Unidade ID</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->descricao }}</td>
                                    <td>{{ $produto->peso }}</td>
                                    <td>{{ $produto->unidade_id }}</td>
                                    <td><a href="" class="link-excluir">Excluir</a></td>
                                    <td><a href="" class="link-atualizar">Atualizar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $produtos->appends($request)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    @endsection