<?php


  include '../basedados/basedados.h';
  

session_start();

if(isset($_POST['utilizador']) && isset($_POST['idade']) && isset($_POST['data_nasc'])){


$sql = "UPDATE utilizadores SET nome_utilizador='".$_POST['utilizador']."', idade='".$_POST['idade']."', data_nasc='".$_POST['data_nasc']."' WHERE id_utilizador=".$_SESSION['id_utilizador'];
$res = mysqli_query($conn,$sql);

if($res){
    echo "Utilizador editado com sucesso!";
    header("refresh:2;url=voltar.php");
}
}

?>