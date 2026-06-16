<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIPOS DE UTILIZADORES</title>
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
        header("Location: login.php");
        exit();
    }

    $sql = "SELECT * FROM tipo_util";
    $result = $conn->query($sql);
?>
    <header>
        <h1>PAINEL DE ADMINISTRAÇÃO</h1>
    </header>

    <div class="layout">

        <nav class="sidebar">
            <ul>
                <li><a href="../admin.php">Início</a></li>
                <li><a href="users.php">Utilizadores</a></li>
                <li><a href="tipo_utilizadores.php">Tipos de Utilizadores</a></li>
                <li><a href="tarefas.php">Tarefas</a></li>
                <li><a href="consultas.php">Consultas</a></li>
            </ul>
        </nav>

        <main class="container">
            <section class="card">
                <div class="card-header">
                    <h2>LISTA DE TIPOS DE UTILIZADORES</h2>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["id_tipo"] ?></td>
                            <td><?= $row["descricao"] ?></td>
                            <td class="acoes">
                                <a href="scripts/edit_tipo.php?id=<?= $row["id_tipo"] ?>" class="btn-editar">✏️ Editar</a>
                                <a href="scripts/delete_tipo.php?id=<?= $row["id_tipo"] ?>" class="btn-eliminar" onclick="return confirm('Tem a certeza que deseja eliminar este tipo?')">🗑️ Eliminar</a>
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