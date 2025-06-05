<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Inicializa variáveis para evitar warnings
$nome = '';
$email = '';
$telefone = '';
$setor = '';
$nascimento = '';
$cpf = '';
$biografia = '';

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/';  // adicione a barra
    header("Location: " . $base_url . "augebit-rh/pages/teste/usuario.php");
    exit;
}

require 'conexao.php';

if (!isset($conn)) {
    die("Erro: Não foi possível conectar ao banco de dados.");
}

try {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM funcionario WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        throw new Exception("Erro ao preparar consulta: " . $conn->error);
    }
    
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Usuário não encontrado!";
        exit;
    }

    $usuario = $result->fetch_assoc();

$nome = $usuario['nome'] ?? '';
$email = $usuario['email'] ?? '';
$telefone = $usuario['telefone'] ?? '';
$setor = $usuario['setor'] ?? '';
$nascimento = $usuario['nascimento'] ?? '';
$cpf = $usuario['cpf'] ?? '';
$biografia = $usuario['biografia'] ?? '';

    
    $stmt->close();
    
} catch (Exception $e) {
    die("Erro ao buscar dados do usuário: " . $e->getMessage());
}
?>
