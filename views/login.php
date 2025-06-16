<?php

$erro = '';

if (isset($_SESSION['login_erro'])) {
    $erro = $_SESSION['login_erro'];
    unset($_SESSION['login_erro']); 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Adote um Amigo 🐾</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-box">
        <h2>🐾 Login - Adote um Amigo 🐾</h2>
        <?php if (!empty($erro)): ?>
            <p class="erro" style="color: red; text-align: center;"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <form method="POST" action="index.php?p=usuario/login">
            <input type="text" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <button type="submit">Entrar</button>
        </form>

        <br>
        <a href="index.php?p=usuario/formCadastro">Ainda não tem conta? Cadastre-se</a><br>
        <a href="index.php?p=usuario/recuperarSenha">Esqueci minha senha</a>
    </div>
</body>
</html>
