<?php
session_start();
if(($_SESSION['nivel']) != 3){
    header('Location: index.php');
}

$connect = mysqli_connect("localhost", "root", "", "lpi_trab");

if (isset($_POST['nome']) && isset($_POST['vagas']) && isset($_POST['duracao']) && isset($_POST['preco'])&& isset($_POST['id_docente'])) {

$sql = "INSERT INTO cursos (nome_curso, vagas_curso, duracao_curso, preco_curso, docente_curso) VALUES
 ('".$_POST['nome']."', '".$_POST['vagas']."', '".$_POST['duracao']."', '".$_POST['preco']."', '".$_POST['id_docente']."')";

$res = mysqli_query($connect, $sql);
header('Location: voltar.php');
}
else {
    echo "Erro";
}



?>