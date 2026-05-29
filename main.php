<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">    <title>O NOSSO P03!</title>
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
 
        <!-- Cabeçalho de boas-vindas -->
        <div class="boas-vindas">
            <h1>Bem-vindo, Utilizador</h1> <!-- esta página sera universal a todo o tipo de utilizadores, desde médicos a utentes... -->
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
                    <tr>
                        <td>- -</td>
                        <td>- -</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>- -</td>
                        <td>- -</td>
                        <td>-</td>
                    </tr>
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
            <a href="consultas.html" class="btn-nav">Consultas</a>
            <a href="Info.html" class="btn-nav">Informações Pessoais</a>
            <a href="historico.html" class="btn-nav">Historial Médico</a>
            <a href="prescricoes.html" class="btn-nav">Prescrições Médicas</a>
            <a href="faturas.html" class="btn-nav">Faturas</a>
        </div>
 
    </div>
 
    <!-- Rodapé -->
    <footer class="rodape">
        <span>Hospital Saúde</span>
        <span>hospital@email.com | 351 773 355 11</span>
    </footer>
 
</body>
</html>