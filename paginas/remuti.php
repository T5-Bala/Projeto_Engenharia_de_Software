<?php
session_start();
if($_SESSION['nivel'] != 3){
    header("Location: index.php");
}

include '../basedados/basedados.h';

if (isset($_POST['id_utilizador'])) {
    $sql = "DELETE FROM utilizadores WHERE id_utilizador = '".$_POST['id_utilizador']."' ";
    $res = mysqli_query($conn, $sql);
    header('Location: voltar.php');
}
else {
    echo "Erro";
    header('Location: voltar.php');
}
?>