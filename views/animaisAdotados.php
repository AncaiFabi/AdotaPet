<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>🐾 Meus Animais Adotados</title>
    <link rel="stylesheet" href="css/adotados.css" />
</head>
<body>

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

</body>
</html>
