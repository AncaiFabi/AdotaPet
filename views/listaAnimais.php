<?php
// session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php?p=login");
    exit;
}
?>

<h2>Animais cadastrados</h2>

<?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
    <a href="index.php?p=animal/add">➕ Novo Animal</a>
<?php endif; ?>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Raça</th>
            <th>Sexo</th>
            <th>Idade</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($animais as $animal): ?>
            <tr>
                <td>
                    <?php if (!empty($animal->imagem)): ?>
                        <img src="<?= htmlspecialchars($animal->imagem) ?>" alt="Foto de <?= htmlspecialchars($animal->nome) ?>" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                    <?php else: ?>
                        <span style="color: #888;">Sem imagem</span>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($animal->nome) ?></td>
                <td><?= htmlspecialchars($animal->raca) ?></td>
                <td><?= $animal->sexo === 'M' ? 'Macho' : 'Fêmea' ?></td>
                <td><?= (int) $animal->idade ?> anos</td>
                <td><?= htmlspecialchars($animal->categoria) ?></td>
                <td>
                    <a href="index.php?p=animal/editar/<?= $animal->id ?>">✏️ Editar</a> |
                    <a href="index.php?p=animal/apagar/<?= $animal->id ?>" onclick="return confirm('Tem certeza que deseja apagar?')">🗑️ Apagar</a> |
                    <a href="index.php?p=animal/detalhe/<?= $animal->id ?>">🔍 Ver</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
