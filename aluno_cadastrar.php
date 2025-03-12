<?php
// Exibe o título do cadastro
echo "Cadastro de Aluno";

// Exibe os dados enviados via POST para depuração
echo '<pre>';
var_dump($_POST);

// Obtém o nome do aluno do formulário
$nomeFormulario = $_POST['nome'];

// Configuração de conexão com o banco de dados
$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root'; // Usuário do banco de dados
$password = ''; // Senha do banco de dados

// Cria a conexão com o banco de dados usando PDO
$banco = new PDO($dsn, $user, $password);

// Query para inserir o nome do aluno na tabela 'tb_aluno'
$insert = 'INSERT INTO tb_aluno (nome) VALUE (:nome)';

// Prepara a query para execução segura
$box = $banco->prepare($insert);

// Executa a query substituindo o placeholder pelo valor do formulário
$box->execute([
    ':nome' => $nomeFormulario
]);

// Obtém o ID do aluno recém-inserido no banco de dados
$id_aluno = $banco->lastInsertId();

// Exibe o ID do aluno para verificação
echo $id_aluno;

// Obtém os outros dados do formulário
$telefoneFormulario = $_POST['tel']; // Telefone do aluno
$emailFormulario = $_POST['email']; // E-mail do aluno
$nascimentoFormulario = $_POST['nasc']; // Data de nascimento do aluno
$frequenteFormulario = $_POST['frequente']; // Status de frequência do aluno
$imgFormulario = $_POST['img']; // Imagem do aluno 

// Query para inserir os dados adicionais na tabela 'tb_info_alunos'
$inserte = 'INSERT INTO tb_info_alunos (telefone, email, nascimento, frequente, id_alunos, img) 
            VALUE (:telefone, :email, :nascimento, :frequente, :id_alunos, :img)';

// Prepara o insert 
$boxe = $banco->prepare($inserte);

// Executa a query com os valores preenchidos
$boxe->execute([
    ':telefone' => $telefoneFormulario, // Insere o telefone
    ':email' => $emailFormulario, // Insere o e-mail
    ':nascimento' => $nascimentoFormulario, // Insere a data de nascimento
    ':frequente' => $frequenteFormulario, // Insere o status de frequência
    ':id_alunos' => $id_aluno, // Associa ao ID do aluno recém-inserido
    ':img' => $imgFormulario, // Insere a imagem do aluno
]);
