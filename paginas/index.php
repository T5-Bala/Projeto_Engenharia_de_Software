<?php
session_start();
if(isset($_SESSION['nivel'])){
    header("Location: logout.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Gestão de cursos de formação</title>
   <style>
    body {
      background-image: url("fundo-reciclado-da-textura-do-papel-branco-papel-de-parede-vintage_118047-8988.avif");
      background-repeat: no-repeat;
      background-size: cover;
    }
    .rectangle {
      padding: 10px;
      border-radius: 10px;
    }
    h1 {
      color: white;
    }
    footer{
      padding: 20px;
      text-align: center;
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

      <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="rectangle bg-dark">
        <h1 class="text-center">Gestão de cursos de formação</h1>
      </div>
    </div>

    <footer class=" bg-dark ">
      <p>&copy; 2024 Gestão de cursos de formação. Todos os direitos reservados.</p>
    </footer>

  </body>
</html>