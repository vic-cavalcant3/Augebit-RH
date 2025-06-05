<?php
// conexão com o banco (ajuste conforme necessário)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "augebit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// consulta setores (ajuste conforme sua tabela real)
$sql = "SELECT nome, descricao FROM setores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setores da Empresa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6c63ff;
            --dark: #111;
            --light: #fff;
            --gray: #333;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }

        header {
            background-color: var(--light);
            border-bottom: 1px solid #ddd;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        main {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: auto;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: var(--primary);
        }

        .setores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .setor-card {
            background-color: var(--light);
            border: 1px solid #eee;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transition: var(--transition);
        }

        .setor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(108, 99, 255, 0.15);
        }

        .setor-card h2 {
            color: var(--dark);
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .setor-card p {
            color: var(--gray);
            font-size: 1rem;
        }

        footer {
            background: #f8f8f8;
            text-align: center;
            padding: 2rem 1rem;
            color: #888;
            margin-top: 4rem;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">Augebit RH</div>
</header>

<main>
    <h1>Setores da Empresa</h1>
    <div class="setores-grid">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="setor-card">
                    <h2><?= htmlspecialchars($row["nome"]) ?></h2>
                    <p><?= htmlspecialchars($row["descricao"]) ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Nenhum setor encontrado.</p>
        <?php endif; ?>
    </div>
</main>

<footer>
    &copy; <?= date("Y") ?> Augebit - Recursos Humanos
</footer>

<?php $conn->close(); ?>
</body>
</html>
