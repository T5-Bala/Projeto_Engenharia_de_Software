<?php

  include '../basedados/basedados.h';
  

session_start();

if(isset($_POST['curso']) && isset($_POST['vagas']) && isset($_POST['duracao']) && isset($_POST['preco']) && isset($_POST['id_curso'])){


$sql = "UPDATE cursos SET nome_curso='".$_POST['curso']."', vagas_curso='".$_POST['vagas']."', duracao_curso='".$_POST['duracao']."', preco_curso = '".$_POST['preco']."'  
WHERE id_curso=".$_POST['id_curso'];
$res = mysqli_query($conn,$sql);

if($res){
    echo "Curso editado com sucesso!";
    header("refresh:2;url=voltar.php");
}
}

?>