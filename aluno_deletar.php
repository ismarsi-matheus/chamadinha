<?php
// Exibe um título para indicar a funcionalidade da página
echo '<h1>Aluno-deletar.php</h1>';

// Configuração da conexão com o banco de dados
$dsn = 'mysql:dbname=chamadinha;host=127.0.0.1';
$user = 'root'; // Usuário do banco de dados
$password = ''; // Senha do banco de dados

// Cria a conexão com o banco de dados usando PDO
$banco = new PDO($dsn, $user, $password);

// Query para deletar um aluno da tabela 'tb_aluno'
$delete = 'DELETE FROM tb_aluno WHERE id = :id';

// Prepara a query para execução segura
$box = $banco->prepare($delete);

// Obtém o ID do aluno a ser deletado via parâmetro GET
$id_formulario = $_GET['id'];

// Executa a query para deletar o aluno com o ID fornecido
$box->execute([
    ':id' => $id_formulario
]);

// Query para deletar os dados adicionais do aluno na tabela 'tb_info_alunos'
$delete = 'DELETE FROM tb_info_alunos WHERE id_alunos = :id_alunos';

// Prepara a query o delete 
$box = $banco->prepare($delete);

// Executa a query para deletar os dados adicionais do aluno
$box->execute([
    ':id_alunos' => $id_formulario
]);

// Exibe um alerta confirmando a exclusão do usuário e redireciona para 'index.php'
echo '<script>
alert("Usuario apagado com sucesso!!")
window.location.replace("index.php")
</script>';

 // header('location:index.php');
