 <?php
 $id_aluno =$_GET['id_alunos'];

 //echo $id_aluno;

 
$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$select='SELECT * from tb_info_alunos where id_aluno ='.$id_aluno;

echo $select;
 
 $dados=$banco->query($select)->fetch();

 echo '<pre>';
 var_dump($dados);
 
 
 
 
 
 
 
 
 
 ?>











<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
$dsn = 'mysql:host=localhost;dbname=db_chamadinha host=127.0,0,1';
$user='root';
$password='';


$banco = new PDO ($dsn,$user,$password);

$select ='SELECT * FROM tb_aluno';

$resultado = $banco->query($select)->fetchAll();

?>
<style>
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form {
        width: 600px;
        
    }
</style>

<main class="container text-align-center my-5">

    <img src="./perfil.png" alt="perfil" class="img-thumbnail">
    <form action="#">
        <label for="nome">Nome</label>
        <input type="text" value="Paulo Santos" disabled class="form-control">
        <div class="row mt-2">
            <div class="col">

                <label for="telefone">telefone</label>
                <input type="number" value="<?php     echo $dados['telefone']; ?>" disabled class="form-control">
            </div>

            <div class="col">
                <label for="email">Email</label>
                <input type="email" value="<?php     echo $dados['email']; ?>" disabled class="form-control">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="data_nascimento">Data Nascimento </label>
                <input type="date" value="<?php     echo $dados['nascimento']; ?>" disabled class="form-control">
            </div>
            <div class="col my-4 pt-2">
                <input type="checkbox" checked class="form-check-input">
                <label for="frequente">Frequente</label>
            </div>
        </div>







    </form>
</main>