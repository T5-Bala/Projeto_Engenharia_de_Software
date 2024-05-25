<?php
session_start();

include '../basedados/basedados.h';

if(isset($_POST['id_sala']) && isset($_SESSION['id_utilizador']) && isset($_POST['horaini'])
&& isset($_POST['horafim']) && isset($_POST['dataini']) && isset($_POST['datafim']) ){
    $sql = "update salas set estado_sala = 0 where id_sala = " . $_POST['id_sala'];
    $res = mysqli_query($conn, $sql);

    $sql2 ="Insert into ocupacao values (" . $_POST['dataini'] . ", " . $_POST['horaini'] . ", '" . $_POST['datafim'] . "', '" . $_POST['horafim'] . "', '" . $_SESSION['id_utilizador'] . "', '" . $_POST['id_sala'] . "')";
    $res2 = mysqli_query($conn, $sql2);

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