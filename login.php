<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register Acess</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "db.php";

    // O formulário foi submetido
    
    //definir variaveis locais com os valores inseridos no forms
    $num_utente = $_POST["num_utente"];
    $password = $_POST["password"];

    $sql = "SELECT id_util, nome, apelido, id_tipo FROM utilizadores 
        WHERE num_utente = '$num_utente' 
        AND password = '$password'";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        $user = $result->fetch_assoc();

        $id_tipo = $user["id_tipo"];
        $nome = $user["nome"];
        $id = $user["id_util"]; 
        $apelido = $user["apelido"];
        echo "id_tipo: $id_tipo";
        if ($id_tipo == "ADM") // é administrador   
        {
            session_start();
            registarAcesso($id, $conn);
            $_SESSION["id_tipo"] = $id_tipo;
            header("Location: admin.php");
            exit();
        }


        
        
        session_start();
        //registar inicio de sessão e guardar variaveis de sessão

        registarAcesso($id, $conn); //função dentro do db.php para registar o acesso do utilizador

        $_SESSION["num_utente"] = $num_utente;
        $_SESSION["nome"] = $nome;
        $_SESSION["apelido"] = $apelido;
        $_SESSION["id_tipo"] = $id_tipo;
        $_SESSION["id_util"] = $id;
        echo "Login bem-sucedido! Bem-vindo, $nome $apelido. $id_tipo";
        header("Location: main.php");
        exit();
    } else {
        $erro = true;
    }


} else {

    // A página foi apenas aberta
    // Não fazer nada
}

?>
 
    <!-- Barra de navegação -->
    <div class="navbar">
        <div class="navbar-logo">
            <img src="images/logo.png" alt="Logotipo">
        </div>
        <ul class="navbar-links">
            <li><a href="historia.html">História</a></li>
            <li><a href="socios.html">Sócios</a></li>
            <li><a href="parcerias.html">Parcerias</a></li>
            <li><a href="medicos.html">Médicos da Casa</a></li>
        </ul>
    </div>
 
    <div class="container">
        <h1>Bem-vindo</h1>
 
        <form method="post">
            <div class="form-group">
                <label for="utente">Numero de Utente</label>
                <input type="number" name="num_utente" placeholder="Numero de utente">
            </div>
 
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="A tua password">
            </div>
 
            <div class="buttons">
                <button type="submit" class="btn-login">Login</button>
                <a href="register.php" align="center" class="btn-register">Registar Conta</a>

            </div>

        </form>
    </div>
 
</body>
</html>