<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAREFAS</title>
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

    $sql = "SELECT id_tarefa, id_atribuidor, id_responsavel, resumo, data_lim, prioridade, Estado FROM tarefas";
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
                    <h2>LISTA DE TAREFAS</h2>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>ID Tarefa</th>
                            <th>ID Atribuidor</th>
                            <th>ID Responsável</th>
                            <th>Resumo</th>
                            <th>Data Limite</th>
                            <th>Prioridade</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["id_tarefa"] ?></td>
                            <td><?= $row["id_atribuidor"] ?></td>
                            <td><?= $row["id_responsavel"] ?></td>
                            <td><?= $row["resumo"] ?></td>
                            <td><?= $row["data_lim"] ?></td>
                            <td><?= $row["prioridade"] ?></td>
                            <td><?= $row["Estado"] ?></td>
                            <td class="acoes">
                                <a href="scripts/edit_tarefa.php?id=<?= $row["id_tarefa"] ?>" class="btn-editar">✏️ Editar</a>
                                <a href="scripts/delete_tarefa.php?id=<?= $row["id_tarefa"] ?>" class="btn-eliminar" onclick="return confirm('Tem a certeza que deseja eliminar esta tarefa?')">🗑️ Eliminar</a>
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