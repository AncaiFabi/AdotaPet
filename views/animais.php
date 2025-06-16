<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Animais para adocao</title>
    <link rel="stylesheet" href="css/animais.css">
    <link rel="stylesheet" href="css/home.css">

</head>
<body>
    <section class="logo-container">
        <img src="../public/img/cabecalho.png" alt="Logo" class="img-logo">
    </section>
    <header>
    <nav class="menu">
        <a href="index.php?p=home">🏠 Início </a>
        <a href="index.php?p=animais">🐾 Adote</a>
        <a href="index.php?p=animal/adotados">🐾 Meus Animais Adotados</a>
        <a href="index.php?p=sobre">ℹ️ Sobre</a>
        <a href="index.php?p=usuario/logout">🚪 Sair</a>
    </nav>
</header>
</body>
</html>

<?php
    session_start();
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: index.php?p=login");
        exit;
    }
?>

<h3>Animais para Adoção</h3>

<div class="botoes-container">
    <a href="index.php?p=animal/add">
        <button class="botao-acao">➕Adicionar novo animal</button>
    </a>

    <a href="index.php?p=home">
        <button class="botao-acao">⬅️ Voltar à página inicial</button>
    </a>
</div>

<table border="1" cellpadding="8">
    <tr>
        <th>Imagem</th>
        <th>Nome</th>
        <th>Raça</th>
        <th>Idade</th>
        <th>Categoria</th>
        <th>Ver</th>
    </tr>

    <?php foreach ($animais as $animal): ?>
        <tr>
            <td data-label="Imagem">
                <?php 
                    $caminhoImagem = !empty($animal->imagem) 
                        ? $animal->imagem 
                        : 'uploads/animais/padrao.webp'; 
                ?>
                <img src="<?= $caminhoImagem ?>" alt="Foto de <?= htmlspecialchars($animal->nome) ?>" style="width: 100px;">
            </td>
            <td><?= $animal->nome ?></td>
            <td><?= $animal->raca ?></td>
            <td><?= $animal->idade ?> anos</td>
            <td><?= $animal->categoria ?></td>
            <td>
                <a href="index.php?p=animal/detalhe/<?= $animal->id ?>">🔍 Ver</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="index.php?p=home">
    <button style="margin-bottom: 15px; padding: 8px 12px; background-color: #5A4D3F; color: white; border: none; border-radius: 4px; cursor: pointer;">
        ⬅️ Voltar à página inicial
    </button>
</a>

<footer>
    <p>© 2025 Adota Pet. Todos os direitos reservados.</p>
</footer>