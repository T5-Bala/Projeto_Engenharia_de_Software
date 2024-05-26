<?php
session_start();
if($_SESSION['nivel'] != 2){
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
    <title>Gestão de Salas</title>
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
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .plan {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            <a class="navbar-brand" href="index.php">Gestão de Salas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="criardivisao.php">Criar Divisões</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gerirsalas.php">Gerir Salas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="criarocupacao.php">Criar Ocupação Permanente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="consultarocupacao.php">Consultar Ocupação</a>
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
        <h1>Bem-vindo, Gestor Educativo</h1>
        <br>

        <h1>Divisões</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome da Divisão</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../basedados/basedados.h';

                $sql = "SELECT * FROM divisao";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['NomeDivisao'] . "</td>";
                    echo "<td>" . $row['Descricao'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <br>
        <h1>Salas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome da Sala</th>
                    <th>Vagas</th>
                    <th>Divisão</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql1 = "SELECT * FROM salas";
                $result1 = mysqli_query($conn, $sql1);

                while ($row = mysqli_fetch_assoc($result1)) {
                    $sql2 = "SELECT NomeDivisao FROM divisao d INNER JOIN salas s ON d.id_Divisao = s.id_Divisao WHERE s.id_sala = " . $row['id_Sala'];
                    $result2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));

                    echo "<tr>";
                    echo "<td>" . $row['NomeSala'] . "</td>";
                    echo "<td>" . $row['numVagas'] . "</td>";
                    echo "<td>" . $result2['NomeDivisao'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <br>
    </div>

    <footer class="bg-dark text-white text-center p-3" style="position: fixed; left:0; bottom:0; width:100%;">
        <p>&copy; 2023 Gestão de Salas. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
