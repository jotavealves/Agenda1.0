<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: black;
            color: white;
        }
        .navbar {
            background-color: #222;
        }
        .nav-link {
            color: white !important;
            transition: all 0.5s ease-in-out;
            border-radius: 5px;
        }
        .nav-link:hover {
            transform: scale(1.15);
            background-color: white !important;
            color: black !important;
        }
        .nav-link.active {
            background-color: #444;
        }
        .form-control {
            background-color: #333;
            color: white;
            border: 1px solid #555;
        }
        .btn-primary {
            background-color: white;
            border-radius: 5px;
            transition: all 0.5s ease-in-out;
            color: black;
        }
        .btn-primary:hover {
            background-color: #01CB1B;
            color: black;
            transform: scale(1.05);
        }
        .navbar-brand {
            transition: all 0.5s ease-in-out;
            color: white;
        }
        .navbar-brand:hover {
            transform: scale(1.10);
            color: white;
        }
        .navbar-nav {
            display: flex;
            gap: 15px;
        }
        .form-control {
            transition: all 0.5s ease-in-out;
        }
        .form-control::placeholder {
            color: white !important;
        }
        .form-control:hover {
            transform: scale(1.02);
            background-color: white;
        }
        .form-control:hover::placeholder {
            color: black !important;
        }
        .toast {
            background-color: white; /* Verde */
            color:black; /* Cor do texto */
        }
        .toast-header {
            background-color: #f3f3f3; /* Cor de fundo do cabeçalho */
            color: black; /* Cor do texto do cabeçalho */
        }
        .btn-close {
            color: black;
        }
        @keyframes slideIn {
            0% {
                transform: translateY(100%); /* Começa fora da tela */
                opacity: 0; /* Começa invisível */
            }
            50% {
                opacity: 1; /* Fica visível */
            }
            100% {
                transform: translateY(0); /* Termina na posição original */
            }
        }
        @keyframes slideOut {
            0% {
                transform: translateY(0); /* Começa na posição original */
                opacity: 1; /* Começa visível */
            }
            100% {
                transform: translateY(100%); /* Move para fora da tela */
                opacity: 0; /* Torna invisível */
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php" aria-label="Página inicial da Agenda">
            <img src="Imagens/agenda.png" alt="Ícone da Agenda" width="30" height="30"> Agenda
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lista.php">Lista usuário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="adicionar.php">Adicionar Usuário</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1>Formulário de Contato</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', 'root');
        define('BASE', 'db_agenda');

        $conn = new mysqli(HOST, USER, PASS, BASE);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        $sql = "INSERT INTO usuarios (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='toast position-fixed bottom-0 end-0 p-3' role='alert' aria-live='assertive' aria-atomic='true' id='adicionado'>
                    <div class='toast-header'>
                        <strong class='rounded me-2'>+1</strong>
                        <strong class='me-auto'>Adicionado</strong>
                        <small>Agora</small>
                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        O usuario foi adicionado.
                    </div>
                </div>";
        } else {
            echo "<div class='alert alert-danger'>Erro: " . $conn->error . "</div>";
        }

        $conn->close();
    }
    ?>
    <form method="post" action="">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Seu email" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Seu telefone" required>
        </div>
        <button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toastLive = document.getElementById('adicionado');
        if (toastLive) {
            const toast = new bootstrap.Toast(toastLive);
            toastLive.style.animation = 'slideIn 0.5s forwards'; 
            toast.show();

            setTimeout(() => {
                toastLive.style.animation = 'slideOut 0.5s forwards';
            }, 3000);
        }
    });
    /*const toastTrigger = document.getElementById('enviar');
    const toastLive = document.getElementById('adicionado');
    const toast = new bootstrap.Toast(toastLive);

    toastTrigger.addEventListener('click', function(event) {
        event.preventDefault(); // Impede o envio do formulário

        // Aplica a animação de entrada e exibe o toast
        toastLive.style.animation = 'slideIn 0.5s forwards'; 
        toast.show(); // Exibe o toast

        // Envia o formulário após 3 segundos
        setTimeout(() => {
            toastLive.style.animation = 'slideOut 0.5s forwards'; // Animação de saída
            setTimeout(() => {
                document.querySelector('form').submit(); // Envia o formulário
            }, 500); // Espera a animação de saída acabar antes de enviar
        }, 3000);
    });*/
</script>

</body>
</html>
