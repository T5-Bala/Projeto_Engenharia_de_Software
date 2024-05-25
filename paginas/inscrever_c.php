<?php
session_start();

include '../basedados/basedados.h';

if(isset($_POST['id_curso'])){
    $sql = "INSERT INTO inscricoes (id_curso, id_utilizador, estado_inscricao) VALUES (".$_POST['id_curso'].",".$_SESSION['id_utilizador'].",0)";
    $res = mysqli_query($conn, $sql);
    
    if($res){
        echo "O seu pedido de inscrição foi realizada com sucesso!";
        header("refresh:2;url=voltar.php");
    }
    else{
        echo "Erro ao realizar a inscrição!";
        header("refresh:2;url=voltar.php");
    }
   


}
?>