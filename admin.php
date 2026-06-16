<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAINEL DE ADMINISTRAÇÃO</title>
    <link rel="stylesheet" href="styles/admin.css">

</head>
<body>
<?php
    require "db.php";

    require "scripts/funcs_admin.php";
    session_start();
    $id_tipo = $_SESSION["id_tipo"];
    if($id_tipo == "ADM")
    {   
        // O utilizador é um administrador, pode aceder à página
    }
    else
    {
        // O utilizador não é um administrador, redirecionar para a página de login
        header("Location: login.php");
        exit();

    }
?>
    <header>
        <h1>PAINEL DE ADMINISTRADOR</h1>
    </header>

    <div class="layout">

        <nav class="sidebar">
            <ul>
                <li><a href="adm/users.php">Utilizadores</a></li>
                <li><a href="#">Tipos de Utilizadores</a></li>
                <li><a href="#">Tarefas</a></li>
                <li><a href="#">Consultas</a></li>
            </ul>
        </nav>

        <main class="container">

        <section class="card">
            <div class="card-header">
                <h2>CRIAÇÃO DE UTILIZADORES</h2>
                <button class="btn-toggle" id="btnToggleForm" onclick="toggleForm()" aria-expanded="true" aria-controls="formContainer">
                    <i class="ti ti-chevron-up toggle-icon" id="toggleIcon" aria-hidden="true"></i>
                    Recolher
                </button>
            </div>
            <div class="form-container" id="formContainer">
            <form method="POST" action="scripts/insert_user.php">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="genero">Tipo</label>
                            <select id="genero" name="tipo">
                                <option value="">-- Selecione --</option>
                                <?php
                                    Get_Types($conn);
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" placeholder="Primeiro nome">
                        </div>

                        <div class="form-group">
                            <label for="apelido">Apelido</label>
                            <input type="text" id="apelido" name="apelido" placeholder="Último nome">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="tel" id="email" name="email" placeholder="teuemail@gmail.com" maxlength="90">
                    </div>

                    <div class="form-group">
                        <label for="telefone">Número de Telefone</label>
                        <input type="tel" id="telefone" name="telefone" placeholder="9XXXXXXXX" maxlength="9">
                    </div>

                    <div class="form-group">
                        <label for="num_utente">Número de Utente</label>
                        <input type="text" id="num_utente" name="num_utente" maxlength="9" placeholder="Número de Utente">
                    </div>

                    <div class="form-group">
                        <label for="nif">NIF</label>
                        <input type="text" id="nif" name="nif" maxlength="9" placeholder="123456789">
                    </div>

                    <div class="form-group">
                        <label for="cartao_cidadao">Número do Cartão de Cidadão</label>
                        <input type="text" id="cartao_cidadao" name="cartao_cidadao" maxlength="9" placeholder="Número do CC">
                    </div>

                    <div class="form-group">
                        <label for="seguranca_social">Número da Segurança Social</label>
                        <input type="text" id="seguranca_social" name="seguranca_social" maxlength="11" placeholder="Número da Segurança Social">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="genero">Género</label>
                            <select id="genero" name="genero">
                                <option value="">-- Selecione --</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="O">Outro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" id="data_nascimento" name="data_nascimento">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Crie uma password">
                    </div>

                    <div class="form-group">
                        <label for="confirmar_password">Confirmar Password</label>
                        <input type="password" id="confirmar_password" name="confirmar_password" placeholder="Repita a password">
                    </div>

                    <div class="buttons">
                        <button type="submit" class="btn-registar">Criar Conta</button>
                    </div>
                </form>
            </div>
            </section>


            <section class="card">
                <h2>Registos de Login</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Utilizador</th>
                            <th>Função</th>
                            <th>Data/Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            Registos($conn);
                        ?>
                    </tbody>
                </table>
            </section>
        </main>

    </div>

<script>
function toggleForm() {
    const container = document.getElementById('formContainer');
    const icon = document.getElementById('toggleIcon');
    const btn = document.getElementById('btnToggleForm');
    const isExpanded = btn.getAttribute('aria-expanded') === 'true';

    if (isExpanded) {
        container.style.maxHeight = container.scrollHeight + 'px';
        requestAnimationFrame(() => {
            container.style.maxHeight = '0';
            container.style.opacity = '0';
        });
        icon.style.transform = 'rotate(180deg)';
        btn.setAttribute('aria-expanded', 'false');
        btn.querySelector('.ti').className = 'ti ti-chevron-down toggle-icon';
        btn.lastChild.textContent = ' Expandir';
    } else {
        container.style.maxHeight = container.scrollHeight + 'px';
        container.style.opacity = '1';
        setTimeout(() => container.style.maxHeight = 'none', 400);
        icon.style.transform = 'rotate(0deg)';
        btn.setAttribute('aria-expanded', 'true');
        btn.querySelector('.ti').className = 'ti ti-chevron-up toggle-icon';
        btn.lastChild.textContent = ' Recolher';
    }
}
</script>

</body>
</html>