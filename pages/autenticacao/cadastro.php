<?php
session_start();

require 'conexao.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $setor = $_POST['setor'];

    try {
        $stmt = $conn->prepare("INSERT INTO funcionarios (nome, email, telefone, senha, setor) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome, $email, $telefone, $senha, $setor);
        $stmt->execute();
        $_SESSION['usuario'] = [
    'nome' => $nome,
    'email' => $email,
    'telefone' => $telefone,
    'setor' => $setor
];

header("Location: login.php");
        exit;
    } catch (Exception $e) {
        $erro = "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Augebit</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../img/Elemento.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family:'Poppins';
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .cadastro-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 120px;
            height: auto;
        }

        .header-icon {
            font-size: 2.5rem;
            color: #6c63ff;
            margin-bottom: 15px;
            display: block;
        }

        .header h1 {
            color: #2c3e50;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 0;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c63ff;
            font-size: 1rem;
            z-index: 2;
        }

        input, select {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
            color: #495057;
            appearance: none;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #6c63ff;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        input::placeholder {
            color: #adb5bd;
            font-weight: 400;
        }

        select {
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24'%3E%3Cpath fill='%23667eea' d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
            cursor: pointer;
        }

        select option {
            padding: 10px;
            background: white;
            color: #495057;
        }

        .btn-cadastro {
            width: 100%;
            background: linear-gradient(135deg, #6c63ff 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 10px;
        }

        .btn-cadastro:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-cadastro:active {
            transform: translateY(0);
        }

        .links {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }

        .links p {
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 0;
        }

        .links a {
            color: #6c63ff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: #5549d3;
            text-decoration: underline;
        }

        .error {
            background: linear-gradient(135deg, #dc3545, #e55b6b);
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 500;
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.2);
            animation: slideIn 0.5s ease-out;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .error i {
            font-size: 1.1rem;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    

        @media (max-width: 768px) {
            .cadastro-container {
                padding: 30px 25px;
                margin: 10px;
            }
            
            .header h1 {
                font-size: 1.5rem;
            }
            
            .header-icon {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="cadastro-container">
        <div class="header">
            <div class="logo">
                <img src="../../img/Elemento.png" alt="Augebit Logo">
            </div>
            <h1>Cadastre-se</h1>
            <p class="subtitle">Forneça seus dados para cadastrar sua conta no sistema!</p>
        </div>

        <?php if(isset($erro)): ?>
            <div class="error">
                <i class="fas fa-exclamation-triangle"></i>
                <?= $erro ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" name="nome" placeholder="Nome completo" required>
            </div>

            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="E-mail corporativo" required>
            </div>

            <div class="form-group">
                <i class="fas fa-phone"></i>
                <input type="tel" name="telefone" placeholder="Telefone" required>
            </div>

            <div class="form-group">
                <i class="fas fa-building"></i>
                <select name="setor" required>
                    <option value="">Selecione seu setor</option>
                    <option value="TI">TI</option>
                    <option value="RH">RH</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Comercial/Vendas">Comercial/Vendas</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Jurídico">Jurídico</option>
                    <option value="Pesquisa e Desenvolvimento (P&D)">Pesquisa e Desenvolvimento (P&D)</option>
                </select>
            </div>

            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="senha" placeholder="Crie uma senha segura" required>
            </div>

            <button type="submit" class="btn-cadastro">
               Criar Conta
            </button>
        </form>

        <div class="links">
            <p>Já possui uma conta? <a href="login.php">Fazer login</a></p>
        </div>
    </div>
    
</body>
</html>