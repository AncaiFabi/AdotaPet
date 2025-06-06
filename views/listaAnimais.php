<h2>Animais cadastrados</h2>

<a href="index.php?p=animal/add">➕ Novo Animal</a>

<table border="1" cellpadding="8">
    <thead>
        <tr>
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