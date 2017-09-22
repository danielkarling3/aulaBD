<?php

require_once './Empregado.php';

//$_POST serve para receber um dado enviado pelas paginas web,
//cada dado eh identificado por um nome.

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email = $_POST["email"];
$cargo = $_POST["cargo"];
$salario = $_POST["salario"];

//criando o objeto responsavel por alterar e acessar a tabela Empregado
$empregado = new Empregado();

//chamada da funcao
//esta incompleta, necessita passar todos os paramentros necessarios para gravar no banco
$empregado->cadastrar($nome, $sobrenome, $email, $cargo, $salario);

//script para redirecionar para o index apos executar
print "<script type = 'text/javascript'> location.href = './index.php' </script>";