<div class="detalhes-animal">
    <link rel="stylesheet" href="css/detalheAnimal.css">

    <?php if (!empty($animal->imagem)): ?>
        <img class="imagem-animal" src="<?= $animal->imagem ?>" alt="Foto de <?= $animal->nome ?>">
    <?php endif; ?>

    <h2>Detalhes do Animal</h2> 

    <p><strong>Nome:</strong> <?= htmlspecialchars($animal->nome) ?></p>
    <p><strong>Raça:</strong> <?= htmlspecialchars($animal->raca) ?></p>
    <p><strong>Sexo:</strong> <?= $animal->sexo === 'M' ? 'Macho' : 'Fêmea' ?></p>
    <p><strong>Idade:</strong> <?= (int) $animal->idade ?> anos</p>
    <p><strong>Descrição:</strong> <?= nl2br(htmlspecialchars($animal->descricao)) ?></p>
    <p><strong>Categoria:</strong> <?= htmlspecialchars($animal->categoria_nome) ?></p>

    <a class="voltar-animal" href="index.php?p=animais">⬅️ Voltar para a lista</a>

    <?php if (isset($_SESSION['usuario_id']) && !$animal->adotado): ?>
        <form method="post" action="index.php?p=animal/adotar/<?= $animal->id ?>">
            <button class="btn-adotar" type="submit">🐾 Adotar este animal</button>
        </form>
    <?php elseif ($animal->adotado): ?>
        <p class="status-adotado"><strong>Status:</strong> Já foi adotado! 🏠</p>
    <?php endif; ?>
</div>