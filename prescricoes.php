<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/prescricoes.css">
    <title>Visualizar prescrições - Visão Utente</title> <!-- esta página é apenas para utentes, médicos e enfermeiros terão uma visão diferente -->
</head>

<script>
    // Determina o estado de cada linha com base na data de validade
    document.querySelectorAll(".tabela-prescricoes tbody tr").forEach(function(linha) {
        const celulas = linha.querySelectorAll("td");
        if (celulas.length < 6) return;

        // Validade está na 6ª coluna (índice 5) — formato DD/MM/YYYY
        const partes = celulas[5].textContent.trim().split("/");
        const validade = new Date(partes[2], partes[1] - 1, partes[0]);
        const hoje = new Date();
        hoje.setHours(0, 0, 0, 0);

        const spanEstado = linha.querySelector(".estado");
        if (!spanEstado) return;

        if (validade >= hoje) {
            spanEstado.textContent = "Ativa";
            spanEstado.className = "estado ativa";
        } else {
            spanEstado.textContent = "Expirada";
            spanEstado.className = "estado expirada";
        }
    });

    // Filtra as linhas conforme o botão clicado
    function filtrarPrescricoes(filtro) {
        document.querySelectorAll(".filtro").forEach(function(btn) {
            btn.classList.remove("ativo");
        });
        event.target.classList.add("ativo");

        document.querySelectorAll(".tabela-prescricoes tbody tr").forEach(function(linha) {
            const estado = linha.querySelector(".estado");
            if (!estado) return;

            if (filtro === "todas") {
                linha.style.display = "";
            } else if (estado.classList.contains(filtro)) {
                linha.style.display = "";
            } else {
                linha.style.display = "none";
            }
        });
    }

        document.querySelectorAll(".tabela-prescricoes tbody tr").forEach(function(linha) {
        const celulas = linha.querySelectorAll("td");
        if (celulas.length < 6) return;

        const textoValidade = celulas[5].textContent.trim();
        const partes = textoValidade.split("/");
    
        console.log("Validade lida:", textoValidade, "| Partes:", partes);

        const validade = new Date(parseInt(partes[2]), parseInt(partes[1]) - 1, parseInt(partes[0]));
    
        const hoje = new Date();
        hoje.setHours(0, 0, 0, 0);
        validade.setHours(0, 0, 0, 0);

        console.log("Data validade:", validade, "| Hoje:", hoje, "| Expirada:", validade < hoje);

        const spanEstado = linha.querySelector(".estado");
        if (!spanEstado) return;

        if  (validade >= hoje) {
            spanEstado.textContent = "Ativa";
            spanEstado.className = "estado ativa";
        } else {
            spanEstado.textContent = "Expirada";
            spanEstado.className = "estado expirada";
        }
    });

</script>

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
 
        <!-- Cabeçalho -->
        <div class="page-header">
            <h1>PRESCRIÇÕES MÉDICAS</h1>
        </div>
 
    <div class="filtros">
        <button class="filtro ativo" onclick="filtrarPrescricoes('todas')">Todas</button>
        <button class="filtro" onclick="filtrarPrescricoes('ativa')">Ativas</button>
        <button class="filtro" onclick="filtrarPrescricoes('expirada')">Expiradas</button>
    </div>
 
        <div class="visao-utente">
 
 
            <!-- Lista de prescrições -->
            <div class="card">
                <table class="tabela-prescricoes">
                    <thead>
                        <tr>
                            <th>Medicamento</th>
                            <th>Dosagem</th>
                            <th>Frequência</th>
                            <th>Médico</th>
                            <th>Data</th>
                            <th>Validade</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Paracetamol</td>
                            <td>500mg</td>
                            <td>3x por dia</td>
                            <td>Dr. João Silva</td>
                            <td>01/05/2022</td>
                            <td>01/07/2026</td>
                            <td><span class="estado ativa">Ativa</span></td>
                        </tr>
                        <tr>
                            <td>Amoxicilina</td>
                            <td>875mg</td>
                            <td>2x por dia</td>
                            <td>Dra. Ana Ferreira</td>
                            <td>15/03/2023</td>
                            <td>30/03/2023</td>
                            <td><span class="estado expirada">Expirada</span></td>
                        </tr>
                        <tr>
                            <td>Clotrimazol</td>
                            <td>200mg</td>
                            <td>1x por dia</td>
                            <td>Dra. Carlota Moreira</td>
                            <td>14/01/2020</td>
                            <td>23/04/2020</td>
                            <td><span class="estado expirada">Expirada</span></td>
                        </tr>
                        <tr>
                            <td>Adapaleno</td>
                            <td>100mg</td>
                            <td>2x por dia</td>
                            <td>Dra. Carlota Moreira</td>
                            <td>30/09/2019</td>
                            <td>08/02/2020</td>
                            <td><span class="estado expirada">Expirada</span></td>
                        </tr>
                        <tr>
                            <td>Doxiciclina</td>
                            <td>20 mg</td>
                            <td>2x por dia</td>
                            <td>Dra Ana Melo</td>
                            <td>22/03/2019</td>
                            <td>14/08/2019</td>
                            <td><span class="estado expirada">Expirada</span></td>
                        </tr>
                        <tr>
                            <td>Ibuprofeno</td>
                            <td>400mg</td>
                            <td>1x por dia</td>
                            <td>Dr. Rui Santos</td>
                            <td>10/05/2026</td>
                            <td>10/08/2026</td>
                            <td><span class="estado ativa">Ativa</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
 
        </div>
        <!-- fim visao-utente -->

        <!-- Botão voltar -->
        <a href="main.php" class="btn-voltar">← Voltar ao início</a>
 
    </div>
 
    <!-- Rodapé -->
    <footer class="rodape">
        <span>Hospital Dos Cromos Exemplares</span>
        <span>hospitaldoscromos1da@email.com | +351 773 355 11</span>
    </footer>
 
</body>
</html>