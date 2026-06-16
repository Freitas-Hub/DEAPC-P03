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
            <li><a href="historia.php">A nossa História</a></li>
            <li><a href="socios.php">Os nossos Sócios</a></li>
            <li><a href="parcerias.php">Parcerias establecidas</a></li>
            <li><a href="medicos.php">A nossa Equipa</a></li>
        </ul>
    </nav>
 
    <div class="page">
 
        <!-- Cabeçalho da página -->
        <div class="page-header">
            <h1>MARCAÇÕES</h1>
            <a href="marcar_consulta.php" class="btn-marcar">+ Marcar Consulta</a>
        </div>
 
        <!-- Filtros -->
        <div class="filtros">
            <button class="filtro ativo">Todas</button>
            <button class="filtro">Passadas</button>
            <button class="filtro">Futuras</button>
        </div>
 
        <!-- Tabela de consultas -->
        <div class="card">
            <table class="tabela-consultas">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Médico / Utente</th>
                        <th>Especialidade</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemplo de consulta passada -->
                    <tr class="passada">
                        <td>03/05/2025</td>
                        <td>16:20</td>
                        <td>Dr. João Silva</td>
                        <td>Medicina Geral</td>
                    </tr>
                    <!-- Exemplo de consulta futura -->
                    <tr class="futura">
                        <td>25/06/2025</td>
                        <td>10:00</td>
                        <td>Dra. Ana Ferreira</td>
                        <td>Cardiologia</td>
                    </tr>
                    <tr class="futura">
                        <td>10/07/2025</td>
                        <td>14:30</td>
                        <td>Dr. Rui Santos</td>
                        <td>Ortopedia</td>
                    </tr>
                    <!-- Linha vazia como placeholder -->
                    <tr class="vazia">
                        <td colspan="4">Sem mais consultas registadas.</td>
                    </tr>
                </tbody>
            </table>
        </div>
 
        <!-- Botão voltar -->
        <a href="main.php" class="btn-voltar">← Voltar ao início</a>
 
    </div>
 
    <!-- Rodapé -->
    <footer class="rodape">
        <span>Hospital dos Alunos Exemplares</span>
        <span>hospital@email.com | +351 773 355 11</span>
    </footer>

    <script>

    document.addEventListener("DOMContentLoaded", () => {

    const estado = {
        tempo: "todas",      // "todas" | "passadas" | "futuras"
        tipo: "todas",       // "todas" | "consultas" | "exames"
        perfil: "todas",     // "todas" | "proprias" | "utentes"  (apenas médicos)
    };

    const linhas       = document.querySelectorAll(".tabela-consultas tbody tr:not(.vazia)");
    const linhavazia   = document.querySelector(".tabela-consultas tbody tr.vazia");
    const btnsTempo    = document.querySelectorAll(".filtros .filtro[data-tempo]");
    const btnsTipo     = document.querySelectorAll(".filtros .filtro[data-tipo]");
    const btnsPerfil   = document.querySelectorAll(".filtros .filtro[data-perfil]");

    function aplicarFiltros() {
        let visiveis = 0;

        linhas.forEach((tr) => {
            const Passada  = tr.classList.contains("passada");
            const Futura   = tr.classList.contains("futura");
            const tipo      = tr.dataset.tipo   || "consulta";   // "consulta" | "exame"
            const perfil    = tr.dataset.perfil || "propria";    // "propria"  | "utente"

            let mostraTempo = true;
            if (estado.tempo === "passadas" && !Passada)  mostraTempo = false;
            if (estado.tempo === "futuras"  && !Futura)   mostraTempo = false;

            let mostraTipo = true;
            if (estado.tipo === "consultas" && tipo !== "consulta") mostraTipo = false;
            if (estado.tipo === "exames"    && tipo !== "exame")    mostraTipo = false;

            let mostraPerfil = true;
            if (estado.perfil === "proprias" && perfil !== "propria") mostraPerfil = false;
            if (estado.perfil === "utentes"  && perfil !== "utente")  mostraPerfil = false;

            const visivel = mostraTempo && mostraTipo && mostraPerfil;
            tr.style.display = visivel ? "" : "none";
            if (visivel) visiveis++;
        });

        if (linhavazia) {
            linhavazia.style.display = visiveis === 0 ? "" : "none";
        }
    }

    function ativarBotao(grupo, alvo) {
        grupo.forEach((btn) => btn.classList.toggle("ativo", btn === alvo));
    }

    btnsTempo.forEach((btn) => {
        btn.addEventListener("click", () => {
            estado.tempo = btn.dataset.tempo;
            ativarBotao(btnsTempo, btn);
            aplicarFiltros();
        });
    });

    btnsTipo.forEach((btn) => {
        btn.addEventListener("click", () => {
            estado.tipo = btn.dataset.tipo;
            ativarBotao(btnsTipo, btn);
            aplicarFiltros();
        });
    });

    btnsPerfil.forEach((btn) => {
        btn.addEventListener("click", () => {
            estado.perfil = btn.dataset.perfil;
            ativarBotao(btnsPerfil, btn);
            aplicarFiltros();
        });
    });

    aplicarFiltros();
    });

    </script>

</body>
</html>