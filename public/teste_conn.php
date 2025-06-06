<?php
require_once __DIR__ . '/../models/ConexaoBD.php';

$conn = ConexaoBD::getConexao();

if ($conn->connect_error) {
    echo "❌ Erro: " . $conn->connect_error;
} else {
    echo "✅ Conectado com sucesso!";
}
?>
