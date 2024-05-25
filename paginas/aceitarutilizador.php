<?php


  
  if($_SESSION['nivel'] != 3){
    header('Location: voltar.php');
  }

session_start();

include '../basedados/basedados.h';

if (isset($_POST['id_pedido']) && isset($_POST['nivel'])) {
    $id_pedido = $_POST['id_pedido'];
    $nivel = $_POST['nivel'];
    
    $query1 = "SELECT * FROM pedidos_registo WHERE id_pedido = '$id_pedido'";
    $result = mysqli_query($conn, $query1);
    $row = mysqli_fetch_array($result);

    $query2 = "INSERT INTO utilizadores (nome_utilizador, idade, data_nasc, password, nivel_acesso) VALUES
     ('$row[nome_utilizador]', '$row[idade_utilizador]', '$row[data_nasc]', '$row[password]', '$nivel')";
    $result2 = mysqli_query($conn, $query2);

    if ($result2) {
        
        $query3 = "DELETE FROM pedidos_registo WHERE id_pedido = '$id_pedido'";
        $result3 = mysqli_query($conn, $query3);
       
       
         header("refresh:2; url=adicionarutilizador.php");
        
    } else {
        echo "Erro ao adicionar utilizador";
    }
}



?>