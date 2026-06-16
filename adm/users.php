<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTILIZADORES</title>
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

    $sql = "SELECT * FROM utilizadores";
    $result = $conn->query($sql);
?>
    <header>
        <h1>PAINEL DE ADMINISTRAÇÃO</h1>
    </header>

    <div class="layout">

        <nav class="sidebar">
            <ul>
                <li><a href="admin.php">Início</a></li>
                <li><a href="users.php">Utilizadores</a></li>
                <li><a href="tipo_users.php">Tipos de Utilizadores</a></li>
                <li><a href="tarefas.php">Tarefas</a></li>
                <li><a href="consultas.php">Consultas</a></li>
            </ul>
        </nav>

        <main class="container">
            <section class="card">
                <div class="card-header">
                    <h2>LISTA DE UTILIZADORES</h2>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Nome</th>
                            <th>Apelido</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Nº Utente</th>
                            <th>NIF</th>
                            <th>NCC</th>
                            <th>Seg. Social</th>
                            <th>Género</th>
                            <th>Data Nasc.</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["id_util"] ?></td>
                            <td><?= $row["id_tipo"] ?></td>
                            <td><?= $row["nome"] ?></td>
                            <td><?= $row["apelido"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["telefone"] ?></td>
                            <td><?= $row["num_utente"] ?></td>
                            <td><?= $row["nif"] ?></td>
                            <td><?= $row["ncc"] ?></td>
                            <td><?= $row["seg_social"] ?></td>
                            <td><?= $row["genero"] ?></td>
                            <td><?= $row["data_nascimento"] ?></td>
                            <td class="acoes">
                                <a href="scripts/edit_user.php?id=<?= $row["id_util"] ?>" class="btn-editar">✏️ Editar</a>
                                <a href="scripts/delete_user.php?id=<?= $row["id_util"] ?>" class="btn-eliminar" onclick="return confirm('Tem a certeza que deseja eliminar este utilizador?')">🗑️ Eliminar</a>
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