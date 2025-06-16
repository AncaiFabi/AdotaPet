<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro de Usuário - Adote um Amigo</title>
    <link rel="stylesheet" href="css/cadastroUsuario.css"/>
</head>
<body>
  <div class="container">
    <form method="POST" action="index.php?p=usuario/cadastrar">
      <h2>Cadastro de Usuário</h2>
      <input type="text" name="nome" placeholder="Nome" required>
      <input type="email" name="email" placeholder="E-mail" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <input type="date" name="data_nascimento" required>
      <input type="text" name="cpf" placeholder="CPF (somente números)" required>
      <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
      <button type="submit">Cadastrar</button>
    </form>

    <a href="index.php?p=login">Já tem conta? Login</a>
  </div>
</body>
</html>