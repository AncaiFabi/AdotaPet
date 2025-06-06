<?php
require_once __DIR__ . '/../controllers/AnimalController.php';
require_once __DIR__ . '/../controllers/SiteController.php';
require_once __DIR__ . '/../controllers/UsuarioController.php';

$pagina = $_GET['p'] ?? '';
$url = explode('/', $pagina);

match ($url[0]) {
    //CRUD de animais
    'animal' => match ($url[1] ?? 'index') {
        'add'        => AnimalController::cadastrar(),
        'editar'     => AnimalController::editar($url[2] ?? null),
        'atualizar'  => AnimalController::atualizar(),
        'apagar'     => AnimalController::apagar($url[2] ?? null),
        'detalhe'    => AnimalController::detalhe($url[2] ?? null),
        default      => AnimalController::listar(),
    },

    //páginas públicas
    'home'    => SiteController::home(),
    'animais' => SiteController::listaPublica(),
    //possível uso futuro
    // 'sobre'   => SiteController::sobre(),
    // 'contato' => SiteController::contato(),

    //padrão (fallback)
    default => SiteController::home(),
};