<?php
session_start();
include '../basedados/basedados.h';

if (isset($_POST['utilizador']) && isset($_POST['password']) && isset($_POST['idade']) && isset($_POST['data_nasc']) && isset($_POST['email'])) {
    $username = $_POST['utilizador'];
    $password = $_POST['password'];
    $idade= $_POST['idade'];
    $data_nasc = $_POST['data_nasc'];
    $email = $_POST['email'];
    
    

    $query = "INSERT Into pedidos_registo (nome, email, idade, data_nasc, password) VALUES ('$username','$email', '$idade', '$data_nasc', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        
        echo "Registo successful";
       
         header("refresh:2; url=login.php");
        
    } else {
        echo "Invalid username or password";
    }
}



?>