<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "../db.php";

    $tipo = $_POST["tipo"] ?? "";
    $nome = trim($_POST["nome"] ?? "");
    $apelido = trim($_POST["apelido"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");
    $num_utente = trim($_POST["num_utente"] ?? "");
    $nif = trim($_POST["nif"] ?? "");
    $cartao_cidadao = trim($_POST["cartao_cidadao"] ?? "");
    $seguranca_social = trim($_POST["seguranca_social"] ?? "");
    $genero = $_POST["genero"] ?? "";
    $data_nascimento = $_POST["data_nascimento"] ?? "";
    $password = $_POST["password"] ?? "";
    $confirmar_password = $_POST["confirmar_password"] ?? "";

    //verificar do topo do formulário para cima
    // tem alguma conta com esse num_utente, nif, cartao_cidadao ou seguranca_social?
    //se fizer o insert como tenho collums com o unique ele devolve erro
    if ($password !== $confirmar_password) {
        $sucesso = false;
        $mensagem = "As passwords não coincidem.";
    } else {
        $sql = "INSERT INTO utilizadores (id_tipo, nome, apelido, email, telefone, num_utente, nif, password, ncc, seg_social, genero, data_nascimento) 
                VALUES ('$tipo', '$nome', '$apelido', '$email', '$telefone', '$num_utente', '$nif', '$password', '$cartao_cidadao', '$seguranca_social', '$genero', '$data_nascimento')";

        echo $sql;
        if ($conn->query($sql)) {
            $sucesso = true;
            $mensagem = "Conta criada com sucesso!";
        } else {
            $sucesso = false;
            $mensagem = ($conn->errno === 1062) ? "Já existe um utilizador com esses dados." . $conn->error : "Erro ao criar conta." . $conn->error;
        }
    }

}

?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?= $sucesso ? "Sucesso" : "Erro" ?></title>
    <meta http-equiv="refresh" content="10;url=../admin.php">
</head>
<body style="display:flex; flex-direction:column; align-items:center; justify-content:center; height:100vh; font-family:sans-serif;">

    <?php if ($sucesso): ?>
        <h1 style="color:green;">✔ Sucesso!</h1>
    <?php else: ?>
        <h1 style="color:red;">✘ Falha...</h1>
    <?php endif; ?>

    <p><?= $mensagem ?></p>
    <p>A redirecionar para o painel em <span id="contador">10</span> segundos...</p>

    <script>
        let segundos = 10;
        setInterval(() => {
            segundos--;
            document.getElementById("contador").textContent = segundos;
        }, 1000);
    </script>

</body>
</html>