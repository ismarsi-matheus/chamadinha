<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <style>
        .btn{
            justify-content: center;
            align-items: center;
        }

    </style>
<body>
    <form action="./aluno_cadastrar.php" method="POST">
 
        <label for="nome">Nome:</label class="form-control">
        <input type="text" value=""  class="form-control" name="nome">
        <div class="row mt-2 ">
 
            <div class="col">
                <label for="telefone">Telefone:</label>
                <input type="number" value=""  class="form-control" name="tel">
            </div>
 
            <div class="col">
                <label for="email">Email:</label>
                <input type="email" value=""  class="form-control" name="email">
            </div>

            <div class="col">
                <label for="img">imagem:</label>
                <input type="file" accept="image/*"  class="form-control" name="img">
            </div>

            <!-- <div class="col">
                <label for="id">ID:</label>
                <input type="text" value=""  class="form-control" name="id">
            </div> -->
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" value=""  class="form-control" name="nasc">
            </div>
 
            <div class="col my-4 pt-2">
                <input type="checkbox" class="form-check-input" name="frequente">
                <label for="frequente">Frequente:</label>
            </div>

        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
</body>
</html>