<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/register.css">
    <title>Registar Conta</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") { // vem do forms
        
            require "db.php";

            //verificar se existem utilizadores com as informações inseridas unicas

            // informações essenciais para criar conta  
            $nif = $_POST["nif"];
            $nome = $_POST["nome"];
            $apelido = $_POST["apelido"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];
            $num_utente = $_POST["num_utente"];
            $cartao_cidadao = $_POST["cartao_cidadao"];
            $seguranca_social = $_POST["seguranca_social"];
            $genero = $_POST["genero"];
            $data_nascimento = $_POST["data_nascimento"];
            $password = $_POST["password"];
            $confirmar_password = $_POST["confirmar_password"];

            // verificar se a palavra-passe e a confirmação são iguais
            if ($password !== $confirmar_password) {
                echo "<p class='error'>As passwords não coincidem. Por favor, tente novamente.</p>";
                exit;
            }

            // verificar se existe alguma conta com o mesmo num_utente, nif, cartao_cidadao ou seguranca_social
            $sql = "INSERT INTO utilizadores (nif, nome, apelido, telefone, num_utente, ncc, seg_social, genero, data_nascimento, password) 
            VALUES (
            '$nif',
            '$nome',
            '$apelido',
            '$email',
            '$telefone',
            '$num_utente',
            '$cartao_cidadao',
            '$seguranca_social',
            '$genero',
            '$data_nascimento',
            '$password'
            )";

            $result = $conn->query($sql);
            //quero verificar se o insert foi concluido com sucesso
            if ($result === TRUE) {
                echo "<p class='success'>Conta criada com sucesso! Pode agora fazer login.</p>";

                header("refresh:2;url=login.php"); // redirecionar para a página de login após 2 segundos
            } else {
                echo "<p class='error'>Erro ao criar conta: </p>";
            }
        }
    ?>
    
    <!-- Barra de navegação -->
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="images/logo.png" alt="Logotipo">
        </div>
        <ul class="navbar-links">
            <li><a href="historia.php">História</a></li>
            <li><a href="socios.php">Sócios</a></li>
            <li><a href="parcerias.php">Parcerias</a></li>
            <li><a href="medicos.php">Médicos da Casa</a></li>
        </ul>
    </nav>
 
    <div class="container">
        <h1>Criar Conta</h1>
        <p class="subtitulo">Preencha os dados para se registar como utente</p>
 
    <form method="POST">

        <div class="form-row">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Primeiro nome">
            </div>

            <div class="form-group">
                <label for="apelido">Apelido</label>
                <input type="text" id="apelido" name="apelido" placeholder="Último nome">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="tel" id="email" name="email" placeholder="teuemail@gmail.com" maxlength="90">
        </div>

        <div class="form-group">
            <label for="telefone">Número de Telefone</label>
            <input type="tel" id="telefone" name="telefone" placeholder="9XXXXXXXX" maxlength="9">
        </div>

        <div class="form-group">
            <label for="num_utente">Número de Utente</label>
            <input type="text" id="num_utente" name="num_utente" maxlength="9" placeholder="Número de Utente">
        </div>

        <div class="form-group">
            <label for="nif">NIF</label>
            <input type="text" id="nif" name="nif" maxlength="9" placeholder="123456789">
        </div>

        <div class="form-group">
            <label for="cartao_cidadao">Número do Cartão de Cidadão</label>
            <input type="text" id="cartao_cidadao" name="cartao_cidadao" maxlength="9" placeholder="Número do CC">
        </div>

        <div class="form-group">
            <label for="seguranca_social">Número da Segurança Social</label>
            <input type="text" id="seguranca_social" name="seguranca_social" maxlength="11" placeholder="Número da Segurança Social">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="genero">Género</label>
                <select id="genero" name="genero">
                    <option value="">-- Selecione --</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="O">Outro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento">
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Crie uma password">
        </div>

        <div class="form-group">
            <label for="confirmar_password">Confirmar Password</label>
            <input type="password" id="confirmar_password" name="confirmar_password" placeholder="Repita a password">
        </div>

        <div class="buttons">
            <button type="submit" class="btn-registar">Criar Conta</button>
            <a href="login.php" class="btn-login">Já tenho conta</a>
        </div>

    </form>
    </div>
 
</body>
</html>