<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Definir Nova Senha</title>
    <link rel="stylesheet" href="css/definirNovaSenha.css"> 
</head>
<body>
    <div class="nova-senha-container">
        <h2>🔑 Definir Nova Senha</h2>

        <form method="post" action="index.php?p=atualizarSenha">
            <label for="nova_senha">Nova Senha:</label>
            <input type="password" id="nova_senha" name="nova_senha" required>

            <button type="submit">Atualizar Senha</button>
        </form>
    </div>
</body>
</html>