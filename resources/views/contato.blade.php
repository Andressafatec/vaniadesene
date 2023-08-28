<form action="/contato/enviar" method="post">
    @csrf
    <label for="email">Seu E-mail:</label>
    <input type="email" name="email" required>
    <label for="mensagem">Mensagem:</label>
    <textarea name="mensagem" required></textarea>
    <button type="submit">Enviar</button>
</form>
