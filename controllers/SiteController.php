<?php

class SiteController {
    
    public static function listaPublica() {
        $animais = Animal::listarAnimaisDisponiveis();
        include __DIR__ . '/../views/animais.php';
    }

    public static function home() {
        include __DIR__ . '/../views/home.php';
    }

    public static function sobre() {
        include __DIR__ . '/../views/sobre.php';
    }

    public static function contato() {
        include __DIR__ . '/../views/contato.php';
    }
}
?>