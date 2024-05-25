<?php
session_start();

  
  if($_SESSION['nivel'] != 3){
    header('Location: voltar.php');
  }



include '../basedados/basedados.h';

if (isset($_POST['id_pedido']) && isset($_POST['nivel'])) {
    $id_pedido = $_POST['id_pedido'];
    $nivel = $_POST['nivel'];
    
    $query1 = "SELECT * FROM pedidos_registo WHERE id_pedido = '$id_pedido'";
    $result = mysqli_query($conn, $query1);
    $row = mysqli_fetch_array($result);

    $query2 = "INSERT INTO utilizadores (nome_utilizador, idade, dataNascimento, email , password, nivel_acesso) VALUES
     ('$row[nome]', '$row[idade]', '$row[data_nasc]','$row[email]', '$row[password]', '$nivel')";
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