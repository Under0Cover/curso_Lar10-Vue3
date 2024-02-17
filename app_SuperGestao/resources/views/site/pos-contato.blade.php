@extends('site.layouts.basico')
    @section('titulo', ' - Contato')
    @section('conteudo')
        <div class="conteudo-pagina-pos-contato">
            <div class="titulo-pagina">
                <h1>Obrigado!</h1>
                <p>Agradecemos o contato.</p>
                <p>Em menos de 48 horas retornaremos o contato.</p>
            </div>
        </div>
    {{-- Inclusão do Footer --}}
    @include('site.layouts._partials.footer')
    @endsection()
    <script>
        setTimeout(function() {
            window.location.href = '{{ url("/") }}';
        }, 10000); // 10 segundos
    </script>