<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Animais cadastrados</title>
    <link rel="stylesheet" href="css/listaAnimais.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="container">
        <h2>Animais cadastrados</h2>

        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
            <a href="index.php?p=animal/add" class="add-animal-btn">➕ Novo Animal</a>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Raça</th>
                    <th>Sexo</th>
                    <th>Idade</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($animais as $animal): ?>
                    <tr>
                        <td>
                            <?php if (!empty($animal->imagem)): ?>
                                <img src="<?= htmlspecialchars($animal->imagem) ?>" alt="Foto de <?= htmlspecialchars($animal->nome) ?>">
                            <?php else: ?>
                                <span>Sem imagem</span>
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
    </main>

<?php include 'footer.php'; ?>
</body>
</html>