<form method="POST" action="index.php?p=usuario/cadastrar">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <input type="date" name="data_nascimento" required>
    <input type="text" name="cpf" placeholder="CPF (somente números)" required>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <button type="submit">Cadastrar</button>
</form>

<br>
<a href="index.php?p=login">Já tem conta? Login</a>
