<h2>Animais para Adoção</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>Nome</th>
        <th>Raça</th>
        <th>Idade</th>
        <th>Categoria</th>
        <th>Ver</th>
    </tr>

    <?php foreach ($animais as $animal): ?>
        <tr>
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