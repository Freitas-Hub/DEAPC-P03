<?php

$sucesso = false;
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "../db.php";

    $ID   = trim($_POST["ID"]   ?? "");
    $tipo = trim($_POST["tipo"] ?? "");

    if (empty($ID) || empty($tipo)) {
        $mensagem = "Todos os campos são obrigatórios.";
    } else {
        // Verifica se o ID já existe
        $stmt = $conn->prepare("SELECT id_tipo FROM tipo_util WHERE id_tipo = ?");
        $stmt->bind_param("s", $ID);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $mensagem = "O tipo de utilizador com ID \"$ID\" já existe na base de dados.";
        } else {
            // Insere o novo tipo
            $insert = $conn->prepare("INSERT INTO tipo_util (id_tipo, descricao) VALUES (?, ?)");
            $insert->bind_param("ss", $ID, $tipo);

            if ($insert->execute()) {
                $sucesso  = true;
                $mensagem = "Tipo de utilizador \"$tipo\" criado com sucesso.";
            } else {
                $mensagem = "Erro ao inserir na base de dados: " . $conn->error;
            }
            $insert->close();
        }
        $stmt->close();
    }
} else {
    $mensagem = "Acesso inválido.";
}

// Destino do redirect consoante sucesso ou erro
$redirect = $sucesso ? "../admin.php" : "../adm/tipo_users.php";
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?= $sucesso ? "Sucesso" : "Erro" ?></title>
    <meta http-equiv="refresh" content="4;url=<?= $redirect ?>">
</head>
<body style="display:flex; flex-direction:column; align-items:center; justify-content:center; height:100vh; font-family:sans-serif;">

    <?php if ($sucesso): ?>
        <h1 style="color:green;">✔ Sucesso!</h1>
    <?php else: ?>
        <h1 style="color:red;">✘ Erro!</h1>
    <?php endif; ?>

    <p><?= htmlspecialchars($mensagem) ?></p>
    <p>A redirecionar em <span id="contador">4</span> segundos...</p>

    <script>
        let segundos = 4;
        setInterval(() => {
            segundos--;
            document.getElementById("contador").textContent = segundos;
        }, 1000);
    </script>

</body>
</html>