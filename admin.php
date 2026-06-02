<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração</title>
    <link rel="stylesheet" href="styles/admin.css">
</head>
<body>
<?php
    require "db.php";

    require "scripts/funcs_admin.php";
    session_start();
    $id_tipo = $_SESSION["id_tipo"];
    if($id_tipo == "ADM")
    {
        // O utilizador é um administrador, pode aceder à página
    }
    else
    {
        // O utilizador não é um administrador, redirecionar para a página de login
        header("Location: login.php");
        exit();

    }
?>
    <header>
        <h1>Painel de Administração</h1>
    </header>

    <main class="container">

        <section class="card">
            <h2>Gestão de Utilizadores</h2>

            <div class="actions">
                <button class="btn add">Adicionar Médico</button>
                <button class="btn edit">Alterar Médico</button>
                <button class="btn remove">Remover Médico</button>
            </div>

            <div class="actions">
                <button class="btn add">Adicionar Enfermeiro</button>
                <button class="btn edit">Alterar Enfermeiro</button>
                <button class="btn remove">Remover Enfermeiro</button>
            </div>

            <div class="actions">
                <button class="btn add">Adicionar Auxiliar</button>
                <button class="btn edit">Alterar Auxiliar</button>
                <button class="btn remove">Remover Auxiliar</button>
            </div>
        </section>


        <section class="card">
            <h2>Registos de Login</h2>

            <table>
                <thead>
                    <tr>
                        <th>Utilizador</th>
                        <th>Função</th>
                        <th>Data/Hora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        Registos($conn);
                    ?>
                </tbody>
            </table>
        </section>

    </main>

</body>
</html>