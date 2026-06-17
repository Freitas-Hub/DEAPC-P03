<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/info.css">
    <title>Informações Pessoais</title>
</head>
<body>
 <?php
    require "db.php";
    session_start();

    $id = $_SESSION["id_util"];
    // buscar informações à base de dados
    //Nome, apelido, data, genero, nif, telefone, morada, localidade
    $query = "SELECT nome, id_tipo, apelido, telefone, email, nif, genero, data_nascimento FROM `utilizadores` WHERE id_util = $id";

    $result = $conn->query($query); 
    if ($result && $result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();

        $nome = $row['nome'];
        $id_tipo = $row['id_tipo'];

        switch ($id_tipo[0]) {

            case "A":

                switch ($id_tipo) {
                    case "ADM":
                        $id_tipo = "Administrador";
                        break;

                    case "AH1":
                        $id_tipo = "Auxiliar de Limpeza Hospitalar";
                        break;

                    case "AH2":
                        $id_tipo = "Auxiliar de Apoio Clínico";
                        break;

                    case "AH3":
                        $id_tipo = "Auxiliar de Logística Hospitalar";
                        break;
                }

                break;

            case "E":

                if ($id_tipo == "EF") {
                    $id_tipo = "Enfermeira";
                }

                break;

            case "M":

                $id_tipo = "Médico";

                switch ($row['id_tipo'][1]) {
                    case "C":
                        $id_tipo .= " Cardiologista";
                        break;

                    case "G":
                        $id_tipo .= " Generalista";
                        break;

                    case "P":
                        $id_tipo .= " de Pediatria";
                        break;
                }

                break;

            case "P":

                $id_tipo = "Paciente";
                break;
        }
        $apelido = $row['apelido'];
        if (is_null($row['telefone']) || $row['telefone'] == "")
        {
            $telefone = $row['telefone'];
        }
        else{
            $telefone = 'Incompleto';
        }
        $email = $row['email'];

        if (is_null($row['email']))
        {
            $email = $row['email'];
        }
        else{
            $email = "Incompleto";
        }

        $nif = $row['nif'];
        $genero = $row['genero'];
        $data_nascimento = $row['data_nascimento'];
    

    }

?>
    <!-- Barra de navegação -->
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="images/logo.png" alt="Logotipo">
        </div>
        <ul class="navbar-links">
             <li><a href="historia.php">A Nossa História</a></li>
            <li><a href="socios.php">O nosso Ecossistema</a></li>
            <li><a href="parcerias.php">As nossas Parcerias</a></li>
            <li><a href="medicos.php">A nossa Equipa</a></li>
        </ul>
    </nav>
 
    <div class="page">
 
        <!-- Cabeçalho -->
        <div class="page-header">
            <h1>INFORMAÇÕES PESSOAIS</h1>
        </div>
 
    <div class="imagem-topo">
        <div class="imagem-topo-logo5">
            <img src="images/hospital.png" alt="Hospital">
        </div>
    </div>

        <!-- Cartão com foto e nome -->
        <div class="card perfil">
            <div class="perfil-foto">
                <img src="images/Sabrina_Carpenter.png" alt="Foto do Utilizador">
            </div>
            <div class="perfil-nome">
                <h2><?php echo $nome . " " . $apelido ?></h2>
                <p><?php echo $id_tipo ?></p>
            </div>
        </div>
 
        <!-- Informações pessoais -->
        <div class="card">
            <h3>DADOS PESSOAIS</h3>

            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Data de Nascimento</span>
                    <span class="info-valor"><?php echo $data_nascimento  ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Género</span>
                    <span class="info-valor"><?php echo $genero  ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">NIF</span>
                    <span class="info-valor"><?php echo $nif  ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Número de Telefone</span>
                    <span class="info-valor"><?php echo $telefone  ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Email</span>
                    <span class="info-valor"><?php echo $email ?></span>
                </div>
            </div>
        </div>
 
        <!-- Botões de ação -->
        <div class="acoes">
            <a href="main.php" class="btn-voltar">← Voltar ao início</a>
        </div>
 
    </div>
 
    <!-- Rodapé -->
    <footer class="rodape">
        <span>Hospital Saúde</span>
        <span>hospital@email.com | 351 773 355 11</span>
    </footer>
 
</body>
</html>