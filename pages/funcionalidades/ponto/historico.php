<?php
session_start();

date_default_timezone_set('America/Sao_Paulo');

require '../../autenticacao/conexao.php';

if (!isset($_SESSION['usuario'])) {
    die("Acesso negado.");
}

$funcionario_id = $_SESSION['usuario']['id'];
$usuario = $_SESSION['usuario'];

$stmt = $conn->prepare("SELECT tipo, horario FROM pontos WHERE funcionario_id = ? ORDER BY horario DESC");
$stmt->bind_param("i", $funcionario_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Augebit - Histórico de Pontos</title>
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .historico-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
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
            background: #28a745;
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

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(102, 126, 234, 0.1);
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
        }

        .stat-card i {
            font-size: 2rem;
            color: #667eea;
            margin-bottom: 10px;
            display: block;
        }

        .stat-card .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .stat-card .stat-label {
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 500;
        }

        .table-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 25px;
        }

        .table-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .table-header h3 {
            margin: 0;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 1rem;
        }

        th, td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        td {
            color: #495057;
            font-weight: 500;
        }

        .tipo-entrada {
            background: #d4edda;
            color: #155724;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .tipo-saida {
            background: #f8d7da;
            color: #721c24;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #495057;
        }

        .empty-state p {
            font-size: 1rem;
            line-height: 1.5;
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

        .btn-action {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin: 0 5px;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            text-decoration: none;
            color: white;
        }

        @media (max-width: 768px) {
            .historico-container {
                padding: 25px 20px;
                margin: 10px;
            }
            
            .header h1 {
                font-size: 1.5rem;
            }
            
            .header-icon {
                font-size: 2.5rem;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }

            .footer-links a {
                display: block;
                margin: 10px 0;
            }

            th, td {
                padding: 12px 10px;
                font-size: 0.9rem;
            }

            .table-responsive {
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="historico-container">
            <div class="header">
                
                <h1>Histórico de Pontos</h1>
            </div>

            <div class="welcome-msg">
                <i class="fas fa-user-circle"></i>
                <span>Histórico de <strong><?= htmlspecialchars($usuario['nome']) ?></strong></span>
            </div>

            <?php
            $total_registros = 0;
            $entradas = 0;
            $saidas = 0;
            $registros = [];

            while ($row = $result->fetch_assoc()) {
                $registros[] = $row;
                $total_registros++;
                if ($row['tipo'] == 'entrada') {
                    $entradas++;
                } else {
                    $saidas++;
                }
            }
            ?>

            <div class="stats-container">
                <div class="stat-card">
                    <i class="fas fa-clipboard-list"></i>
                    <div class="stat-number"><?= $total_registros ?></div>
                    <div class="stat-label">Total de Registros</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-sign-in-alt" style="color: #28a745;"></i>
                    <div class="stat-number"><?= $entradas ?></div>
                    <div class="stat-label">Entradas</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-sign-out-alt" style="color: #dc3545;"></i>
                    <div class="stat-number"><?= $saidas ?></div>
                    <div class="stat-label">Saídas</div>
                </div>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <h3><i class="fas fa-table"></i> Registros</h3>
                </div>
                
                <?php if ($total_registros > 0): ?>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th><i class="fas fa-tag"></i> Tipo</th>
                                    <th><i class="fas fa-calendar-alt"></i> Data e Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($registros as $row): ?>
                                    <tr>
                                        <td>
                                            <?php if ($row['tipo'] == 'entrada'): ?>
                                                <span class="tipo-entrada">
                                                    🔵 Entrada
                                                </span>
                                            <?php else: ?>
                                                <span class="tipo-saida">
                                                    🔴 Saída
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?= date('d/m/Y - H:i:s', strtotime($row['horario'])) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-clock"></i>
                        <h3>Nenhum registro encontrado</h3>
                        <p>Você ainda não possui registros de ponto.<br>
                        Que tal fazer seu primeiro registro?</p>
                        <br>
                        <a href="registrar.php" class="btn-action">
                            <i class="fas fa-plus"></i>
                            Registrar Ponto
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer-links">
                <a href="ferias.php">
                    <i class="fas fa-home"></i>
                    Férias
                </a>
                <a href="registrar.php">
                    <i class="fas fa-clock"></i>
                    Registrar Ponto
                </a>
                <a href="../../index.php">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                </a>
            </div>
        </div>
    </div>
</body>
</html>