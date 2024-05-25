<?php
session_start();

  if(!isset($_SESSION['nivel'])){
    header('Location: menu.php');
  }
else{
  
session_destroy();

header('Location: index.php');
}

?>