<?php
session_start();

include '../basedados/basedados.h';

if(isset($_SESSION['id_sala']) && isset($_SESSION['id_utilizador']) && isset($_POST['horaini'])
&& isset($_POST['horafim']) && isset($_POST['dataini']) && isset($_POST['datafim']) ){
    $sql = "UPDATE salas set estado_sala = 0 where id_sala = " . $_SESSION['id_sala'];
    $res = mysqli_query($conn, $sql);

   

    if($res){
    $sql2 = "INSERT INTO ocupacao (DataOcupInicio, HoraOcupInicio, DataOcupFim, HoraOcupFim, id_Utilizador, id_Sala) VALUES ('" . $_POST['dataini'] . "', '" . $_POST['horaini'] . "', '" . $_POST['datafim'] . "', '" . $_POST['horafim'] . "', '" . $_SESSION['id_utilizador'] . "', '" . $_SESSION['id_sala'] . "')";
    $res2 = mysqli_query($conn, $sql2);
        if($res2){
            echo "Reserva inserida com sucesso!";
        }
        unset($_SESSION['id_sala']);
        echo "A sua reserva foi realizada com sucesso!";
        header("refresh:2;url=voltar.php");
    }
    else{
        echo "Erro ao realizar a reservar!";
        header("refresh:2;url=voltar.php");
    }
   


}
else{
    echo "Erro ao realizar a reserva else!";
    header("refresh:2;url=voltar.php");
}
?>