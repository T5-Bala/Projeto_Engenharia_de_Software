<?php
session_start();
if(($_SESSION['nivel']) != 2){
    header('Location: index.php');
}


include '../basedados/basedados.h';
if (isset($_POST['nome_curso']) && isset($_POST['vagas']) && isset($_POST['duracao']) && isset($_POST['preco'])) {

$sql = "INSERT INTO cursos (nome_curso, vagas_curso, duracao_curso, preco_curso, docente_curso) VALUES
 ('".$_POST['nome_curso']."', '".$_POST['vagas']."', '".$_POST['duracao']."', '".$_POST['preco']."', '".$_SESSION['id_utilizador']."')";

$res = mysqli_query($conn, $sql);
header('Location: voltar.php');

}
else {
    echo "Erro";
    header('Location: voltar.php');
}



?>