<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/register.css">
    <title>Registar Conta</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") { // vem do forms
        
            require "db.php";

            //verificar se existem utilizadores com as informações inseridas unicas

            // informações essenciais para criar conta  
            $nif = $_POST["nif"];
            $nome = $_POST["nome"];
            $apelido = $_POST["apelido"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];
            $num_utente = $_POST["num_utente"];
            $cartao_cidadao = $_POST["cartao_cidadao"];
            $seguranca_social = $_POST["seguranca_social"];
            $genero = $_POST["genero"];
            $data_nascimento = $_POST["data_nascimento"];
            $password = $_POST["password"];
            $confirmar_password = $_POST["confirmar_password"];

            // verificar se a palavra-passe e a confirmação são iguais
            if ($password !== $confirmar_password) {
                echo "<p class='error'>As passwords não coincidem. Por favor, tente novamente.</p>";
                exit;
            }

            // verificar se existe alguma conta com o mesmo num_utente, nif, cartao_cidadao ou seguranca_social
            $sql = "INSERT INTO utilizadores (nif, nome, apelido, email, telefone, num_utente, ncc, seg_social, genero, data_nascimento, password) 
            VALUES (
            '$nif',
            '$nome',
            '$apelido',
            '$email',
            '$telefone',
            '$num_utente',
            '$cartao_cidadao',
            '$seguranca_social',
            '$genero',
            '$data_nascimento',
            '$password'
            )";

            $result = $conn->query($sql);
            //quero verificar se o insert foi concluido com sucesso
            if ($result === TRUE) {
                echo "<p class='success'>Conta criada com sucesso! Pode agora fazer login.</p>";

                header("refresh:2;url=login.php"); // redirecionar para a página de login após 2 segundos
            } else {
                echo "<p class='error'>Erro ao criar conta: </p>";
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
 
    <div class="imagem-topo">
        <div class="imagem-topo-logo">
            <img src="images/nuvem.png" alt="Nuvem">
        </div>
        <div class="imagem-topo-logo2">
            <img src="images/nuvem.png" alt="Nuvem">
        </div>
        <div class="imagem-topo-logo3">
            <img src="images/nuvem.png" alt="Nuvem">
        </div>
        <div class="imagem-topo-logo4">
            <img src="images/nuvem.png" alt="Nuvem">
        </div>
    </div>

    <div class="container">
        <h1>Criar Conta</h1>
        <p class="subtitulo">Preencha os dados para se registar como utente</p>
 
    <form method="POST">

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
            <a href="login.php" class="btn-login">Já tenho conta</a>
        </div>

    </form>
    </div>

    <script>
    
    document.addEventListener("DOMContentLoaded", () => {

    const form       = document.querySelector("form");
    const btnLogin   = document.querySelector(".btn-login");   //Já tenho conta

    const campos = {
        nome:              document.querySelector("#nome"),
        apelido:           document.querySelector("#apelido"),
        email:             document.querySelector("#email"),
        telefone:          document.querySelector("#telefone"),
        num_utente:        document.querySelector("#num_utente"),
        nif:               document.querySelector("#nif"),
        cartao_cidadao:    document.querySelector("#cartao_cidadao"),
        seguranca_social:  document.querySelector("#seguranca_social"),
        genero:            document.querySelector("#genero"),
        data_nascimento:   document.querySelector("#data_nascimento"),
        password:          document.querySelector("#password"),
        confirmar_password:document.querySelector("#confirmar_password"),
    };

    function mostrarErro(input, mensagem) {
        const anterior = input.parentElement.querySelector(".erro-campo");
        if (anterior) anterior.remove();

        input.classList.add("input-erro");

        const span = document.createElement("span");
        span.className   = "erro-campo";
        span.textContent = mensagem;
        input.insertAdjacentElement("afterend", span);
    }

    function limparErro(input) {
        input.classList.remove("input-erro");
        const span = input.parentElement.querySelector(".erro-campo");
        if (span) span.remove();
    }

    /* Limpar erro ao editar qualquer campo */
    Object.values(campos).forEach((el) => {
        el?.addEventListener("input",  () => limparErro(el));
        el?.addEventListener("change", () => limparErro(el));
    });

    /* ── Regras de validação ── */
    const regras = [
        {
            campo: "nome",
            teste: (v) => v.trim().length >= 2,
            msg:   "Introduza o primeiro nome (mínimo 2 caracteres).",
        },
        {
            campo: "apelido",
            teste: (v) => v.trim().length >= 2,
            msg:   "Introduza o último nome (mínimo 2 caracteres).",
        },
        {
            campo: "email",
            // RFC 5322 simplificado
            teste: (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()),
            msg:   "Introduza um endereço de email válido.",
        },
        {
            campo: "telefone",
            teste: (v) => /^9\d{8}$/.test(v.trim()),
            msg:   "O número de telefone deve ter 9 dígitos e começar por 9.",
        },
        {
            campo: "num_utente",
            teste: (v) => /^\d{9}$/.test(v.trim()),
            msg:   "O número de utente deve ter exactamente 9 dígitos.",
        },
        {
            campo: "nif",
            teste: (v) => /^\d{9}$/.test(v.trim()),
            msg:   "O NIF deve ter exactamente 9 dígitos.",
        },
        {
            campo: "cartao_cidadao",
            teste: (v) => /^\d{8}$/.test(v.trim()),
            msg:   "O número do Cartão de Cidadão deve ter exactamente 8 dígitos.",
        },
        {
            campo: "seguranca_social",
            teste: (v) => /^\d{11}$/.test(v.trim()),
            msg:   "O número da Segurança Social deve ter exactamente 11 dígitos.",
        },
        {
            campo: "genero",
            teste: (v) => v !== "",
            msg:   "Selecione o género.",
        },
        {
            campo: "data_nascimento",
            teste: (v) => {
                if (!v) return false;
                const nascimento = new Date(v);
                const hoje       = new Date();
                // Deve ter pelo menos 1 ano e não ser no futuro
                return nascimento < hoje && (hoje.getFullYear() - nascimento.getFullYear()) >= 1;
            },
            msg:   "Introduza uma data de nascimento válida.",
        },
        {
            campo: "password",
            teste: (v) => v.length >= 6,
            msg:   "A password deve ter pelo menos 6 caracteres.",
        },
    ];
    
    form?.addEventListener("submit", (e) => {
        let valido = true;

        /* Validar cada campo pela sua regra */
        regras.forEach(({ campo, teste, msg }) => {
            const el = campos[campo];
            if (!el) return;

            if (!teste(el.value)) {
                mostrarErro(el, msg);
                valido = false;
            }
        });

        /* Confirmação de password (comparação entre dois campos) */
        const pass    = campos.password?.value;
        const confirm = campos.confirmar_password?.value;

        if (pass && confirm !== pass) {
            mostrarErro(campos.confirmar_password, "As passwords não coincidem.");
            valido = false;
        } else if (pass && confirm === pass) {
            limparErro(campos.confirmar_password);
        }

        if (!valido) {
            e.preventDefault();

            // Fazer scroll até ao primeiro erro visível
            const primeiro = form.querySelector(".input-erro");
            if (primeiro) {
                primeiro.scrollIntoView({ behavior: "smooth", block: "center" });
                primeiro.focus();
            }
        }
    });

    if (btnLogin && btnLogin.tagName !== "A") {
        btnLogin.addEventListener("click", () => {
            window.location.href = "login.php";
        });
    }

    });

    </script>
</body>
</html>