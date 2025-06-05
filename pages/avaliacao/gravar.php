<?php

include('conecta.php');

?>

<?php

    $nome = $_POST['nome'];
    $comentario = $_POST['comentario'];
    $usabilidade = $_POST['usabilidade'];
    $produtividadediaria = $_POST['produtividadediaria'];
    $recurso = $_POST['recurso'];
    $sugestoes = $_POST['sugestoes'];
    $satisfacaogeral = $_POST['satisfacaogeral'];

    $query = "INSERT INTO $tabela (nome, comentario, usabilidade, produtividadediaria, recurso, sugestoes, satisfacaogeral)
    VALUES (
    '$nome',
    '$comentario', 
    '$usabilidade', 
    '$produtividadediaria', 
    '$recurso', 
    '$sugestoes', 
    '$satisfacaogeral')";
    

    $mysqli = new mysqli($host, $login, $password, $bd);

if ($mysqli->connect_error) {
  die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

$resultado = $mysqli->query($query);

if ($resultado) {
    echo "<script>alert('Questionário enviado com sucesso!'); window.location.href='../index.php';</script>";
  } else {
    echo "<script>alert('Erro ao enviar o questionário: " . $mysqli->error . "'); history.back();</script>";
  }
 
$mysqli->close();
?>