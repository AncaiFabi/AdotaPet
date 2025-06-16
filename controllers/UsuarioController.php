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
            header ("Location:index.php?p=login");
            exit;
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

        // Remova os var_dumps quando terminar de testar
        // var_dump($_POST['senha']);              
        // var_dump($usuario ? $usuario->senha : null); 

        if ($usuario && password_verify($_POST['senha'], $usuario->senha)) {
            $_SESSION['usuario_id'] = $usuario->id;
            $_SESSION['usuario_nome'] = $usuario->nome;

            setcookie('usuario_nome', $usuario->nome, time() + 3600, "/"); // Cookie válido por 1 hora

            header("Location: index.php?p=home");
            exit;

        } else {
            // Salva a mensagem de erro na sessão
            $_SESSION['login_erro'] = "Email ou senha inválidos!";
            
            // Redireciona para o formulário de login
            header("Location: index.php?p=usuario/formLogin");
            exit;
        }
    }
}



    public static function recuperarSenha() {
    session_start();

    require_once __DIR__ . '/../models/Usuario.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data_nascimento'];

        $usuario = Usuario::buscarPorCpfDataNascimento($cpf, $data_nascimento);

        if ($usuario) {
            $_SESSION['usuario_recuperar_id'] = $usuario->id;

            // Exibe o formulário da nova senha
            require __DIR__ . '/../views/definirNovaSenha.php';
        } else {
            echo "Dados inválidos. <a href='index.php?p=recuperarSenha'>Tentar novamente</a>";
        }
    } else {
        // Primeira vez que o usuário clicou no link de esqueci senha
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
                    header("Location: index.php?p=usuario/formLogin");
                    exit;
                } else {
                    echo "❌ Falha ao atualizar senha. <a href='index.php?p=usuario/formNovaSenha'>Tentar novamente</a>";
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
