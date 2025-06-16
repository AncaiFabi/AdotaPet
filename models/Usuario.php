<?php

require_once __DIR__ . "/ConexaoBD.php";

class Usuario {
    public static function cadastrar($dados) {
    $nome = $dados['nome'];
    $email = $dados['email'];
    $senha = password_hash($dados['senha'], PASSWORD_DEFAULT);
    $data_nascimento = $dados['data_nascimento'];
    $cpf = $dados['cpf'];

    $sql = "INSERT INTO usuarios (nome, email, senha, data_nascimento, cpf)
            VALUES ('$nome', '$email', '$senha', '$data_nascimento', '$cpf')";
    
    return ConexaoBD::getConexao()->query($sql);
}

    public static function buscarPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = ConexaoBD::getConexao()->query($sql);
        return $result->fetch_object();
    }

    public static function buscarPorCpfDataNascimento($cpf, $dataNascimento) {
    $conn = ConexaoBD::getConexao();
    $cpf = $conn->real_escape_string($cpf);
    $dataNascimento = $conn->real_escape_string($dataNascimento);

    $sql = "SELECT * FROM usuarios 
            WHERE cpf = '$cpf' 
            AND data_nascimento = '$dataNascimento'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_object();
    }

    return null;
}

public static function atualizarSenha($idUsuario, $senhaHash) {
    $conn = ConexaoBD::getConexao();

    $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
    if (!$stmt) {
        die("Erro ao preparar statement: " . $conn->error);
    }

    $stmt->bind_param("si", $senhaHash, $idUsuario);

    if (!$stmt->execute()) {
        die("Erro ao atualizar senha: " . $stmt->error);
    }

    $linhasAfetadas = $stmt->affected_rows;

    $stmt->close();

    return $linhasAfetadas > 0;
}
}