<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php?p=login");
    exit;
}
?>

<h2>Animais para Adoção</h2>

<!-- Botão para adicionar novo animal -->
<a href="index.php?p=animal/add">
    <button style="margin-bottom: 15px; padding: 8px 12px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">
        ➕ Adicionar novo animal
    </button>
</a>

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
            <td>
                <?php if (!empty($animal->imagem)): ?>
                    <img src="<?= $animal->imagem ?>" alt="Foto de <?= $animal->nome ?>" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                <?php else: ?>
                    <span style="color: #aaa;">Sem imagem</span>
                <?php endif; ?>
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

<br>
<a href="index.php?p=home">⬅️ Voltar à home</a>