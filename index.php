<!-- Importação do Bootstrap para estilização da tabela e botões -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">

<?php

// Conexão com o banco de dados usando PDO
$dsn = 'mysql:dbname=chamadinha;host=127.0.0.1'; // Define o nome do banco e o host
$user = 'root'; // Usuário do banco de dados
$password = ''; // Senha do banco de dados (neste caso, vazia)

$banco = new PDO($dsn, $user, $password); // Criação do objeto PDO para conexão

// Query para selecionar todos os alunos da tabela tb_aluno
$select = "SELECT * FROM tb_aluno";

// Executa a consulta e obtém todos os resultados
$resultado = $banco->query($select)->fetchAll();

// echo '<pre>'; // Usado para formatar a exibição de um var_dump
// var_dump($resultado); // Depuração: Exibe os dados retornados pela consulta

?>

<main class="container my-5"> <!-- Container Bootstrap com margem superior -->
    <table class="table table-striped"> <!-- Criação de uma tabela estilizada -->

        <!-- Botão para cadastrar um novo aluno -->
        <div class="my-3 d-flex justify-content-end"> <!-- Alinha o botão à direita -->
            <a href="formulario.php" class="btn btn-success">Cadastrar Novo Aluno</a>
        </div>

        <!-- Cabeçalho da tabela -->
        <tr>
            <td> id </td> <!-- Coluna para o ID do aluno -->
            <td> nome </td> <!-- Coluna para o Nome do aluno -->
            <td class="text-center"> ação</td> <!-- Coluna para as ações (Abrir, Editar, Excluir) -->
        </tr>

        <!-- Loop para exibir os dados de cada aluno -->
        <?php foreach ($resultado as $linha) { ?>
            <tr>
                <td> <?= $linha['id'] ?> </td> <!-- Exibe o ID do aluno -->
                <td> <?= $linha['nome'] ?> </td> <!-- Exibe o Nome do aluno -->
                <td class="text-center"> <!-- Célula para os botões de ação -->

                    <!-- Botão para abrir a ficha do aluno -->
                    <a class="btn btn-primary" href="./ficha.php?id_aluno=<?= $linha['id'] ?>">Abrir</a>

                    <!-- Botão para editar os dados do aluno -->
                    <a class="btn btn-warning" href="./formulario_editar.php?id_aluno_alterar=<?= $linha['id'] ?>">Editar</a>

                    <!-- Botão para excluir o aluno -->
                    <a class="btn btn-danger" href="./aluno_deletar.php?id=<?= $linha['id'] ?>">Excluir</a>

                </td>
            </tr>
        <?php } ?> <!-- Fim do loop que percorre os alunos -->
    </table>
</main>