<?php

session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "Credenciais inválidas!";
    }
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Augebit</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../img/Elemento.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
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

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 450px;
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

        input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
            color: #495057;
        }

        input:focus {
            outline: none;
            border-color: #6c63ff;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        input::placeholder {
            color: #adb5bd;
            font-weight: 400;
        }

        .btn-login {
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

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-login:active {
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

        .success {
            background:  #28a745;
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 500;
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
            animation: slideIn 0.5s ease-out;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .success i {
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
            .login-container {
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


    <div class="login-container">
        <div class="header">
            <div class="logo">
                <img src="../../img/Elemento.png" alt="Augebit Logo">
            </div>
            <h1>Bem-vindo de volta!</h1>
            <p class="subtitle">Acesse sua conta para continuar</p>
        </div>

        <?php if(isset($erro)): ?>
            <div class="error">
                <i class="fas fa-exclamation-triangle"></i>
                <?= $erro ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div class="success">
                <i class="fas fa-check-circle"></i>
                Conta criada com sucesso! Faça login para continuar.
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Seu e-mail corporativo" required>
            </div>
            
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="senha" placeholder="Sua senha" required>
            </div>
            
            <button type="submit" class="btn-login">
                 Entrar
            </button>
        </form>

        <div class="links">
            <p>Novo por aqui? <a href="cadastro.php">Criar nova conta</a></p>
        </div>
    </div>
    <php
    $_SESSION['usuario'] = $usuario;
    
/>
</body>
</html>