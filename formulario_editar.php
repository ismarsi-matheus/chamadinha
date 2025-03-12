<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Importa o Bootstrap para estilização -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Formulário</title>
</head>

<body>

    <style>
        /* Centraliza o conteúdo */
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Define a largura do formulário */
        form {
            width: 600px;
        }

        /* Ajusta o tamanho da imagem */
        img {
            width: 200px;
            object-fit: cover;
        }
    </style>

    <main class="container text-center my-5">

        <h2>Editar ALUNO</h2>
        <br>

        <!-- 
        METODO DE ENVIO:
            GET - através da URL.
            POST - através do corpo da requisição.

        ACTION:
            Define para onde os dados do formulário serão enviados.
        -->

        <?php
        // Obtém o ID do aluno a ser alterado da URL
        $id_aluno_alterar = $_GET['id_aluno_alterar'];

        // Exibe o ID do aluno (para depuração)
        var_dump($id_aluno_alterar);

        // Configuração da conexão com o banco de dados
        $dsn = 'mysql:dbname=chamadinha;host=127.0.0.1';
        $user = 'root'; // Usuário do banco
        $password = ''; // Senha do banco

        // Cria uma conexão com o banco de dados
        $banco = new PDO($dsn, $user, $password);

        // Query para buscar os dados do aluno e suas informações adicionais
        $select = "SELECT tb_info_alunos.*, tb_aluno.nome 
                   FROM tb_info_alunos 
                   INNER JOIN tb_aluno ON tb_aluno.id = tb_info_alunos.id_alunos 
                   WHERE tb_info_alunos.id_alunos = " . $id_aluno_alterar;

        // Executa a consulta e obtém os dados do aluno
        $dados = $banco->query($select)->fetch();
        ?>

        <!-- Formulário para edição dos dados do aluno -->
        <form action="./aluno_editar.php" method="POST">

            <!-- Exibe a imagem atual do aluno -->
            <img src="./img/<?= $dados['img'] ?>" alt="Imagem do aluno">

            <!-- Campo oculto para armazenar o ID do aluno -->
            <input type="hidden" placeholder="id" name="id" value="<?= $dados['id'] ?>">

            <div class="col">
                <!-- Campo para alterar a imagem -->
                <label for="img">Imagem:</label>
                <input type="file" accept="image/*" class="form-control" name="img">
            </div>

            <!-- Campo para alterar o nome -->
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" value="<?= $dados['nome'] ?>">

            <div class="row mt-2">
                <div class="col">
                    <!-- Campo para alterar o telefone -->
                    <label for="telefone">Telefone:</label>
                    <input type="number" class="form-control" name="tel" value="<?= $dados['telefone'] ?>">
                </div>

                <div class="col">
                    <!-- Campo para alterar o e-mail -->
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?= $dados['email'] ?>">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <!-- Campo para alterar a data de nascimento -->
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="nasc" value="<?= $dados['nascimento'] ?>">
                </div>

                <div class="col my-4 pt-2">
                    <!-- Checkbox para indicar se o aluno é frequente -->
                    <input type="checkbox" class="form-check-input" name="frequente" value="<?= $dados['frequente'] ?>">
                    <label for="frequente">Frequente:</label>
                </div>
            </div>

            <!-- Botão para enviar os dados -->
            <input type="submit" class="btn btn-primary mt-3" value="Salvar Alterações">
        </form>

</body>

</html>