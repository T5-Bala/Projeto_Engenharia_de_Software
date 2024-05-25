<?php
  session_start();
  if(!($_SESSION['nivel'] == 3 || $_SESSION['nivel'] == 2)){
    header('Location: menu.php');
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
      background-size: cover;
      background-repeat: no-repeat;
    }

    .dish {
      text-align: center;
      list-style: none;
    }

    img {
      border-radius: 20px;
      max-width: 100px;
      height: auto;
    }

    main {
    padding: 20px;
}

.plans {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Divide into 3 equal columns */
    gap: 20px; /* Add spacing between columns */
}

.plan {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    text-align: center;
}

.plan-content {
    margin-bottom: 20px;
}

.plan-content h2 {
    font-size: 36px;
    margin-bottom: 10px;
    color: #333;
}

.plan-content span {
    font-size: 64px;
    font-weight: bold;
    color: #007bff;
}

.plan-content p {
    font-size: 16px;
    color: #666;
}

.plan-content .btn {
    display: inline-block;
    padding: 12px 24px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.html">Gestão de cursos de formação</a>
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

  <div class="container">
    <br>
    <h1>Editar Dados Curso</h1>
    <br>

    
       
            <?php
            
            include '../basedados/basedados.h';
            if(isset($_POST['id_curso2'])){
            $sql2 = "SELECT * FROM cursos where id_curso = " . $_POST['id_curso2'] . "";
            $result = mysqli_query($conn, $sql2);
            while ($row = mysqli_fetch_assoc($result)) {

                ?>
            <div class="col-md-4 offset-md-4 align-items-center justify-content-center container"  style="margin-top: 11%;">
            
            <form action = "editar_curso.php" method = "POST">
              <div class="mb-3">
                <label for="utilizador" class="form-label">Nome Curso</label>
                <input type="text" class="form-control" id="curso" name="curso" value="<?php echo $row['nome_curso']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="idade" class="form-label">Vagas</label>
                <input type="text" class="form-control" id="vagas" name="vagas" value = "<?php echo $row['vagas_curso']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="data_nasc" class="form-label">Duração</label>
                <input type="text" class="form-control" id="duracao" name="duracao" value = "<?php echo $row['duracao_curso']; ?>" required>
              </div>
              <div class="mb-3">
              <label for="data_nasc" class="form-label">Preço</label>
              <input type="text" class="form-control" id="preco" name="preco" value = "<?php echo $row['preco_curso']; ?>" required>
            </div>
            <input type="hidden" class="form-control"  name="id_curso" value = "<?php echo $row['id_curso']; ?>">
              <button type="submit" class="btn btn-primary">Editar</button>
            </form>
          </div>
              
              
              
            <?php
            }}
            ?>
     


    </div>
  <br>
  <footer class="bg-dark text-white text-center p-3 " style="position: fixed; left:0; bottom:0; width:100%;">
    <p>&copy; 2023 Gestão de cursos de formação. Todos os direitos reservados.</p>
  </footer>
</body>


</html>