<?php


  include '../basedados/basedados.h';
  

session_start();

if(isset($_POST['utilizador']) && isset($_POST['idade']) && isset($_POST['data_nasc']) && isset($_POST['email'])){


$sql = "UPDATE utilizadores SET
 nome_utilizador='".$_POST['utilizador']."', idade='".$_POST['idade']."', dataNascimento='".$_POST['data_nasc']."', email = '".$_POST['email']."' 
 WHERE id_utilizador=".$_SESSION['id_utilizador'];
$res = mysqli_query($conn,$sql);

if($res){
    echo "Utilizador editado com sucesso!";
    header("refresh:2;url=voltar.php");
}
}

?>