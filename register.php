<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/register.css">
    <title>Registar Conta</title>
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
 
    <div class="container">
        <h1>Criar Conta</h1>
        <p class="subtitulo">Preencha os dados para se registar como utente</p>
 
        <form action="register.php" method="POST">
 
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" placeholder="O seu nome completo">
            </div>
 
            <div class="form-row">
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" id="data_nascimento" name="data_nascimento">
                </div>
 
                <div class="form-group">
                    <label for="genero">Género</label>
                    <select id="genero" name="genero">
                        <option value="">-- Selecione --</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="outro">Outro</option>
                        <option value="nao_especificado">Prefiro não especificar</option>
                    </select>
                </div>
            </div>
 
            <div class="form-group">
                <label for="nif">NIF</label>
                <input type="text" id="nif" name="nif" placeholder="123456789" maxlength="9">
            </div>
 
            <div class="form-group">
                <label for="telefone">Número de Telefone</label>
                <input type="tel" id="telefone" name="telefone" placeholder="9XXXXXXXX" maxlength="9">
            </div>
 
            <div class="form-group">
                <label for="morada">Morada</label>
                <input type="text" id="morada" name="morada" placeholder="Rua, número, andar">
            </div>
 
            <div class="form-group">
                <label for="localidade">Localidade</label>
                <input type="text" id="localidade" name="localidade" placeholder="Ex: Porto">
            </div>
 
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="exemplo@email.com">
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
                <a href="login.html" class="btn-login">Já tenho conta</a>
            </div>
 
        </form>
    </div>
 
</body>
</html>