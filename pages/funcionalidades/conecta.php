<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "augebit";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
