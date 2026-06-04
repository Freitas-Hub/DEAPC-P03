<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/tarefas.css">
    <title>Visualizar e marcar tarefas</title>
</head>
<body>
<?php
    require "db.php";
    //adicionar e mostrar tarefas
    session_start();
    $id_tipo = $_SESSION["id_tipo"];
    $id_util = $_SESSION["id_util"];
    //Chamar todos os auxiliares com o seu id e nome
    $query_auxiliares = "SELECT id_util, nome, apelido FROM utilizadores WHERE id_tipo LIKE 'AH%'";
    $result_auxiliares = mysqli_query($conn, $query_auxiliares);


    //tarefas atribuídas ao auxiliar logado
    $query_tarefas = "SELECT t.resumo, t.data_lim, t.prioridade, u.nome, u.apelido, t.Estado FROM tarefas t JOIN utilizadores u ON t.id_responsavel = u.id_util WHERE t.id_responsavel = $id_util";

    $result = mysqli_query($conn, $query_tarefas);

    if (!$result) {
        die("Erro na query: " . mysqli_error($conn));
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $descricao = $_POST["descricao"];
        $id_auxiliar = $_POST["auxiliar"];
        $prioridade = $_POST["prioridade"];
        $data_limite = $_POST["data_limite"];
        $query_Insert = "INSERT INTO `tarefas`(id_atribuidor, id_responsavel, resumo, data_lim, prioridade) VALUES ('$id_util', '$id_auxiliar', '$descricao', '$data_limite', '$prioridade')";

        // Inserir a nova tarefa na base de dados
        
        if (mysqli_query($conn, $query_Insert)) { //inseridas as informações
        } else {
            echo "Erro ao atribuir tarefa: " . mysqli_error($conn);
        }
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
 
        <!-- Cabeçalho -->
        <div class="page-header">
            <h1>Atribuição de Tarefas</h1>
        </div>
 
        <!-- Formulário de nova tarefa -->
        <?php if($id_tipo == 'EF') { ?>
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
                            <?php
                            while ($linha = mysqli_fetch_assoc($result_auxiliares)) {
                                echo "<option value='" . $linha["id_util"] . "'>" . $linha["nome"] . " " . $linha["apelido"] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
 
                    <div class="form-group">
                        <label for="prioridade">Prioridade</label>
                        <select id="prioridade" name="prioridade">
                            <option value="">-- Selecione --</option>
                            <option value="B">Baixa</option>
                            <option value="M">Média</option>
                            <option value="A">Alta</option>
                        </select>
                    </div>
 
                    <div class="form-group">
                        <label for="data_limite">Data Limite</label>
                        <input type="datetime-local" id="data_limite" name="data_limite">
                    </div>
                </div>
 
                <div class="form-actions">
                    <button type="submit" class="btn-atribuir">Atribuir Tarefa</button>
                </div>
 
            </form>
        </div>
        <?php } ?>
        <!-- Tabela de tarefas atribuídas -->
         <?php
        // Mostrar as tarefas atribuídas ao auxiliar logado
        if($id_tipo[0] == "A"){
        ?>
        <div class="card">
            <h2>Tarefas Atribuídas</h2>
 
            <table class="tabela-tarefas">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Responsável</th>
                        <th>Prioridade</th>
                        <th>Data Limite</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row['resumo'] . "</td>";
                            echo "<td>" . $row['data_lim'] . "</td>";
                            echo "<td>" . $row['prioridade'] . "</td>";
                            echo "<td>" . $row['nome'] . " " . $row['apelido'] . "</td>";
                            echo "<td>" . $row['Estado'] . "</td></tr>";
                            }
                    ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
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