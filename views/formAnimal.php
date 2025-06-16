
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> 🐾 Adota Pet</title>
    <link rel="stylesheet" href="css/formAnimais.css">
</head>
<body>
    <?php include 'header.php'; ?>


<?php
require_once __DIR__ . '/../models/Categoria.php';
$categorias = Categoria::listar();

$estamosEditando = isset($animal) && !empty($animal->id);
$action = $estamosEditando 
    ? "index.php?p=animal/atualizar" 
    : "index.php?p=animal/add";
?>


<h2><?= $estamosEditando ? 'Editar Animal' : 'Cadastro de Animal' ?></h2>

<form method="POST" action="<?= $action ?>" enctype="multipart/form-data">
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
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat->id ?>"
                <?= (isset($animal) && $animal->categoria_id == $cat->id) ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat->nome) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="imagem">Foto do animal:</label><br>
    <input type="file" name="imagem" accept="image/*"><br><br>

    <?php if ($estamosEditando && !empty($animal->imagem)): ?>
        <p>Imagem atual:</p>
        <img src="<?= htmlspecialchars($animal->imagem) ?>" alt="Imagem atual de <?= htmlspecialchars($animal->nome) ?>" style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"><br><br>
    <?php endif; ?>

    <button type="submit">Salvar</button>
    <br><br>
    <a href="index.php?p=animais">⬅️ Voltar para a lista</a>
</form>
<?php include 'footer.php'; ?>
</body>
</html>