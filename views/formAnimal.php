<?php
$estamosEditando = isset($animal) && !empty($animal->id);
$action = $estamosEditando 
    ? "index.php?p=animal/atualizar" 
    : "index.php?p=animal/add";
?>

<h2><?= $estamosEditando ? 'Editar Animal' : 'Cadastro de Animal' ?></h2>

<form method="POST" action="<?= $action ?>">
    <?php if ($estamosEditando): ?>
        <input type="hidden" name="id" value="<?= $animal->id ?>">
    <?php endif; ?>

    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" value="<?= $animal->nome ?? '' ?>"><br><br>

    <label for="raca">Raça:</label><br>
    <input type="text" name="raca" value="<?= $animal->raca ?? '' ?>"><br><br>

    <label for="sexo">Sexo:</label><br>
    <select name="sexo">
        <option value="M" <?= (isset($animal) && $animal->sexo == 'M') ? 'selected' : '' ?>>Macho</option>
        <option value="F" <?= (isset($animal) && $animal->sexo == 'F') ? 'selected' : '' ?>>Fêmea</option>
    </select><br><br>

    <label for="idade">Idade:</label><br>
    <input type="number" name="idade" value="<?= $animal->idade ?? '' ?>"><br><br>

    <label for="descricao">Descrição:</label><br>
    <textarea name="descricao"><?= $animal->descricao ?? '' ?></textarea><br><br>

    <label for="categoria">Categoria:</label><br>
    <select name="categoria">
        <option value="1" <?= (isset($animal) && $animal->categoria == 'Cachorro') ? 'selected' : '' ?>>Cachorro</option>
        <option value="2" <?= (isset($animal) && $animal->categoria == 'Gato') ? 'selected' : '' ?>>Gato</option>
    </select><br><br>

    <button type="submit">Salvar</button>
    <br><br>
    <a href="index.php?p=animal">⬅️ Voltar para a lista</a>
</form>