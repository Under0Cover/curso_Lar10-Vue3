<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão{{-- Título --}} @yield('titulo') {{-- Fim do Título --}}</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}" />
    </head>

    <body>
        {{-- Header --}}
        @include('app.layouts._partials.topo');
        {{-- Fim do Header --}}


        {{-- Conteúdo --}}
        @yield('conteudo')
        {{-- Fim do Conteúdo --}}

    </body>
</html>