<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/prescricoes.css">
    <title>Visualizar prescrições - Visão Utente</title> <!-- esta página é apenas para utentes, médicos e enfermeiros terão uma visão diferente -->
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
 
    <div class="page">
 
        <!-- Cabeçalho -->
        <div class="page-header">
            <h1>Prescrições Médicas</h1>
        </div>
 
        <!-- ============================================================
             VISÃO UTENTE
             Mostra a lista de prescrições atribuídas ao utente.
        ============================================================= -->
 
        <!-- TODO (FUTURO): Controlo de acesso por perfil
             - Se o utilizador autenticado for MÉDICO:
               → Ocultar esta secção (visao-utente)
               → Mostrar a secção (visao-medico) comentada no fundo
             - Se o utilizador autenticado for UTENTE:
               → Mostrar esta secção (visao-utente)
               → Manter a secção (visao-medico) oculta
             Este controlo deverá ser feito via PHP com verificação
             da variável de sessão $_SESSION['perfil']
        -->
 
        <div class="visao-utente">
 
            <!-- Filtros -->
            <div class="filtros">
                <button class="filtro ativo">Todas</button>
                <button class="filtro">Ativas</button>
                <button class="filtro">Expiradas</button>
            </div>
 
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
                            <td>01/05/2025</td>
                            <td>01/06/2025</td>
                            <td><span class="estado ativa">Ativa</span></td>
                        </tr>
                        <tr>
                            <td>Amoxicilina</td>
                            <td>875mg</td>
                            <td>2x por dia</td>
                            <td>Dra. Ana Ferreira</td>
                            <td>15/03/2025</td>
                            <td>30/03/2025</td>
                            <td><span class="estado expirada">Expirada</span></td>
                        </tr>
                        <tr>
                            <td>Ibuprofeno</td>
                            <td>400mg</td>
                            <td>1x por dia</td>
                            <td>Dr. Rui Santos</td>
                            <td>10/05/2025</td>
                            <td>10/08/2025</td>
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