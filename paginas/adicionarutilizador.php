<?php
  session_start();
  if($_SESSION['nivel'] != 3){
    header('Location: voltar.php');
  }

  ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css">
  <title>Gestao de Cursos</title>
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
      <a class="navbar-brand" href="index.html">Gestão de Salas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="menuadmin.php">Voltar</a>
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
    <h1>Adicionar Utilizador</h1>
    <br>
<form action="aceitarutilizador.php" method="POST">
    <table class="table">
        <thead>
            <tr>
                <th>Id_pedido</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Data Nascimento</th>
                <th>Nivel de Acesso</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
           include '../basedados/basedados.h';
            
            $sql = "SELECT * FROM pedidos_registo";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                  echo "<tr>";
                  echo "<td>" . $row['id_pedido'] . "</td>";
                  echo "<td>" . $row['nome'] . "</td>";
                  echo "<td>" . $row['idade'] . "</td>";
                  echo "<td>" . $row['data_nasc'] . "</td>";
                  echo "<td>
                  <select name='nivel'class='form-select'>
                  <option value='1'>Aluno</option>
                  <option value='2'>Docente</option>
                  <option value='3'>Admin</option>
                </select>
                </td>";
                  echo "<td> <input type='hidden' value='". $row['id_pedido'] ."' name='id_pedido' class='btn btn-primary'> </td>";
                  echo "<td> <button type='submit' class='btn btn-primary'>Aceitar</button> </td>";
                  echo "</tr>";
            
              
              

            }
            
            ?>
        </tbody>
    </table>

</form>
    </div>
  <br>
  <footer class="bg-dark text-white text-center p-3 " style="position: fixed; left:0; bottom:0; width:100%;">
    <p>&copy; 2023 Restaurante. Todos os direitos reservados.</p>
  </footer>
</body>


</html>