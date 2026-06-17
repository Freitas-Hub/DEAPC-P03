<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/marcacoes.css">
    <title>Ver & Marcar Consultas e Exames</title>
</head>
<body>
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
                        <th>Hora</th>
                        <th>Médico</th>
                        <th>Especialidade</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemplo de consulta passada -->
                    <tr class="passada">
                        <td>03/05/2026</td>
                        <td>16:20</td>
                        <td>Dr. João Silva</td>
                        <td>Medicina Geral</td>
                    </tr>
                    <!-- Exemplo de consulta futura -->
                    <tr class="passada">
                        <td>25/05/2026</td>
                        <td>10:00</td>
                        <td>Dra. Ana Ferreira</td>
                        <td>Cardiologia</td>
                    </tr>
                    <tr class="futura">
                        <td>10/07/2026</td>
                        <td>14:30</td>
                        <td>Dr. Rui Santos</td>
                        <td>Ortopedia</td>
                    </tr>
                    <tr class="futura">
                        <td>11/07/2026</td>
                        <td>11:30</td>
                        <td>Dr. Rui Santos</td>
                        <td>Ortopedia</td>
                    </tr>
                    <tr class="futura">
                        <td>22/10/2026</td>
                        <td>16:45</td>
                        <td>Dr. João silva</td>
                        <td>Medicina Geral</td>
                    </tr>
                    <!-- Linha vazia como placeholder -->
                    <tr class="vazia">
                        <td colspan="4">Sem mais consultas registadas.</td>
                    </tr>
                </tbody>
            </table>
        </div>


    <div id="popupConsulta" class="popup">
        <div class="popup-content">

            <h2>Nova Consulta</h2>

            <form id="formConsulta">

                <label>Especialidade</label>
                <select id="especialidade" required>
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
                <input type="date" id="dataConsulta" required>

                <label>Hora</label>
                <input type="time" id="horaConsulta" required>

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

    document
    .getElementById("formConsulta")
    .addEventListener("submit", function(e){

        e.preventDefault();

        const especialidade =
            document.getElementById("especialidade").value;

        const data =
            document.getElementById("dataConsulta").value;

        const hora =
            document.getElementById("horaConsulta").value;

        if (!especialidade) {
            alert("Selecione uma especialidade.");
            return;
        }

        if (!data) {
            alert("Selecione uma data.");
            return;
        }

        if (!hora) {
            alert("Selecione uma hora.");
            return;
        }

        const medico = "Dr. João Silva";

        const d = new Date(data);

        const dataFormatada =
            String(d.getDate()).padStart(2,"0")
            + "/"
            + String(d.getMonth()+1).padStart(2,"0")
            + "/"
            + d.getFullYear();

        const novaLinha =
            document.createElement("tr");

        novaLinha.classList.add("futura");

        novaLinha.innerHTML = `
            <td>${dataFormatada}</td>
            <td>${hora}</td>
            <td>${medico}</td>
            <td>${especialidade}</td>
        `;

        const tbody =
            document.querySelector(
                ".tabela-consultas tbody"
            );

        const linhaVazia =
            document.querySelector(".vazia");

        tbody.insertBefore(
            novaLinha,
            linhaVazia
        );

        linhaVazia.style.display = "none";

        popup.style.display = "none";

        this.reset();

        aplicarFiltros();

        alert("Consulta marcada com sucesso!");
    });

    aplicarFiltros();

});

    </script>

</body>
</html>