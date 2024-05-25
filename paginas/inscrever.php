<?php
session_start();
  if($_SESSION['nivel'] != 2){
    header('Location: voltar.php');
  }

  include '../basedados/basedados.h';

  if (isset($_POST['id_utilizador'])) {
    $sql = "UPDATE inscricoes set estado_inscricao = 1 where id_utilizador = ".$_POST['id_utilizador'];
    $res = mysqli_query($conn, $sql);


  } else {
    header('Location: ../index.php');
  }
  header('Location: voltar.php');
  







?>