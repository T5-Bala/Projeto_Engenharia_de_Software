<?php
session_start();
if ($_SESSION['nivel'] != 1) {
    header('Location: voltar.php');
    exit();
}

include '../basedados/basedados.h';

$sql = "SELECT s.NomeSala, d.NomeDivisao, s.estado_sala FROM salas s 
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
    <title>Gestão de Salas - Consultar Mapa de Ocupação</title>
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
                        <a class="nav-link" href="gestaoOcupacao.php">Gerir Ocupação de Salas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menugestoreducativo.php">Voltar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Consultar Mapa de Ocupação</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome da Sala</th>
                    <th>Divisão</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['NomeSala']; ?></td>
                        <td><?php echo $row['NomeDivisao']; ?></td>
                        <td><?php echo $row['estado_sala'] == 1 ? 'Disponível' : 'Ocupada'; ?></td>
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
