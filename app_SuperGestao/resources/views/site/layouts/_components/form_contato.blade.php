{{--
    // Informações do Formulário:
    --  Proteção Cross-site
    --  Variável $slot para cabeçalhos personalizados e informações gerais
    --  Variável $classe_borda para personalizar a cor da borda do Formulário
--}}


{{ $slot }} {{-- Variável do Componente --}}
<form action={{ route('site.contato')}} method="POST">
    @csrf {{-- Validação de Formulário --}}
    <input type="text" name="nome" placeholder="Nome" class="{{ $classe_borda }}">
        <br>
    <input type="text" name="telefone" placeholder="Telefone" class="{{ $classe_borda }}">
        <br>
    <input type="text" name="email" placeholder="E-mail" class="{{ $classe_borda }}">
        <br>
    <select name="motivo_contato" class="{{ $classe_borda }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
        <br>
    <textarea name="mensagem" class="{{ $classe_borda }}">Preencha aqui a sua mensagem</textarea>
        <br>
    <button type="submit" class="{{ $classe_borda }}">ENVIAR</button>
</form>

<div style="top: 0; left: 0; position: absolute; background-color:black; color:white">
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>