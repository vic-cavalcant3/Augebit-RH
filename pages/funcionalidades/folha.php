<?php include("conecta.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
     <title>Augebit </title>
    <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    body {
    font-family: 'Poppins';
    background-color: #fff;
    color: #000;
    margin: 0;
    padding: 0;
}

h1 {
    color: #6c63ff;
    margin-bottom: 20px;
}

.container {
    padding: 40px;
    max-width: 800px;
    margin: auto;
}

input, select, textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
}

button {
    background-color: #6c63ff;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 6px;
    cursor: pointer;
}

button:hover {
    background-color: #5549d3;
}

</style>
<body>
<div class="container">
    <h1>Folha de Pagamento</h1>
    <form method="POST" action="">
        <input type="text" name="funcionario" placeholder="Nome do funcionário" required>
        <input type="text" name="mes_referencia" placeholder="Mês de referência (Ex: Maio/2025)" required>
        <input type="number" step="0.01" name="salario_base" placeholder="Salário base" required>
        <input type="number" step="0.01" name="descontos" placeholder="Descontos" required>
        <input type="number" step="0.01" name="adicionais" placeholder="Adicionais" required>
        <button type="submit">Processar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $funcionario = $_POST['funcionario'];
        $mes = $_POST['mes_referencia'];
        $salario = $_POST['salario_base'];
        $descontos = $_POST['descontos'];
        $adicionais = $_POST['adicionais'];
        $total = $salario + $adicionais - $descontos;

        $sql = "INSERT INTO folha_pagamento (funcionario, mes_referencia, salario_base, descontos, adicionais, total_liquido)
                VALUES ('$funcionario', '$mes', '$salario', '$descontos', '$adicionais', '$total')";

        if (mysqli_query($conexao, $sql)) {
            echo "<p>Folha registrada com sucesso!</p>";
        } else {
            echo "<p>Erro ao processar: " . mysqli_error($conexao) . "</p>";
        }
    }
    ?>
</div>
</body>
</html>
