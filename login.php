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

    $sql = "SELECT * FROM utilizadores 
        WHERE num_utente = '$num_utente' 
        AND password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: main.php");
    } else {
        echo "Login falhou";
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
                <a href="register.html" align="center" class="btn-register">Registar Conta</a>

            </div>

        </form>
    </div>
 
</body>
</html>