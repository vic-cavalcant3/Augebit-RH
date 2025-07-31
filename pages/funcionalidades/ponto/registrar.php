<?php 
session_start(); 

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Augebit - Registro de Ponto</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../../../img/Elemento.png">
    <style>
        * {
            font-family: 'Poppins';
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {

            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .ponto-container {
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

        .header-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 15px;
            display: block;
        }

        .header h1 {
            color: #2c3e50;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .welcome-msg {
            background:  #28a745;
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 500;
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .welcome-msg i {
            font-size: 1.2rem;
        }

        .current-time {
            background: rgba(102, 126, 234, 0.1);
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }

        .current-time .time-display {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
            font-family: 'Courier New', monospace;
        }

        .current-time .date-display {
            font-size: 1rem;
            color: #6c757d;
            font-weight: 500;
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

        select {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: #fff;
            color: #495057;
            appearance: none;
            cursor: pointer;
            font-weight: 500;
        }

        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        select {
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24'%3E%3Cpath fill='%23667eea' d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
        }

        select option {
            padding: 12px;
            background: white;
            color: #495057;
            font-weight: 500;
        }

        .btn-registrar {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 18px;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-registrar:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-registrar:active {
            transform: translateY(0);
        }

        .footer-links {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }

        .footer-links a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            margin: 0 15px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .footer-links a:hover {
            color: #5549d3;
            text-decoration: underline;
        }


        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        @media (max-width: 768px) {
            .ponto-container {
                padding: 30px 25px;
                margin: 10px;
            }
            
            .header h1 {
                font-size: 1.5rem;
            }
            
            .header-icon {
                font-size: 2.5rem;
            }

            .current-time .time-display {
                font-size: 1.5rem;
            }

            .footer-links a {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>


    <div class="ponto-container">
        <div class="header">
            <i class="fas fa-clock header-icon"></i>
            <h1>Registro de Ponto</h1>
        </div>

        <div class="welcome-msg">
            <i class="fas fa-user-circle"></i>
            <span>Olá, <strong><?= htmlspecialchars($usuario['nome']) ?></strong>!</span>
        </div>

        <div class="current-time">
            <div class="time-display" id="current-time">
                --:--:--
            </div>
            <div class="date-display" id="current-date">
                --/--/----
            </div>
        </div>

        <form action="registrarPonto.php" method="POST">
            <div class="form-group">
                <i class="fas fa-sign-in-alt"></i>
                <select name="tipo" id="tipo" required>
                    <option value="">Selecione o tipo de ponto</option>
                    <option value="entrada"> Entrada</option>
                    <option value="saida"> Saída</option>
                </select>
            </div>

            <button type="submit" class="btn-registrar">
                <i class="fas fa-fingerprint"></i>
                Registrar Ponto
            </button>
        </form>

        <div class="footer-links">
            <a href="ferias.php">
                <i class="fas fa-home"></i>
                Férias
            </a>
            <a href="historico.php">
                <i class="fas fa-history"></i>
                Histórico
            </a>
            <a href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
                Sair
            </a>
        </div>
    </div>

    <script>
        function updateTime() {
            const now = new Date();
            
            // Formatação da hora
            const timeOptions = {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };
            
            // Formatação da data
            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            
            document.getElementById('current-time').textContent = 
                now.toLocaleTimeString('pt-BR', timeOptions);
            
            document.getElementById('current-date').textContent = 
                now.toLocaleDateString('pt-BR', dateOptions);
        }

        // Atualizar o relógio a cada segundo
        updateTime();
        setInterval(updateTime, 1000);

        // Adicionar som de feedback ao selecionar tipo de ponto
        document.getElementById('tipo').addEventListener('change', function() {
            if (this.value === 'entrada') {
                this.style.borderColor = '#28a745';
            } else if (this.value === 'saida') {
                this.style.borderColor = '#dc3545';
            }
        });
    </script>
</body>
</html>