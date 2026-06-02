<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/tarefas.css">
    <title>Visualizar e marcar tarefas</title>
</head>
<body>
 
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
 
        <!-- Cabeçalho -->
        <div class="page-header">
            <h1>Atribuição de Tarefas</h1>
        </div>
 
        <!-- Formulário de nova tarefa -->
        <div class="card">
            <h2>Nova Tarefa</h2>
 
            <form action="tarefas.php" method="POST">
 
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" rows="3" placeholder="Descreva a tarefa a realizar..."></textarea>
                </div>
 
                <div class="form-row">
                    <div class="form-group">
                        <label for="auxiliar">Auxiliar Responsável</label>
                        <select id="auxiliar" name="auxiliar">
                            <option value="">-- Selecione --</option>
                            <option value="aux1">Auxiliar 1</option>
                            <option value="aux2">Auxiliar 2</option>
                            <option value="aux3">Auxiliar 3</option>
                        </select>
                    </div>
 
                    <div class="form-group">
                        <label for="prioridade">Prioridade</label>
                        <select id="prioridade" name="prioridade">
                            <option value="">-- Selecione --</option>
                            <option value="baixa">Baixa</option>
                            <option value="media">Média</option>
                            <option value="alta">Alta</option>
                        </select>
                    </div>
 
                    <div class="form-group">
                        <label for="data_limite">Data Limite</label>
                        <input type="date" id="data_limite" name="data_limite">
                    </div>
                </div>
 
                <div class="form-actions">
                    <button type="submit" class="btn-atribuir">Atribuir Tarefa</button>
                </div>
 
            </form>
        </div>
 
        <!-- Tabela de tarefas atribuídas -->
        <div class="card">
            <h2>Tarefas Atribuídas</h2>
 
            <table class="tabela-tarefas">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Auxiliar</th>
                        <th>Prioridade</th>
                        <th>Data Limite</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Limpar e preparar a sala 3</td>
                        <td>Auxiliar 1</td>
                        <td><span class="prioridade alta">Alta</span></td>
                        <td>10/06/2025</td>
                        <td><span class="estado pendente">Pendente</span></td>
                    </tr>
                    <tr>
                        <td>Repor material de escritório</td>
                        <td>Auxiliar 2</td>
                        <td><span class="prioridade media">Média</span></td>
                        <td>12/06/2025</td>
                        <td><span class="estado em-curso">Em Curso</span></td>
                    </tr>
                    <tr>
                        <td>Transportar equipamento para bloco B</td>
                        <td>Auxiliar 3</td>
                        <td><span class="prioridade baixa">Baixa</span></td>
                        <td>15/06/2025</td>
                        <td><span class="estado concluida">Concluída</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
 
        <!-- Botão voltar -->
        <a href="main.php" class="btn-voltar">← Voltar ao início</a>
 
    </div>
 
    <!-- Rodapé -->
    <footer class="rodape">
        <span>Hospital Saúde</span>
        <span>hospital@email.com | 351 773 355 11</span>
    </footer>
 
</body>
</html>