<?php
echo '<h1>Aluno-deletar.php</h1>';

$dsn = 'mysql:dbname=chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);


$delete = 'DELETE FROM tb_aluno WHERE id = :id';

$box = $banco->prepare($delete);


$id_formulario = $_GET['id'];

$box->execute([
    ':id' => $id_formulario
]);

$delete = 'DELETE FROM tb_info_alunos WHERE id_alunos = :id_alunos';
$box = $banco->prepare($delete);
$box->execute([
    ':id_alunos' => $id_formulario
]);




echo '<script>
alert("Usuario apagado com sucesso!!")
window.location.replace("index.php")
</script>';
// header('location:index.php');
