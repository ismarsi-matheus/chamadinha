<?php 

// Exibe um título para indicar a funcionalidade da página
echo '<h1>Aluno Editar</h1>';

// Exibe os dados recebidos via POST para depuração
var_dump($_POST);

// Obtém os valores enviados pelo formulário
$editar_id = $_POST['id']; // ID do aluno a ser editado
$editar_nome = $_POST['nome']; // Nome atualizado
$editarNascimento = $_POST['nasc']; // Data de nascimento atualizada
$editarTelefone = $_POST['tel']; // Telefone atualizado
$editar_email = $_POST['email']; // E-mail atualizado

// Configuração da conexão com o banco de dados
$dsn = 'mysql:dbname=chamadinha;host=127.0.0.1';
$user = 'root'; // Usuário do banco de dados
$password = ''; // Senha do banco de dados

// Cria a conexão com o banco de dados usando PDO
$banco = new PDO($dsn, $user, $password);

// Query para atualizar o nome do aluno na tabela 'tb_aluno'
$update = 'UPDATE tb_aluno SET nome = :nome WHERE id = :id';

// Prepara e executa a query para atualizar o nome
$box = $banco->prepare($update)->execute([
    ':id' => $editar_id,
    ':nome' => $editar_nome
]);

// Query para atualizar os dados adicionais do aluno na tabela 'tb_info_alunos'
$update = 'UPDATE tb_info_alunos SET telefone = :tel, email = :email, nascimento = :nasc WHERE id_alunos = :id';

// Prepara e executa a query para atualizar telefone, e-mail e nascimento
$box = $banco->prepare($update)->execute([
    ':id' => $editar_id,
    ':tel' => $editarTelefone,
    ':email' => $editar_email,
    ':nasc' => $editarNascimento
]);
