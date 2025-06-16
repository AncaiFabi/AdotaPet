<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Meus animais adotados </title>

    <link rel="stylesheet" href="css/animaisAdotados.css" />
    <link rel="stylesheet" href="css/home.css" />

</head>
<body>
<section class="logo-container">
    <img src="../public/img/cabecalho.png" alt="Logo" class="img-logo">
</section>
<header>
    <nav class="menu">
        <a href="index.php?p=home">🏠 Início</a> |
        <a href="index.php?p=animais">🐾 Adote</a> |
        <a href="index.php?p=animal/adotados">🐾 Meus Animais Adotados</a> |
        <a href="index.php?p=sobre">ℹ️ Sobre</a> |
        <a href="index.php?p=usuario/logout">🚪 Sair</a>
    </nav>
</header>
<h2>🐾 Meus Animais Adotados</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>Nome</th>
        <th>Raça</th>
        <th>Idade</th>
        <th>Categoria</th>
    </tr>

    <?php foreach ($animais as $animal): ?>
        <tr>
            <td><?= htmlspecialchars($animal->nome) ?></td>
            <td><?= htmlspecialchars($animal->raca) ?></td>
            <td><?= (int)$animal->idade ?> anos</td>
            <td><?= htmlspecialchars($animal->categoria) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="index.php?p=home">🏠 Voltar para Home</a>

<footer>
    <p>© 2025 Adota Pet. Todos os direitos reservados.</p>
</footer>

</body>
</html>