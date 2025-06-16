<?php

class ConexaoBD {
    public static function getConexao() {
        $host     = "localhost";
        $usuario  = "root";
        $senha    = "";
        $banco    = "adotapet";
        $porta    = 3307;

        $conn = new mysqli($host, $usuario, $senha, $banco, $porta);

        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }
        return $conn;
    }
}

?>