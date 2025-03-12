<!DOCTYPE html> <!-- Declaração do tipo de documento HTML -->
<html lang="pt-br"> <!-- Define o idioma da página como português do Brasil -->

<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres para UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configuração para responsividade -->

    <!-- Importação do CSS do Bootstrap para estilização -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">

    <title>Formulário</title> <!-- Define o título da página -->
</head>

<body>

    <style>
        /* Estilização do layout principal */
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Define a largura do formulário */
        form {
            width: 600px;
        }

        /* Configuração para as imagens */
        img {
            width: 200px;
            object-fit: cover;
        }
    </style>

    <main class="container text-center my-5"> <!-- Container principal da página -->

        <h2>CADASTRAR ALUNO</h2> <!-- Título da página -->
        <br> <!-- Espaçamento -->

        <form action="./aluno-cadastrar.php" method="POST">
            <!-- Formulário para cadastrar um aluno -->
            <!-- O método POST é utilizado para enviar os dados -->

            <div class="col">
                <label for="img">Imagem</label> <!-- Rótulo para o campo de upload de imagem -->
                <input type="file" accept="image/*" class="form-control" name="img">
                <!-- Input para selecionar uma imagem -->
            </div>

            <!-- Campo para inserir o nome do aluno -->
            <label for="nome">Nome:</label class="form-control">
            <input type="text" class="form-control" name="nome">

            <div class="row mt-2 "> <!-- Linha para agrupar os campos -->
                <div class="col"> <!-- Coluna para o campo de telefone -->
                    <label for="telefone">Telefone:</label>
                    <input type="number" class="form-control" name="tel">
                    <!-- Input para telefone -->
                </div>

                <div class="col"> <!-- Coluna para o campo de e-mail -->
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email">
                    <!-- Input para e-mail -->
                </div>
            </div>

            <div class="row mt-2"> <!-- Nova linha -->
                <div class="col"> <!-- Coluna para data de nascimento -->
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="nasc">
                    <!-- Input para data de nascimento -->
                </div>

                <div class="col my-4 pt-2"> <!-- Coluna para o checkbox "Frequente" -->
                    <input type="checkbox" class="form-check-input" name="frequente">
                    <!-- Checkbox para marcar se o aluno é frequente -->
                    <label for="frequente">Frequente:</label>
                </div>
            </div>

            <input type="submit"> <!-- Botão para enviar o formulário -->
        </form>

</body>

</html>