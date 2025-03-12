<?php

// Obtém o ID do aluno passado na URL
$id_aluno = $_GET['id_aluno'];

// Configuração da conexão com o banco de dados
$dsn = 'mysql:dbname=chamadinha;host=127.0.0.1';
$user = 'root'; // Usuário do banco de dados
$password = ''; // Senha do banco de dados

// Cria a conexão com o banco de dados usando PDO
$banco = new PDO($dsn, $user, $password);

// Query para buscar os dados do aluno e suas informações adicionais
$select = "SELECT tb_info_alunos.*, tb_aluno.nome 
           FROM tb_info_alunos 
           INNER JOIN tb_aluno ON tb_aluno.id = tb_info_alunos.id_alunos 
           WHERE tb_info_alunos.id_alunos = " . $id_aluno;

// Executa a consulta e obtém os dados do aluno
$dados = $banco->query($select)->fetch();

// Debug opcional para exibir os dados retornados
// echo '<pre>'; // Para organizar a saída do var_dump
// var_dump($dados);

?>

<!-- Importa o Bootstrap para estilização -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXhW+ALEwIH" crossorigin="anonymous">

<style>
    /* Centraliza o conteúdo principal */
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Define a largura do formulário */
    form {
        width: 600px;
    }

    /* Ajusta o tamanho da imagem do perfil */
    img {
        width: 200px;
        object-fit: cover;
    }
</style>

<main class="container text-center my-5">
    <!-- Exibe a imagem do perfil do aluno -->
    <img src="./img/<?= $dados['img'] ?>" alt="imagem do perfil" class="img-thumbnail">

    <!-- Formulário apenas para exibição dos dados -->
    <form action="#">
        <!-- Campo Nome -->
        <label for="nome">Nome:</label>
        <input type="text" value="<?= $dados['nome'] ?>" disabled class="form-control">

        <div class="row mt-2">
            <div class="col">
                <!-- Campo Telefone -->
                <label for="telefone">Telefone:</label>
                <input type="number" value="<?= $dados['telefone'] ?>" disabled class="form-control">
            </div>

            <div class="col">
                <!-- Campo Email -->
                <label for="email">Email:</label>
                <input type="email" value="<?= $dados['email'] ?>" disabled class="form-control">
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <!-- Campo Data de Nascimento -->
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" value="<?= $dados["nascimento"] ?>" disabled class="form-control">
            </div>

            <div class="col my-4 pt-2">
                <!-- Checkbox para indicar se o aluno é frequente -->
                <input type="checkbox" class="form-check-input">
                <label for="frequente">Frequente:</label>
            </div>
        </div>
    </form>
</main>