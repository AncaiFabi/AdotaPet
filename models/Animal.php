<?php

require_once __DIR__ . "/../models/ConexaoBD.php";

class Animal {

    public static function listarAnimaisDisponiveis() {
        $animais = [];
        $conn = ConexaoBD::getConexao();
        $sql = "SELECT * FROM animais";
        $result = $conn->query($sql);

        var_dump($result); // debug solicitado pelo professor

        while ($a = $result->fetch_object()) {
            $animais[] = $a;
        }

        return $animais;
    }

    public static function buscarAnimal($id) {
        $sql = "SELECT * FROM animais WHERE id = $id";
        $result = ConexaoBD::getConexao()->query($sql);
        return $result->fetch_object();
    }

    public static function cadastrarAnimal($dados) {
        $idUsuario   = 1; // Considerar auto_increment no futuro
        $nome        = $dados['nome'];
        $raca        = $dados['raca'];
        $sexo        = $dados['sexo'];
        $descricao   = $dados['descricao'];
        $idade       = $dados['idade'];
        $categoriaId = $dados['categoria'];

        $sql = "INSERT INTO animais 
                (id_usuario, nome, raca, sexo, descricao, idade, categoria_id) 
                VALUES 
                ($idUsuario, '$nome', '$raca', '$sexo', '$descricao', $idade, $categoriaId)";

        return ConexaoBD::getConexao()->query($sql);
    }

    public static function atualizarAnimal($id, $dados) {
        $nome        = $dados['nome'];
        $raca        = $dados['raca'];
        $sexo        = $dados['sexo'];
        $descricao   = $dados['descricao'];
        $idade       = $dados['idade'];
        $categoriaId = $dados['categoria'];

        $sql = "UPDATE animais SET 
                    nome = '$nome',
                    raca = '$raca',
                    sexo = '$sexo',
                    descricao = '$descricao',
                    idade = $idade,
                    categoria_id = $categoriaId
                WHERE id = $id";

        return ConexaoBD::getConexao()->query($sql);
    }

    public static function excluirAnimal($id) {
        $sql = "DELETE FROM animais WHERE id = $id";
        return ConexaoBD::getConexao()->query($sql);
    }
}

?>