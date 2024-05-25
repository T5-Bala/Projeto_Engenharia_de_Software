<?php
session_start();

include '../basedados/basedados.h';

if(isset($_POST['id_sala'])){
    $sql = "update salas set estado_sala = 0 where id_sala = " . $_POST['id_sala'];
    $res = mysqli_query($conn, $sql);
    
    if($res){
        echo "A sua reserva foi realizada com sucesso!";
        header("refresh:2;url=voltar.php");
    }
    else{
        echo "Erro ao realizar a reservar!";
        header("refresh:2;url=voltar.php");
    }
   


}
?>