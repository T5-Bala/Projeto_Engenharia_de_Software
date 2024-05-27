<?php
session_start();
if ($_SESSION['nivel'] != 1) {
    header('Location: voltar.php');
    exit();
}

include '../basedados/basedados.h';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idSala = $_POST['idSala'];
    $estadoSala = $_POST['estadoSala'];

    $sql = "UPDATE salas SET estado_sala = $estadoSala WHERE id_Sala = $idSala";
    if (mysqli_query($conn, $sql)) {
        $successMessage = "Estado da sala atualizado com sucesso!";
    } else {
        $errorMessage = "Erro ao atualizar o estado da sala: " . mysqli_error($conn);
    }
}

$sql = "SELECT s.id_Sala, s.NomeSala, s.estado_sala, d.NomeDivisao 
        FROM salas s 
        INNER JOIN divisao d ON s.id_Divisao = d.id_Divisao";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css">
  <title>Gestão de Ocupação de Salas</title>
  <style>
    body {
      background-image: url("fundo-reciclado-da-textura-do-papel-branco-papel-de-parede-vintage_118047-8988.avif");
      background-size: cover;
      background-repeat: no-repeat;
    }

    .container {
      margin-top: 50px;
    }

    .table {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
            <a class="nav-link" href="criardivisao.php">Criar Divisão</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="criarSala.php">Criar Sala</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menugestoreducativo.php">Voltar</a>
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
    <h1>Gestão de Ocupação de Salas</h1>
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
    <table class="table">
      <thead>
        <tr>
          <th>Nome da Sala</th>
          <th>Divisão</th>
          <th>Estado</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <tr>
            <td><?php echo $row['NomeSala']; ?></td>
            <td><?php echo $row['NomeDivisao']; ?></td>
            <td><?php echo $row['estado_sala'] == 1 ? 'Disponível' : 'Indisponível'; ?></td>
            <td>
              <form method="post" action="">
                <input type="hidden" name="idSala" value="<?php echo $row['id_Sala']; ?>">
                <select name="estadoSala" class="form-select">
                  <option value="1" <?php echo $row['estado_sala'] == 1 ? 'selected' : ''; ?>>Disponível</option>
                  <option value="0" <?php echo $row['estado_sala'] == 0 ? 'selected' : ''; ?>>Indisponível</option>
                </select>
                <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
              </form>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <footer class="bg-dark text-white text-center p-3" style="position: fixed; left:0; bottom:0; width:100%;">
    <p>&copy; 2023 Gestão de Salas. Todos os direitos reservados.</p>
  </footer>
</body>

</html>
