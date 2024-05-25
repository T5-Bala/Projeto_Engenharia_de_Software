<?php
  session_start();
  if(isset($_SESSION['nivel'])){
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
    <title>Gestão de cursos de formação - Login</title>
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
          <a class="navbar-brand" href="index.html">Gestão de cursos de formação</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Preços</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="horarios.php">Horários</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactos.html">Contactos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login/Registar</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
     
      <div style="margin-top: 2%;">
        <div class="container">
          <div class="row">

          <!-- login -->
          <div class="col-md-4 offset-md-4 align-items-center justify-content-center container"  style="margin-top: 11%;">
            <h2>Login</h2>
            <form action = "fazerlogin.php" method = "POST">
              <div class="mb-3">
                <label for="utilizador" class="form-label">Utilizador</label>
                <input type="text" class="form-control" id="utilizador" name="utilizador" required >
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <p>Ainda não tens conta? <a href="registar.php">Registar aqui</a></p>
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
          </div>
  
          </div>
        </div>
      </div>
      
      <footer class="bg-dark text-white text-center p-3 " style="position: fixed; left:0; bottom:0; width:100%;">
        <p>&copy; 2023 Gestão de cursos de formação. Todos os direitos reservados.</p>
      </footer>

  </body>
</html>