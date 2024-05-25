<?php  

session_start();
  if($_SESSION['nivel'] != 3){
    header('Location: voltar.php');
  }


include '../basedados/basedados.h';

if (isset($_POST['id_curso'])) {
    $id_curso = $_POST['id_curso'];
    
        $query = "DELETE FROM cursos WHERE id_curso = '$id_curso'";
        $result = mysqli_query($conn, $query);
   

   

    if ($result) {
        
        echo "Curso eliminado com sucesso!";
       
       
         header("refresh:2; url=voltar.php");
        
    } else {
        echo "Erro na eliminação do curso!";
    }
}



?>