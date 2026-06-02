<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/consultas.css">
    <title>Ver & Marcar Consultas</title>
</head>
<body>
    <!-- Barra de navegação -->
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="images/logo.png" alt="Logotipo">
        </div>
        <ul class="navbar-links">
            <li><a href="historia.html">História</a></li>
            <li><a href="socios.html">Sócios</a></li>
            <li><a href="parcerias.html">Parcerias</a></li>
            <li><a href="medicos.html">Médicos da Casa</a></li>
        </ul>
    </nav>
 
    <div class="page">
 
        <!-- Cabeçalho da página -->
        <div class="page-header">
            <h1>Consultas</h1>
            <a href="marcar_consulta.html" class="btn-marcar">+ Marcar Consulta</a>
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
        <a href="main.html" class="btn-voltar">← Voltar ao início</a>
 
    </div>
 
    <!-- Rodapé -->
    <footer class="rodape">
        <span>Hospital Saúde</span>
        <span>hospital@email.com | 351 773 355 11</span>
    </footer>
 
</body>
</html>