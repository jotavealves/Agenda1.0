<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        :root {
            --navbar-bg: #222;
            --navbar-hover-bg: #444;
            --link-hover-bg: white;
            --link-hover-color: black;
        }
        body {
            background-color: black;
            color: white;
        }
        .navbar {
            background-color: var(--navbar-bg);
        }
        .nav-link {
            color: white !important;
            transition: all 0.5s ease-in-out;
            border-radius: 5px;
        }
        .nav-link:hover {
            transform: scale(1.15);
            background-color: var(--link-hover-bg) !important;
            color: var(--link-hover-color) !important;
        }
        .nav-link.active {
            background-color: var(--navbar-hover-bg);
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
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lista.php">Lista usuário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adicionar.php">Adicionar Usuário</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>
