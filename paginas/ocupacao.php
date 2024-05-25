<?php
   session_start();
   if($_SESSION['nivel'] != 1){
     header('Location: voltar.php');
   }

  ?>


<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Gestão de cursos de formação</title>
    <style>

      
      body {
      background-image: url("fundo-reciclado-da-textura-do-papel-branco-papel-de-parede-vintage_118047-8988.avif");
      background-size: cover;
      background-repeat: no-repeat;
    
    }
      img{
        border-radius: 20px;
      }
      .bio-image {
        width: 200px;
        height: 200px;
        object-fit: cover;
      }

      footer{
    padding: 20px;
    text-align: center;
    margin-top: 16.4%;
    font-size: 14px;
    
  }
  footer p{
    color: white;
  }
  
    </style>
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Gestão de cursos de formação</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="voltar.php">Voltar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
     
      <div style="margin-top: 2%;">
        <div class="container">
          <div class="row">

          <!-- login -->
          <div class="col-md-4 offset-md-4 align-items-center justify-content-center container"  style="margin-top: 1%;">
            <h2>Definir Horário</h2>
            <form action = "inscrever_c.php" method = "POST">
              <div class="mb-3">
                <label for="utilizador" class="form-label">Hora Inicio</label>
                <input type="time" class="form-control" id="horaini" name="horaini" required >
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Hora Fim</label>
                <input type="time" class="form-control" id="horafim" name="horafim" required>
              </div>
              <div class="mb-3">
                <label for="idade" class="form-label">Data Inicio</label>
                <input type="date" class="form-control" id="dataini" name="dataini" required>
              </div>
              <div class="mb-3">
                <label for="Data Nascimento" class="form-label">Data Fim</label>
                <input type="date" class="form-control" id="datafim" name="datafim" required>
              </div>
             
              <button type="submit" class="btn btn-primary">Reservar</button>
            </form>
          </div>
  
          </div>
        </div>
      </div>
      <?php
                echo "<td> <input type='hidden' value='". $_POST['id_sala'] ."' name='id_sala' class='btn btn-primary'> </td>";
      
      ?>
      
      <footer class="bg-dark text-white text-center p-3 " style="position: fixed; left:0; bottom:0; width:100%;">
        <p>&copy; 2023 Gestão de cursos de formação. Todos os direitos reservados.</p>
      </footer>

  </body>
</html>