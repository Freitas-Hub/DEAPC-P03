<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTAS</title>
    <link rel="stylesheet" href="../styles/admin.css">
</head>
<body>
<?php
    require "../db.php";
    require "../scripts/funcs_admin.php";
    session_start();
    $id_tipo = $_SESSION["id_tipo"];
    if($id_tipo != "ADM")
    {
        header("Location: ../login.php");
        exit();
    }

    $sql = "SELECT id_consulta, id_medico, id_paciente, id_fatura, data FROM consultas";
    $result = $conn->query($sql);
?>
    <header>
        <h1>PAINEL DE ADMINISTRAÇÃO</h1>
    </header>

    <div class="layout">

        <nav class="sidebar">
            <ul>
                <li><a href="../admin.php">Início</a></li>
                <li><a href="utilizadores.php">Utilizadores</a></li>
                <li><a href="tipo_utilizadores.php">Tipos de Utilizadores</a></li>
                <li><a href="tarefas.php">Tarefas</a></li>
                <li><a href="consultas.php">Consultas</a></li>
            </ul>
        </nav>

        <main class="container">
            <section class="card">
                <div class="card-header">
                    <h2>LISTA DE CONSULTAS</h2>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>ID Consulta</th>
                            <th>ID Médico</th>
                            <th>ID Paciente</th>
                            <th>ID Fatura</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["id_consulta"] ?></td>
                            <td><?= $row["id_medico"] ?></td>
                            <td><?= $row["id_paciente"] ?></td>
                            <td><?= $row["id_fatura"] ?></td>
                            <td><?= $row["data"] ?></td>
                            <td class="acoes">
                                <a href="scripts/edit_consulta.php?id=<?= $row["id_consulta"] ?>" class="btn-editar">✏️ Editar</a>
                                <a href="scripts/delete_consulta.php?id=<?= $row["id_consulta"] ?>" class="btn-eliminar" onclick="return confirm('Tem a certeza que deseja eliminar esta consulta?')">🗑️ Eliminar</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>
        </main>

    </div>

</body>
</html>