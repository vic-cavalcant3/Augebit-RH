<?php include("conecta.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Augebit - Férias e Licenças</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: rgba(244, 244, 244, 0.95);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .ferias-container {
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

        .header p {
            color: #6c757d;
            font-size: 1rem;
            margin-top: 10px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 30px;
        }

        .form-section h2 {
            color: #2c3e50;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-size: 1rem;
            z-index: 2;
            margin-top: 12px;
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
            font-weight: 500;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        select {
            appearance: none;
            cursor: pointer;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24'%3E%3Cpath fill='%23667eea' d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
        }

        .btn-submit {
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .table-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
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
            font-size: 0.95rem;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        td {
            color: #495057;
            font-weight: 500;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-pendente {
            background: #fff3cd;
            color: #856404;
        }

        .status-aprovada {
            background: #d4edda;
            color: #155724;
        }

        .status-rejeitada {
            background: #f8d7da;
            color: #721c24;
        }

        .tipo-badge {
            padding: 4px 8px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .tipo-ferias {
            background: #e3f2fd;
            color: #1565c0;
        }

        .tipo-licenca {
            background: #f3e5f5;
            color: #7b1fa2;
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

        @media (max-width: 768px) {
            .ferias-container {
                padding: 25px 20px;
                margin: 10px;
            }
            
            .header h1 {
                font-size: 1.5rem;
            }
            
            .header-icon {
                font-size: 2.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .footer-links a {
                display: block;
                margin: 10px 0;
            }

            th, td {
                padding: 10px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="ferias-container">
            <div class="header">
                <h1>Controle de Férias e Licenças</h1>
                <p>Gerencie solicitações de férias e licenças dos funcionários</p>
            </div>


            <div class="form-section">
                <h2>
                    <i class="fas fa-plus-circle"></i>
                    Nova Solicitação
                </h2>
                
                <form method="POST" action="">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="funcionario">Nome do Funcionário</label>
                            <i class="fas fa-user"></i>
                            <input type="text" name="funcionario" id="funcionario" placeholder="Digite o nome completo" required>
                        </div>

                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <i class="fas fa-tag"></i>
                            <select name="tipo" id="tipo" required>
                                <option value="">Selecione o tipo</option>
                                <option value="ferias"> Férias</option>
                                <option value="licenca"> Licença</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inicio">Data de Início</label>
                            <i class="fas fa-calendar-alt"></i>
                            <input type="date" name="inicio" id="inicio" required>
                        </div>

                        <div class="form-group">
                            <label for="fim">Data de Fim</label>
                            <i class="fas fa-calendar-check"></i>
                            <input type="date" name="fim" id="fim" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <i class="fas fa-flag"></i>
                            <select name="status" id="status" required>
                                <option value="Pendente"> Pendente</option>
                                <option value="Aprovada"> Aprovada</option>
                                <option value="Rejeitada"> Rejeitada</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">
                        Registrar Solicitação
                    </button>
                </form>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <h3><i class="fas fa-list"></i> Solicitações Recentes</h3>
                </div>
                
                <?php if ($result_registros && mysqli_num_rows($result_registros) > 0): ?>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th><i class="fas fa-user"></i> Funcionário</th>
                                    <th><i class="fas fa-tag"></i> Tipo</th>
                                    <th><i class="fas fa-calendar-alt"></i> Início</th>
                                    <th><i class="fas fa-calendar-check"></i> Fim</th>
                                    <th><i class="fas fa-flag"></i> Status</th>
                                    <th><i class="fas fa-clock"></i> Solicitado em</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($registro = mysqli_fetch_assoc($result_registros)): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($registro['funcionario']) ?></td>
                                        <td>
                                            <span class="tipo-badge <?= $registro['tipo'] == 'ferias' ? 'tipo-ferias' : 'tipo-licenca' ?>">
                                                <?= $registro['tipo'] == 'ferias' ? ' Férias' : ' Licença' ?>
                                            </span>
                                        </td>
                                        <td><?= date('d/m/Y', strtotime($registro['inicio'])) ?></td>
                                        <td><?= date('d/m/Y', strtotime($registro['fim'])) ?></td>
                                        <td>
                                            <span class="status-badge status-<?= strtolower($registro['status']) ?>">
                                                <?php
                                                switch($registro['status']) {
                                                    case 'Pendente':
                                                        echo ' Pendente';
                                                        break;
                                                    case 'Aprovada':
                                                        echo ' Aprovada';
                                                        break;
                                                    case 'Rejeitada':
                                                        echo ' Rejeitada';
                                                        break;
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td><?= date('d/m/Y H:i', strtotime($registro['data_solicitacao'])) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-umbrella-beach"></i>
                        <h3>Nenhuma solicitação encontrada</h3>
                        <p>Ainda não há solicitações de férias ou licenças registradas.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer-links">
                <a href="dashboard.php">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
                <a href="ponto.php">
                    <i class="fas fa-clock"></i>
                    Registrar Ponto
                </a>
                <a href="historico_pontos.php">
                    <i class="fas fa-history"></i>
                    Histórico
                </a>
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                </a>
            </div>
        </div>
    </div>

    <script>
        // Validação de datas
        document.getElementById('inicio').addEventListener('change', function() {
            const dataInicio = new Date(this.value);
            const dataFim = document.getElementById('fim');
            
            // Define data mínima para fim como um dia após o início
            const minDataFim = new Date(dataInicio);
            minDataFim.setDate(minDataFim.getDate() + 1);
            
            dataFim.min = minDataFim.toISOString().split('T')[0];
        });

        // Feedback visual no tipo
        document.getElementById('tipo').addEventListener('change', function() {
            const formGroup = this.closest('.form-group');
            if (this.value === 'ferias') {
                this.style.borderColor = '#1565c0';
            } else if (this.value === 'licenca') {
                this.style.borderColor = '#7b1fa2';
            }
        });

        // Feedback visual no status
        document.getElementById('status').addEventListener('change', function() {
            const formGroup = this.closest('.form-group');
            switch(this.value) {
                case 'Pendente':
                    this.style.borderColor = '#856404';
                    break;
                case 'Aprovada':
                    this.style.borderColor = '#155724';
                    break;
                case 'Rejeitada':
                    this.style.borderColor = '#721c24';
                    break;
            }
        });
    </script>
</body>
</html>
