<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
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
        .table {
            background-color: #333;
            color: white;
            border: 1px solid #555;
        }
        .table th, .table td {
            color: white;
        }
        .form-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .btn-delete, .btn-editar {
            background-color: white;
            border-radius: 8px;
            transition: all 0.5s ease-in-out;
            margin-right: 5px;
        }
        .btn-delete:hover {
            background-color: #ff4444;
            transform: scale(1.15);
        }
        .btn-editar:hover {
            background-color: #01CB1B;
            transform: scale(1.15);
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
        .toast {
            background-color: white; /* Verde */
            color: black; /* Cor do texto */
        }
        .toast-header {
            background-color: #f3f3f3; /* Cor de fundo do cabeçalho */
            color: black; /* Cor do texto do cabeçalho */
        }
        .btn-close {
            color: white !important;
            background-color: white;
        }
        
        .form-control{
            background-color: #333;
            color: white;
            border: 1px solid #555;
            transition: all 0.5s ease-in-out;
        }
        .form-control:hover{
            transform: scale(1.05);
            background-color: white;
            color: black;
        }
        .modal-content{
            border-radius: 15px;
        }
        .modal-body {
            background-color: #333;
        }
        .modal-title {
            background-color: #333;
        }
        .modal-header{
            background-color: #333;
        }
        .modal-footer{
            background-color: #333;
        }
        .modal-dialog{
            border-radius: 15px;
        }
        .btn-delet{
            background-color: white;
            border-radius: 5px;
            transition: all 0.5s ease-in-out;
            color: black;
        }
        .btn-delet:hover{
            background-color: red;
            color: black;
            transform: scale(1.05);
        }
        .btn-cancelar{
            transition: all 0.5s ease-in-out;
            background-color: black;
            color: white;
        }
        .btn-cancelar:hover{
            transform: scale(1.05);
            color: black;
            background-color: white;
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
        .fade.show {
            opacity: 1;
            transition: opacity 0.3s ease-in-out;
        }
        .fade {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        /* Animações para o toast */
        .toast {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .toast.show {
            opacity: 1;
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
                    <a class="nav-link active" href="lista.php">Lista usuário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adicionar.php">Adicionar Usuário</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="form-title">
        <h1>Lista de Usuários</h1>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            define('HOST', 'localhost');
            define('USER', 'root');
            define('PASS', 'root');
            define('BASE', 'db_agenda');

            $conn = new mysqli(HOST, USER, PASS, BASE);

            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // Processa a atualização do usuário
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['salvar'])) {
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];

                $sql = "UPDATE usuarios SET nome='$nome', email='$email', telefone='$telefone' WHERE id='$id'";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='toast position-fixed bottom-0 end-0 p-3 show' role='alert' aria-live='assertive' aria-atomic='true' id='delatua'>
                            <div class='toast-header'>
                                <strong class='rounded me-2'>1</strong>
                                <strong class='me-auto'>Usuario Atualizado</strong>
                                <small>Agora</small>
                                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                            </div>
                            <div class='toast-body'>
                                O usuario foi Atualizado.
                            </div>
                        </div>";
                } else {
                    echo "<div class='alert alert-danger'>Erro: " . $conn->error . "</div>";
                }
            }

            // Processa a exclusão do usuário
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deletar'])) {
                $id = $_POST['id'];

                $sql = "DELETE FROM usuarios WHERE id='$id'";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='toast position-fixed bottom-0 end-0 p-3 show' role='alert' aria-live='assertive' aria-atomic='true' id='delauta'>
                            <div class='toast-header'>
                                <strong class='rounded me-2'>1</strong>
                                <strong class='me-auto'>Usuario Deletado</strong>
                                <small>Agora</small>
                                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                            </div>
                            <div class='toast-body'>
                                O usuario foi deletado.
                            </div>
                        </div>";
                } else {
                    echo "<div class='alert alert-danger'>Erro: " . $conn->error . "</div>";
                }
            }

            $sql = "SELECT id, nome, email, telefone FROM usuarios";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["telefone"] . "</td>";
                    echo "<td>";
                    echo "<button class='btn btn-editar' data-bs-toggle='modal' data-bs-target='#editModal' onclick='openEditModal(" . $row["id"] . ", \"" . $row["nome"] . "\", \"" . $row["email"] . "\", \"" . $row["telefone"] . "\")'>Atualizar</button>";
                    echo "<button class='btn btn-delete' data-bs-toggle='modal' data-bs-target='#deleteModal' onclick='setDeleteId(" . $row["id"] . ")'>Deletar</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum usuário encontrado</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<!-- Modal de Edição -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="atualizar" method="post" action="">
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-3">
                        <label for="editNome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="editNome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTelefone" class="form-label">Telefone</label>
                        <input type="tel" class="form-control" id="editTelefone" name="telefone" required>
                    </div>
                        <button type="submit" name="salvar" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação de Deleção -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Deleção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja deletar este usuário?
            </div>
            <div class="modal-footer">
                <form method="post" action="">
                    <input type="hidden" id="deleteId" name="id">
                    <button type="button" class="btn btn-cancelar" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="deletar" class="btn btn-delet">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openEditModal(id, nome, email, telefone) {
        document.getElementById('editId').value = id;
        document.getElementById('editNome').value = nome;
        document.getElementById('editEmail').value = email;
        document.getElementById('editTelefone').value = telefone;
    }

    function setDeleteId(id) {
        document.getElementById('deleteId').value = id;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const toastLive = document.getElementById('delatua');
        if (toastLive) {
            const toast = new bootstrap.Toast(toastLive);
            toast.show();

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    });
</script>

</body>
</html>
