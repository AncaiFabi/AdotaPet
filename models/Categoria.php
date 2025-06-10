<?php
require_once __DIR__ . "/ConexaoBD.php";

class Categoria {
    public static function listar() {
        $categorias = [];
        $sql = "SELECT * FROM categoria";
        $result = ConexaoBD::getConexao()->query($sql);

        while ($c = $result->fetch_object()) {
            $categorias[] = $c;
        }

        return $categorias;
    }
}
