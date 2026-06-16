<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <title>PÁGINA PRINCIPAL</title>
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
        if (!empty($id_tipo) && $id_tipo[0] == "M")
        {
            $query = "SELECT 
            p.nome AS nome,
            p.apelido AS apelido,
            c.data AS data
            FROM consultas c
            INNER JOIN utilizadores p ON c.id_paciente = p.id_util
            WHERE c.id_medico = 1";
        }
        else
        {
            $query = "SELECT 
            u.nome AS nome,
            u.apelido AS apelido,
            tu.descricao AS descricao,
            c.data AS data
            FROM consultas c
            INNER JOIN utilizadores u ON c.id_medico = u.id_util
            INNER JOIN tipo_util tu ON u.id_tipo = tu.id_tipo
            WHERE c.id_paciente = $id_util
            ORDER BY c.data ASC";
        }


        if ($query != "")
        {
            $result = $conn->query($query);
            echo $conn->error;
        }

        // Passa o tipo de utilizador ao JS
        $id_tipo_js = json_encode($id_tipo);
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

        <!-- Cabeçalho de boas-vindas -->
        <div class="boas-vindas">
            <h1>Bem-vindo/a, <?php echo $_SESSION["nome"] . " " . $_SESSION["apelido"]; ?></h1>
        </div>

        <!-- Secção superior: próximas marcações + cartão do utente -->
        <div class="secao-superior">

            <!-- Próximas marcações -->
            <div class="card marcacoes">
                <h2>Próximas Marcações:</h2>
                <table id="tabela-marcacoes">
                    <?php 
                        if (isset($result)) {
                            if ($result->num_rows == 0) {
                                echo "<tr><td colspan='3' style='text-align: center;'>Não há consultas</td></tr>";
                            }
                            if ($id_tipo[0] == "M") {
                                while ($linha = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . date('d/m', strtotime($linha['data'])) . "</td>";
                                    echo "<td>" . date('H:i', strtotime($linha['data'])) . "</td>";
                                    echo "<td>" . $linha['nome'] . " " . $linha['apelido'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                            else {
                                while ($linha = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . date('d/m', strtotime($linha['data'])) . "</td>";
                                    echo "<td>" . date('H:i', strtotime($linha['data'])) . "</td>";
                                    echo "<td>" . $linha['descricao'] . " - " . $linha['nome'] . " " . $linha['apelido'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    ?>
                </table>
            </div>

            <!-- Cartão do utente -->
            <div class="card cartao-utente">
                <div class="utente-foto">
                    <img src="images/Sabrina_Carpenter.jpg" alt="Foto do Utente">
                </div>
                <div class="utente-info">
                    <p><strong><php> Sabrina Carpenter</php></strong></p>
                    <p>Idade: 27 anos</p>
                    <p>Sexo: Feminino</p>
                    <p>CC: 300000009</p>
                    <p>Nº Utente: 100000009</p>
                </div>
            </div>

        </div>

        <!-- Botões de navegação (gerados dinamicamente por JS conforme o tipo de utilizador) -->
        <div class="secao-botoes" id="secao-botoes">
            <!-- Preenchido pelo JavaScript -->
        </div>

    </div>

    <!-- Rodapé -->
    <footer class="rodape">
        <span>Hospital Dos Cromos Exemplares</span>
        <span>hospitaldoscromos1da@email.com | +351 773 355 11</span>
    </footer>

    <script>
        // Tipo de utilizador vindo do PHP
        const idTipo = <?php echo $id_tipo_js; ?>;

        // ---------------------------------------------------
        // 1. BOTÕES DE NAVEGAÇÃO DINÂMICOS (Exercício 4)
        //    Cada user story tem o seu botão conforme o perfil
        // ---------------------------------------------------
        const botoes = document.getElementById("secao-botoes");

        // Botões comuns a todos os utilizadores autenticados
        const botoesComuns = [
            { label: "Informações Pessoais", href: "Info.php" },   // UTE01
            { label: "Marcações",            href: "marcacoes.php"   }, // UTE05
            { label: "Historial Médico",     href: "historico.php"   },
        ];

        // Botões exclusivos de utentes (PC / P*)
        const botoesUtente = [
            { label: "Prescrições Médicas",  href: "prescricoes.php" }, // UTE04
            { label: "Faturas",              href: "faturas.php"     }, // UTE06
        ];

        const botoesEF = [
            {label: "Tarefas", href: "tarefas.php"},
        ];

        const botoesAUX = [
            {label: "Tarefas A Realizar", href: "tarefas.php"},
        ];


        function renderBotoes(lista) {
            lista.forEach(function(b) {
                const a = document.createElement("a");
                a.href = b.href;
                a.className = "btn-nav";
                a.textContent = b.label;
                botoes.appendChild(a);
            });
        }

        // Renderiza os botões conforme o perfil do utilizador
        renderBotoes(botoesComuns);

        if (idTipo && idTipo === "PC") {
            // Utente (PC ou P*)
            renderBotoes(botoesUtente);
        }
        else if(idTipo[0] === "A")
        {
            renderBotoes(botoesAUX);
        }
        else if(idTipo === "EF")
        {
            renderBotoes(botoesEF);
        }

        // ---------------------------------------------------
        // 2. DESTAQUE DA PRÓXIMA MARCAÇÃO (UX para UTE05/MD06)
        //    Realça a primeira linha da tabela (mais próxima)
        // ---------------------------------------------------
        const tabela = document.getElementById("tabela-marcacoes");
        if (tabela) {
            const primeiraLinha = tabela.querySelector("tr");
            if (primeiraLinha) {
                primeiraLinha.classList.add("proxima-marcacao");
            }
        }
    </script>

</body>
</html>