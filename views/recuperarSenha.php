<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="css/recuperarSenha.css">
</head>
<body>
    <form method="post" action="index.php?p=usuario/recuperarSenha">
        <h2>🔐 Recuperar Senha</h2>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required placeholder="Digite seu CPF">

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required>

        <button type="submit">Validar dados</button>
    </form>
</body>
</html>
