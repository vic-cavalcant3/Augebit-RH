<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require './autenticacao/conexao.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: ../pages/login.php");
    exit;
}

if (!isset($conn)) {
    die("Erro: Não foi possível conectar ao banco de dados.");
}

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: perfil.php");
    exit;
}

$user_id = $_SESSION['usuario']['id'];

// Coletar e sanitizar dados do formulário
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$setor = filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_STRING);
$nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$biografia = filter_input(INPUT_POST, 'biografia', FILTER_SANITIZE_STRING);
$email_secundario = filter_input(INPUT_POST, 'email_secundario', FILTER_SANITIZE_EMAIL);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$linkedin = filter_input(INPUT_POST, 'linkedin', FILTER_SANITIZE_URL);
$github = filter_input(INPUT_POST, 'github', FILTER_SANITIZE_URL);
$instagram = filter_input(INPUT_POST, 'instagram', FILTER_SANITIZE_URL);

// Validações adicionais
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email inválido");
}

try {
    // Prepara a query de atualização - CORRIGIDA
    $sql = "UPDATE funcionarios SET 
            nome = ?, 
            email = ?, 
            telefone = ?, 
            setor = ?, 
            nascimento = ?, 
            cpf = ?, 
            biografia = ?,
            email_secundario = ?,
            celular = ?,
            cep = ?,
            logradouro = ?,
            numero = ?,
            complemento = ?,
            bairro = ?,
            cidade = ?,
            estado = ?,
            linkedin = ?,
            github = ?,
            instagram = ?
            WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        throw new Exception("Erro ao preparar consulta: " . $conn->error);
    }
    
    // Vincula os parâmetros - CORRIGIDO (21 's' para strings e 1 'i' para inteiro)
$stmt->bind_param('ssississiisisssssssi', 
        $nome, 
        $email, 
        $telefone, 
        $setor, 
        $nascimento, 
        $cpf, 
        $biografia,
        $email_secundario,
        $celular,
        $cep,
        $logradouro,
        $numero,
        $complemento,
        $bairro,
        $cidade,
        $estado,
        $linkedin,
        $github,
        $instagram,
        $user_id);
    
    // Executa a atualização
    if (!$stmt->execute()) {
        throw new Exception("Erro ao atualizar perfil: " . $stmt->error);
    }
    
    // Atualiza os dados na sessão
    $_SESSION['usuario'] = [
        'nome' => $nome,
        'email' => $email,
        'telefone' => $telefone,
        'setor' => $setor,
        'nascimento' => $nascimento,
        'cpf' => $cpf,
        'biografia' => $biografia,
        'email_secundario' => $email_secundario,
        'celular' => $celular,
        'cep' => $cep,
        'logradouro' => $logradouro,
        'numero' => $numero,
        'complemento' => $complemento,
        'bairro' => $bairro,
        'cidade' => $cidade,
        'estado' => $estado,
        'linkedin' => $linkedin,
        'github' => $github,
        'instagram' => $instagram,
        'id' => $user_id
    ];
    
    // Redireciona com mensagem de sucesso
    header("Location: perfil.php?success=1");
    exit;
    
} catch (Exception $e) {
    die("Erro ao atualizar perfil: " . $e->getMessage());
}