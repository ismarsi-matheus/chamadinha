<?php

echo'<h1>Cadastro de aluno</h1>';


echo'<pre>';
var_dump(
    $_POST
);


$nome_formulario =$_POST['nome'];

$dsn = 'mysql:dbname=chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';
 
$banco = new PDO($dsn, $user, $password);

$insert='insert into tb_aluno(nome) values(:nome)';

$box=$banco->prepare($insert); 
$box->execute([
':nome'=> $nome_formulario
]);

$id_aluno =$banco->lastInsertId();

echo $id_aluno;


$tel_formulario =$_POST['tel'];
$email_formulario=$_POST['email'];
$img_formulario=$_POST['img'];
$nasc_formulario=$_POST['nasc'];
$frequente_formulario=$_POST['frequente'];


$insert='insert into tb_info_alunos(telefone,email,nascimento,frequente,id_alunos,img) values(:telefone,:email,:nascimento,:frequente,:id_alunos,:img)';

$box=$banco->prepare($insert); 
$box->execute([
':telefone'=> $tel_formulario,
':email'=>$email_formulario,
':nascimento'=>$nasc_formulario,
'frequente'=>$frequente_formulario,
'id_alunos'=>$id_aluno,
'img'=>$img_formulario
]);
