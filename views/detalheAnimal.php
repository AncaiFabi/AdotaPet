<h2>Detalhes do Animal</h2>

<p><strong>Nome:</strong> <?= $animal->nome ?></p>
<p><strong>Raça:</strong> <?= $animal->raca ?></p>
<p><strong>Sexo:</strong> <?= $animal->sexo === 'M' ? 'Macho' : 'Fêmea' ?></p>
<p><strong>Idade:</strong> <?= $animal->idade ?> anos</p>
<p><strong>Descrição:</strong> <?= $animal->descricao ?></p>
<p><strong>Categoria:</strong> <?= $animal->categoria ?></p>

<br>
<a href="index.php?p=animal">⬅️ Voltar para a lista</a>