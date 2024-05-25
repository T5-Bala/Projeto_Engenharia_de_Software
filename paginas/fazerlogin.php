<?php
session_start();

include '../basedados/basedados.h';

if (isset($_POST['utilizador']) && isset($_POST['password'])) {
    $username = $_POST['utilizador'];
    $password = $_POST['password'];

    $query = "SELECT * FROM utilizadores WHERE nome_utilizador = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);



    if (mysqli_num_rows($result)) {
        echo "Login successful";
       

        while($registro = mysqli_fetch_assoc($result)) {

            $_SESSION['nivel'] = $registro['nivel_acesso'];
            $_SESSION['id_utilizador'] = $registro['id_utilizador'];

            if($registro['nivel_acesso'] == 1){
                echo "Bem vindo Aluno" ;
                header("refresh:2; url=menualuno.php");
                
            }
             elseif($registro['nivel_acesso'] == 2){
                echo "Bem vindo Docente\n";
                header("refresh:2; url=menudocente.php");
               
            }elseif($registro['nivel_acesso'] == 3){
                    echo "Bem vindo Admin\n";
                    header("refresh:2; url=menuadmin.php");
                    
                   
            }             
        }
        
            
        
            
        


    } else {
        echo "Invalid username or password";
    }
}



?>