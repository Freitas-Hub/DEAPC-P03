<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">    <title>O NOSSO P03!</title>
</head>
<body>
    <?php
        require "db.php";
        session_start();
        $id_util = $_SESSION["id_util"];
        $nome = $_SESSION["nome"];
        $apelido = $_SESSION["apelido"];
        $id_tipo = $_SESSION["id_tipo"];
        $query = "";
        if ($id_tipo == "PC") // é paciente
        {
            $query = "SELECT 
            u.nome AS nome,
            u.apelido AS apelido,
            tu.descricao AS especializacao,
            c.data AS data
            FROM consultas c
            INNER JOIN utilizadores u ON c.id_medico = u.id_util
            INNER JOIN tipo_util tu ON u.id_tipo = tu.id_tipo
            WHERE c.id_paciente = $id_util
            ORDER BY c.data ASC";

        }
        else if (!empty($id_tipo) && $id_tipo[0] == "M") // é médico
        {
            $query = "SELECT 
            p.nome AS nome,
            p.apelido AS apelido,
            c.data AS data
            FROM consultas c
            INNER JOIN utilizadores p ON c.id_paciente = p.id_util
            WHERE c.id_medico = 1";  
        }
        

        if ($query != "")
        {
            $result = $conn->query($query);
            echo $conn->error;
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
 
    <div class="page">
 
        <!-- Cabeçalho de boas-vindas -->
        <div class="boas-vindas">
            <h1>Bem-vindo, <?php echo $_SESSION["nome"] . " " . $_SESSION["apelido"]; ?></h1> <!-- esta página sera universal a todo o tipo de utilizadores, desde médicos a utentes... -->
        </div>
 
        <!-- Secção superior: próximas marcações + cartão do utente -->
        <div class="secao-superior">
 
            <!-- Próximas marcações -->
            <div class="card marcacoes">
                <h2>Próximas Marcações</h2>
                <table>
                    <tr>
                        <td>03/05</td>
                        <td>16:20</td>
                        <td>Consulta de Medicina Geral</td>
                    </tr>
                    <?php 
                        if (isset($result)) {
                            if ($id_tipo[0] == "M") {
                                while ($linha = $result->fetch_assoc()) 
                                {
                                echo "<tr>";
                                echo "<td>" . date('d/m', strtotime($linha['data'])) . "</td>";
                                echo "<td>" . date('H:i', strtotime($linha['data'])) . "</td>";
                                echo "<td>" . $linha['nome'] . " " . $linha['apelido'] . "</td>";
                                echo "</tr>";
                                }
                            }
                            else if($id_tipo[0] == "P") {
                                while ($linha = $result->fetch_assoc()) 
                                {
                                    
                                    echo "<tr>";
                                    echo "<td>" . date('d/m', strtotime($linha['data'])) . "</td>";
                                    echo "<td>" . date('H:i', strtotime($linha['data'])) . "</td>";
                                    echo "<td>" . $linha['descricao'] . " - " . $linha['nome'] . " " . $linha['apelido'] . "</td>";
                                    echo "</tr>";

                                }
                            }
                                
                        }
                        // função para chamar marcacoes da vista correta(paciente,médico,etc)
                    ?>
                </table>
            </div>
 
            <!-- Cartão do utente -->
            <div class="card cartao-utente">
                <div class="utente-foto">
                    <img src="images/foto_perfil.jpg" alt="Foto do Utente">
                </div>
                <div class="utente-info">
                    <p><strong>Utilizador Real</strong></p>
                    <p>Idade: 45 anos</p>
                    <p>Sexo: Feminino</p>
                    <p>CC: 123456789</p>
                </div>
            </div>

        </div>
 
        <!-- Botões de navegação -->
        <div class="secao-botoes">
            <a href="marcacoes.php" class="btn-nav">Consultas</a>
            <a href="Info.php" class="btn-nav">Informações Pessoais</a>
            <a href="historico.php" class="btn-nav">Historial Médico</a>
            <a href="prescricoes.php" class="btn-nav">Prescrições Médicas</a>
            <a href="faturas.php" class="btn-nav">Faturas</a>
        </div>
 
    </div>

    <!-- Rodapé -->
    <footer class="rodape">
        <span>Hospital Saúde</span>
        <span>hospital@email.com | 351 773 355 11</span>
    </footer>
 
</body>
</html>