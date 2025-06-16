<?php

require_once __DIR__ . "/../models/ConexaoBD.php";

class Animal {

    public static function listarAnimaisDisponiveis() {
        $animais = [];
        $conn = ConexaoBD::getConexao();
        $sql = "SELECT a.*, c.nome AS categoria
        FROM animais a
        JOIN categoria c ON c.id = a.categoria_id";
        $result = $conn->query($sql);

        while ($a = $result->fetch_object()) {
            $animais[] = $a;
        }

        return $animais;
    }

    public static function buscarAnimal($id) {
    $sql = "SELECT 
                a.*, 
                c.nome AS categoria_nome, 
                a.adotado
            FROM animais a
            LEFT JOIN categoria c ON a.categoria_id = c.id
            WHERE a.id = $id";

    $conn = ConexaoBD::getConexao();
    $result = $conn->query($sql);

    if (!$result) {
        die("Erro na consulta: " . $conn->error . "<br>SQL: $sql");
    }
    return $result->fetch_object();
    }

        public static function cadastrarAnimal($dados, $arquivoImagem) {
        $idUsuario   = $dados['id_usuario'];
        $nome        = $dados['nome'];
        $raca        = $dados['raca'];
        $sexo        = $dados['sexo'];
        $descricao   = $dados['descricao'];
        $idade       = $dados['idade'];
        $categoriaId = $dados['categoria'];

        $imagemPath = null;
        if (isset($arquivoImagem['tmp_name']) && is_uploaded_file($arquivoImagem['tmp_name'])) {
            $ext = pathinfo($arquivoImagem['name'], PATHINFO_EXTENSION);
            $nomeArquivo = uniqid("animal_") . "." . $ext;
            $caminhoFinal = "uploads/animais/" . $nomeArquivo;

            if (!is_dir("uploads/animais")) {
                mkdir("uploads/animais", 0777, true);
            }

            if (move_uploaded_file($arquivoImagem['tmp_name'], $caminhoFinal)) {
                $imagemPath = $caminhoFinal;
            }
        }

        $conn = ConexaoBD::getConexao();
        $sql = "INSERT INTO animais 
                (id_usuario, nome, raca, sexo, descricao, idade, categoria_id, imagem) 
                VALUES 
                ($idUsuario, '$nome', '$raca', '$sexo', '$descricao', $idade, $categoriaId, " . ($imagemPath ? "'$imagemPath'" : "NULL") . ")";

        return $conn->query($sql);
    }

    public static function atualizarAnimal($id, $dados, $arquivoImagem = null) {
        $nome        = $dados['nome'];
        $raca        = $dados['raca'];
        $sexo        = $dados['sexo'];
        $descricao   = $dados['descricao'];
        $idade       = $dados['idade'];
        $categoriaId = $dados['categoria'];

        $imagemSQL = "";

        if ($arquivoImagem && isset($arquivoImagem['tmp_name']) && is_uploaded_file($arquivoImagem['tmp_name'])) {
            $ext = pathinfo($arquivoImagem['name'], PATHINFO_EXTENSION);
            $nomeArquivo = uniqid("animal_") . "." . $ext;
            $caminhoFinal = "uploads/animais/" . $nomeArquivo;

            if (!is_dir("uploads/animais")) {
                mkdir("uploads/animais", 0777, true);
            }

            if (move_uploaded_file($arquivoImagem['tmp_name'], $caminhoFinal)) {
                $imagemSQL = ", imagem = '$caminhoFinal'";
            }
        }

        $sql = "UPDATE animais SET 
                    nome = '$nome',
                    raca = '$raca',
                    sexo = '$sexo',
                    descricao = '$descricao',
                    idade = $idade,
                    categoria_id = $categoriaId
                    $imagemSQL
                WHERE id = $id";

        return ConexaoBD::getConexao()->query($sql);
    }

    public static function excluirAnimal($id) {
        $sql = "DELETE FROM animais WHERE id = $id";
        return ConexaoBD::getConexao()->query($sql);
    }

    public static function adotarAnimal($id_animal, $id_usuario) {
    $conn = ConexaoBD::getConexao();
    $sql = "UPDATE animais 
            SET id_usuario = $id_usuario, adotado = 1 
            WHERE id = $id_animal";
    return $conn->query($sql);
}

    public static function listarAnimaisPorUsuario($id_usuario) {
    $animais = [];
    $conn = ConexaoBD::getConexao();
    $sql = "SELECT a.*, c.nome AS categoria 
            FROM animais a
            LEFT JOIN categoria c ON a.categoria_id = c.id
            WHERE a.id_usuario = $id_usuario";

    $result = $conn->query($sql);

    if (!$result) {
        die("Erro na consulta: " . $conn->error);
    }

    while ($a = $result->fetch_object()) {
        $animais[] = $a;
    }

    return $animais;
}
}
?>