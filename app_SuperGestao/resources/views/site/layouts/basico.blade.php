<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão{{-- Título --}} @yield('titulo') {{-- Fim do Título --}}</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}" />
    </head>

    <body>
        {{-- Header --}}
        <div class="topo">

            <div class="logo">
                <img src="{{ asset('img/logo.png') }}">
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('site.index') }}">Principal</a></li>
                    <li><a href="{{ route('site.sobrenos') }}">Sobre Nós</a></li>
                    <li><a href="{{ route('site.contato') }}">Contato</a></li>
                </ul>
            </div>
        </div>
        {{-- Fim do Header --}}


        {{-- Conteúdo --}}
        @yield('conteudo')
        {{-- Fim do Conteúdo --}}

    </body>
</html>