<?php

require_once __DIR__ . '/../models/Animal.php';

class AnimalController {

    public static function listar() {
        session_start();
        $animais = Animal::listarAnimaisDisponiveis();
        include __DIR__ . '/../views/listaAnimais.php';
    }

    public static function detalhe($id) {
        session_start();

        // Ativa debug se necessário
        // var_dump($id); exit;

        $animal = Animal::buscarAnimal($id);
        include __DIR__ . '/../views/detalheAnimal.php';
    }

    public static function cadastrar() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['id_usuario'] = $_SESSION['id_usuario'] ?? 1;
            Animal::cadastrarAnimal($_POST);
            header("Location: index.php?p=animal");
        } else {
            include __DIR__ . '/../views/formAnimal.php';
        }
    }

    public static function editar($id) {
        session_start();
        $animal = Animal::buscarAnimal($id);
        include __DIR__ . '/../views/formAnimal.php';
    }

    public static function atualizar() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['id_usuario'] = $_SESSION['id_usuario'] ?? 1;
            $id = $_POST['id'];
            Animal::atualizarAnimal($id, $_POST);
            header("Location: index.php?p=animal");
        }
    }

    public static function apagar($id) {
        session_start();
        Animal::excluirAnimal($id);
        header("Location: index.php?p=animal");
    }
}