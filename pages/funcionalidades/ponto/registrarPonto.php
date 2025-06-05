<?php
session_start();

date_default_timezone_set('America/Sao_Paulo');

require __DIR__ . '/../../autenticacao/conexao.php';

if (!isset($_SESSION['usuario'])) {
    die("Acesso negado. Faça login.");
}

// Debug: verificar sessão
// var_dump($_SESSION['usuario']); exit;

if(empty($_POST['tipo'])) {
    die("Tipo de ponto não especificado!");
}

$funcionario_id = $_SESSION['usuario']['id']; 
$tipo = $_POST['tipo'];
$horario = date('Y-m-d H:i:s');

$stmt = $conn->prepare("INSERT INTO pontos (funcionario_id, tipo, horario) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $funcionario_id, $tipo, $horario);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: dashboard.php?success=1");
    exit;
} else {
    echo "Erro ao registrar ponto: " . $stmt->error;
    error_log("Database error: " . $stmt->error);
}
?>