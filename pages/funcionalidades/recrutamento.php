<?php include("conecta.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recrutamento</title>
     <link rel="shortcut icon" type="image/x-icon" href="../../img/Elemento.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
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

    .container {
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

    .header i {
        font-size: 3rem;
        color: #667eea;
        margin-bottom: 15px;
        display: block;
    }

    h1 {
        color: #2c3e50;
        font-size: 2rem;
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
        color: #667eea;
        font-size: 1rem;
        z-index: 2;
    }

    input, select, textarea {
        width: 100%;
        padding: 15px 15px 15px 45px;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #fff;
        color: #495057;
    }

    input:focus, select:focus, textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        transform: translateY(-2px);
    }

    input::placeholder {
        color: #adb5bd;
        font-weight: 400;
    }

    input[type="file"] {
    display: block;
    width: 100%;
    padding: 14px;
    border: 2px dashed #dee2e6;
    background: #f8f9fa;
    border-radius: 12px;
    font-size: 0.95rem;
    color: #495057;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: inherit;
}

input[type="file"]::file-selector-button {
    background-color: #667eea;
    color: white;
    border: none;
    padding: 8px 16px;
    margin-right: 15px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-weight: 500;
}


    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .success-message {
        background:  #28a745;
        color: white;
        padding: 15px 20px;
        border-radius: 12px;
        margin-top: 25px;
        text-align: center;
        font-weight: 500;
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
        animation: slideIn 0.5s ease-out;
    }

    .error-message {
        background: linear-gradient(135deg, #dc3545, #e55b6b);
        color: white;
        padding: 15px 20px;
        border-radius: 12px;
        margin-top: 25px;
        text-align: center;
        font-weight: 500;
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.2);
        animation: slideIn 0.5s ease-out;
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
    .container {
        padding: 30px 25px;
        margin: 10px;
    }

    h1 {
        font-size: 1.7rem;
    }

    .header i {
        font-size: 2.5rem;
    }

    .logo {
        width: 90px;
    }
}

    .logo {
    width: 120px;
    max-width: 100%;
    height: auto;
    margin-bottom: 15px;
}

</style>
<body>
   
    <div class="container">
        <div class="header">
            <img class="logo" src="../../img/Elemento.png" alt="">
            <h1>Cadastro de Candidatos</h1>
            <p class="subtitle">Faça parte da nossa equipe de sucesso</p>
        </div>

        <form action="recrutamento.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" name="nome" placeholder="Nome completo" required>
            </div>

            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Seu melhor e-mail" required>
            </div>

            <div class="form-group">
                <i class="fas fa-briefcase"></i>
                <input type="text" name="vaga" placeholder="Vaga de interesse" required>
            </div>

            <div class="form-group">
                <input type="file" name="curriculo" accept=".pdf,.doc,.docx" placeholder="Anexe seu currículo">
            </div>

            <button type="submit" class="btn-submit">
                 Enviar Candidatura
            </button>
        </form>
        

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $vaga = $_POST['vaga'];
            $curriculo = $_FILES['curriculo']['name'];


            $sql = "INSERT INTO recrutamento (nome, email, vaga, curriculo)
                    VALUES ('$nome', '$email', '$vaga', '$curriculo')";
            if (mysqli_query($conexao, $sql)) {
                echo '<div class="success-message"><i class="fas fa-check-circle"></i> Candidatura enviada com sucesso! Entraremos em contato em breve.</div>';
            } else {
                echo '<div class="error-message"><i class="fas fa-exclamation-triangle"></i> Erro ao enviar candidatura: ' . mysqli_error($conexao) . '</div>';
            }
        }
        ?>
    </div>
    
</body>
</html>