<?php
require_once __DIR__ . '/../controllers/AnimalController.php';
require_once __DIR__ . '/../controllers/SiteController.php';
require_once __DIR__ . '/../controllers/UsuarioController.php';

$pagina = $_GET['p'] ?? '';
$pagina = explode('?', $pagina)[0];
$url = explode('/', $pagina);


match ($url[0]) {
    'animal' => match ($url[1] ?? 'index') {
        'add'        => AnimalController::cadastrar(),
        'editar'     => AnimalController::editar($url[2] ?? null),
        'atualizar'  => AnimalController::atualizar(),
        'apagar'     => AnimalController::apagar($url[2] ?? null),
        'detalhe'    => AnimalController::detalhe($url[2] ?? null),
        'adotar'     => AnimalController::adotar($url[2] ?? null),
        'adotados'   => AnimalController::adotados(),
        default      => AnimalController::listar(),
    },

    'usuario' => match ($url[1] ?? 'index') {
        'formCadastro'    => UsuarioController::formCadastro(),
        'cadastrar'       => UsuarioController::cadastrar(),
        'formLogin'       => UsuarioController::formLogin(),
        'login'           => UsuarioController::login(),
        'logout'          => UsuarioController::logout(),
        'recuperarSenha'  => UsuarioController::recuperarSenha(),
        'atualizarSenha'  => UsuarioController::atualizarSenha(), 
        default           => UsuarioController::formLogin(),
    },

    'home'    => SiteController::home(),
    'animais' => SiteController::listaPublica(),
    'sobre'   => SiteController::sobre(),

    default => UsuarioController::formLogin(),
};