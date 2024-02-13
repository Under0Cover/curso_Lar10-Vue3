{{--
    // Informações do Formulário:
    --  Proteção Cross-site
    --  Variável $slot para cabeçalhos personalizados e informações gerais
    --  Variável $classe_borda para personalizar a cor da borda do Formulário
--}}


{{ $slot }} {{-- Variável do Componente --}}
<form action={{ route('site.contato')}} method="POST">
    @csrf {{-- Validação de Formulário --}}
    <input type="text" name="nome" placeholder="Nome" class="{{ $classe_borda }}" value="{{ old('nome') }}">
        <br>
    <input type="text" name="telefone" placeholder="Telefone" class="{{ $classe_borda }}" value="{{ old('telefone') }}">
        <br>
    <input type="text" name="email" placeholder="E-mail" class="{{ $classe_borda }}" value="{{ old('email') }}">
        <br>
    <select name="motivo_contato" class="{{ $classe_borda }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contato as $key => $motivo)
            <option value="{{ $key }}" {{ old('motivo_contato') == $key ? 'selected' : null }}>{{ $motivo }}</option>
        @endforeach
    </select>
        <br>
    <textarea name="mensagem" placeholder="Preencha aqui a sua mensagem" class="{{ $classe_borda }}">
        @if( old('mensagem') != '')
            {{ old('mensagem') }}
        @endif
    </textarea>
        <br>
    <button type="submit" class="{{ $classe_borda }}">ENVIAR</button>
</form>