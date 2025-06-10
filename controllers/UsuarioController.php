<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    public static function formCadastro() {
        session_start();
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        require __DIR__ . '/../views/cadastroUsuario.php';
    }

    public static function cadastrar() {
        if ($_POST) {
            Usuario::cadastrar($_POST);
            echo "Usuário cadastrado com sucesso! <a href='index.php?p=login'>Ir para login</a>";
        }
    }

    public static function formLogin() {
        session_start();
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        require __DIR__ . '/../views/login.php';
    }

    public static function login() {
    session_start();
    if ($_POST) {

        // Proteção CSRF
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die('Erro de segurança: token CSRF inválido.');
        }

        $usuario = Usuario::buscarPorEmail($_POST['email']);

        // AQUI você coloca o var_dump para depurar:
        var_dump($_POST['senha']);              // senha digitada no form
        var_dump($usuario ? $usuario->senha : null); // hash que veio do banco

        if ($usuario && password_verify($_POST['senha'], $usuario->senha)) {

            $_SESSION['usuario_id'] = $usuario->id;
            $_SESSION['usuario_nome'] = $usuario->nome;

            setcookie('usuario_nome', $usuario->nome, time() + 3600, "/"); // Cookie válido por 1 hora

            header("Location: index.php?p=home");
            exit;

        } else {
            echo "Email ou senha inválidos! <a href='index.php?p=usuario/formLogin'>Tentar novamente</a>";
        }
    }
}


    public static function recuperarSenha() {
    session_start(); // ADICIONAR ISSO!

    require_once __DIR__ . '/../models/Usuario.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data_nascimento'];

        $usuario = Usuario::buscarPorCpfDataNascimento($cpf, $data_nascimento);

        if ($usuario) {
            $_SESSION['usuario_recuperar_id'] = $usuario->id;

            echo "<h2>Definir Nova Senha</h2>
                <form method='post' action='index.php?p=usuario/atualizarSenha'>
                    <label>Nova Senha:</label><br>
                    <input type='password' name='nova_senha' required><br><br>
                    <button type='submit'>Atualizar Senha</button>
                </form>";
        } else {
            echo "Dados inválidos. <a href='index.php?p=usuario/recuperarSenha'>Tentar novamente</a>";
        }
    } else {
        require __DIR__ . '/../views/recuperarSenha.php';
    }
}


   public static function atualizarSenha() {
    session_start();
    echo "Entrou na função atualizarSenha<br>";

    require_once __DIR__ . '/../models/Usuario.php';

    if (isset($_SESSION['usuario_recuperar_id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $idUsuario = $_SESSION['usuario_recuperar_id'];
        $novaSenhaTexto = $_POST['nova_senha'] ?? '';

        if (empty($novaSenhaTexto)) {
            die("Erro: nova senha está vazia.");
        }

        $novaSenhaHash = password_hash($novaSenhaTexto, PASSWORD_DEFAULT);

        $resultado = Usuario::atualizarSenha($idUsuario, $novaSenhaHash);

        unset($_SESSION['usuario_recuperar_id']);

        if ($resultado) {
            echo "Senha atualizada com sucesso! <a href='index.php?p=usuario/formLogin'>Ir para login</a>";
        } else {
            echo "Falha ao atualizar senha.";
        }
    } else {
        echo "Acesso inválido.";
    }
}


    public static function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?p=login");
        exit;
    }

    /*public static function recuperarSenha() {
        require __DIR__ . '/../views/recuperarSenha.php';
    }*/
}
