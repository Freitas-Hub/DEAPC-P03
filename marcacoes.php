<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/marcacoes.css">
    <title>Ver & Marcar Consultas e Exames</title>
</head>

<body>

<?php
        session_start();
        require "db.php";
        $id_util = $_SESSION["id_util"];
        $id_tipo = $_SESSION["id_tipo"];
        $hoje = date('Y-m-d');
        $resultado = "";
        if($id_tipo[0] == "P")
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
            $resultado = mysqli_query($conn, $query);
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

    <div class="imagem-topo">
        <div class="imagem-topo-logo5">
            <img src="images/hospital.png" alt="Hospital">
        </div>
    </div>

    <div class="page">
 
        <!-- Cabeçalho da página -->
        <div class="page-header">
            <h1>MARCAÇÕES</h1>
            <button id="btnMarcar" class="btn-marcar">+ Marcar Consulta</button>
        </div>
 
        <!-- Filtros -->
        <div class="filtros">
            <button class="filtro ativo" data-tempo="todas">Todas</button>
            <button class="filtro" data-tempo="passadas">Passadas</button>
            <button class="filtro" data-tempo="futuras">Futuras</button>
        </div>
 
        <!-- Tabela de consultas -->
        <div class="card">
            <table class="tabela-consultas">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Médico</th>
                        <th>Especialidade</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                    while ($consulta = mysqli_fetch_assoc($resultado))
                    {
                    echo "<tr>";
                    echo "<td>" . $consulta["data"] . "</td>";
                    echo "<td>" . $consulta['nome'] . "</td>";
                    echo "<td>" . $consulta['descricao'] . "</td>";
                    echo "</tr>";
                    }
                ?>
            
                </tbody>
            </table>
        </div>


    <div id="popupConsulta" class="popup">
        <div class="popup-content">

            <h2>Nova Consulta</h2>

            <form id="formConsulta" action="marcar_consulta.php" method="POST">

                <label>Especialidade</label>
                <select id="especialidade" name="especialidade" required>
                    <option value="">Selecione...</option>
                    <option>Cardiologia</option>
                    <option>Dermatologia</option>
                    <option>Genicologia</option>
                    <option>Medicina Geral</option>
                    <option>Neurologia</option>
                    <option>Obstetrícia</option>
                    <option>Ortopedia</option>
                    <option>Pediatria</option>
                    <option>Urologia</option>
                </select>

                <label>Data</label>
                <input type="date" id="dataConsulta" name="data" required>


                <button type="submit">Marcar</button>

            </form>

        </div>

        <span id="fecharPopup" class="fechar">&times;</span>

    </div>



        <!-- Botão voltar -->
        <a href="main.php" class="btn-voltar">← Voltar ao início</a>
 
    </div>
 
    <!-- Rodapé -->
    <footer class="rodape">
        <span>Hospital Dos Cromos Exemplares</span>
        <span>hospitaldoscromos1da@email.com | +351 773 355 11</span>
    </footer>

    <script>
document.addEventListener("DOMContentLoaded", () => {

    // ===== POPUP =====

    const popup = document.getElementById("popupConsulta");
    const btnMarcar = document.getElementById("btnMarcar");
    const fecharPopup = document.getElementById("fecharPopup");

    btnMarcar.addEventListener("click", () => {
        popup.style.display = "block";
    });

    fecharPopup.addEventListener("click", () => {
        popup.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target === popup) {
            popup.style.display = "none";
        }
    });

    // ===== FILTROS =====

    const btnsTempo = document.querySelectorAll("[data-tempo]");

    function aplicarFiltros() {

        const filtroAtivo =
            document.querySelector(".filtro.ativo").dataset.tempo;

        const linhas =
            document.querySelectorAll(
                ".tabela-consultas tbody tr:not(.vazia)"
            );

        let visiveis = 0;

        linhas.forEach((linha) => {

            const passada =
                linha.classList.contains("passada");

            const futura =
                linha.classList.contains("futura");

            let mostrar = true;

            if (filtroAtivo === "passadas") {
                mostrar = passada;
            }

            if (filtroAtivo === "futuras") {
                mostrar = futura;
            }

            linha.style.display =
                mostrar ? "" : "none";

            if (mostrar) {
                visiveis++;
            }
        });

        const linhaVazia =
            document.querySelector(".vazia");

        if (linhaVazia) {
            linhaVazia.style.display =
                visiveis === 0 ? "" : "none";
        }
    }

    btnsTempo.forEach((btn) => {

        btn.addEventListener("click", () => {

            btnsTempo.forEach((b) =>
                b.classList.remove("ativo")
            );

            btn.classList.add("ativo");

            aplicarFiltros();
        });

    });

    // ===== NOVA CONSULTA =====

    
    aplicarFiltros();

});

    </script>

</body>
</html>