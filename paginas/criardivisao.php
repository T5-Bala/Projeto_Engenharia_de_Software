<?php
session_start();
if($_SESSION['nivel'] != 1){
  header('Location: voltar.php');
  exit();
}

include '../basedados/basedados.h';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nomeDivisao = $_POST['nomeDivisao'];
  
  if (!empty($nomeDivisao)) {
    $sql = "INSERT INTO divisao (NomeDivisao) VALUES ('$nomeDivisao')";
    
    if (mysqli_query($conn, $sql)) {
      $successMessage = "Divisão criada com sucesso!";
    } else {
      $errorMessage = "Erro ao criar a divisão: " . mysqli_error($conn);
    }
  } else {
    $errorMessage = "O nome da divisão não pode estar vazio.";
  }
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css">
  <title>Criar Divisão</title>
  <style>
    body {
      background-image: url("fundo-reciclado-da-textura-do-papel-branco-papel-de-parede-vintage_118047-8988.avif");
      background-size: cover;
      background-repeat: no-repeat;
    }

    .container {
      margin-top: 50px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-control {
      padding: 10px;
      border-radius: 5px;
    }

    .btn {
      padding: 10px 20px;
      border-radius: 5px;
    }

    .alert {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Gestão de Salas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="menugestoreducativo.php">Voltar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="criarSala.php">Criar Sala</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gestaoOcupacao.php">Gerir Ocupação de Salas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="consultarMapa.php">Consultar Mapa de Ocupação</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h1>Criar Divisão</h1>
    <?php if (isset($successMessage)) : ?>
      <div class="alert alert-success">
        <?php echo $successMessage; ?>
      </div>
    <?php endif; ?>
    <?php if (isset($errorMessage)) : ?>
      <div class="alert alert-danger">
        <?php echo $errorMessage; ?>
      </div>
    <?php endif; ?>
    <form method="post" action="">
      <div class="form-group">
        <label for="nomeDivisao">Nome da Divisão</label>
        <input type="text" class="form-control" id="nomeDivisao" name="nomeDivisao" required>
      </div>
      <button type="submit" class="btn btn-primary">Criar</button>
    </form>
  </div>

  <footer class="bg-dark text-white text-center p-3" style="position: fixed; left:0; bottom:0; width:100%;">
    <p>&copy; 2023 Gestão de Salas. Todos os direitos reservados.</p>
  </footer>
</body>

</html>
