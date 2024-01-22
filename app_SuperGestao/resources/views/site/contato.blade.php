@extends('site.layouts.basico')
    @section('titulo', ' - Contato')
    @section('conteudo')
        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Entre em contato conosco</h1>
            </div>

            <div class="informacao-pagina">
                <div class="contato-principal">
                    {{-- Início do Formulário --}}
                    @component('site.layouts._components.form_contato', [
                        'classe_borda' => 'borda-preta'])
                    @endcomponent()
                    {{-- Fim do Formulário --}}
                </div>
            </div>  
        </div>
    {{-- Inclusão do Footer --}}
    @include('site.layouts._partials.footer')
    @endsection()