<?php

require_once './BD/DataBase.php';

class Empregado {

    function __construct() {
        
    }

    //funcao listar generica. busca todos os empregados do banco
    public function listar() {


        $conn = DataBase::getInstance()->getDb();

        //criacao do sql
        $sql = "SELECT id, nome, sobrenome, email, cargo, salario FROM Empregado WHERE 1";
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $resultados = $stmt->fetchAll();

        //php imprime codigo html dinamicamente junto com as informacoes recebidas do banco
        foreach ($resultados as $linha) {
            echo "<tr  class = 'alert-warning'>"
            . "<td><a href='alterar.php?id=" . $linha["id"]. "'>" . $linha["nome"] . " " . $linha["sobrenome"] . "</td>"
            . "<td> " . $linha["email"] . "</td>"
            . "<td>" . $linha["cargo"] . " " . "</td>"
            . "<td>" . $linha["salario"] . " " . "</td>"
            . "</tr>";
        }
    }

    //funcao listar com filtro no salario, necessita de um valor minimo e maximo
    //para buscar todas as ocorrencias no banco
    public function listarFiltroSalario($min, $max) {


        $conn = DataBase::getInstance()->getDb();

        //criacao do sql
        $sql = "SELECT * FROM `Empregado` WHERE salario > '$min' AND salario < '$max'";
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $resultados = $stmt->fetchAll();

        //php imprime codigo html dinamicamente junto com as informacoes recebidas do banco
        foreach ($resultados as $linha) {
            echo "<tr  class = 'alert-warning'>"
            . "<td><a href='alterar.php?id=" . $linha["id"]. "'>" . $linha["nome"] . " " . $linha["sobrenome"] . "</td>"
            . "<td> " . $linha["email"] . "</td>"
            . "<td>" . $linha["cargo"] . " " . "</td>"
            . "<td>" . $linha["salario"] . " " . "</td>"
            . "</tr>";
        }
    }

    //funcao listar com filtro para nome. necessita de um nome/sobrenome ou parte dele 
    //para buscar as ocorrencias no danco
    public function listarFiltroNome($nome) {


        $conn = DataBase::getInstance()->getDb();


        //criacao do sql
        $sql = "SELECT * FROM `Empregado` WHERE nome LIKE '%$nome%' OR sobrenome LIKE '%$nome%'";
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $resultados = $stmt->fetchAll();

        //php imprime codigo html dinamicamente junto com as informacoes recebidas do banco
        foreach ($resultados as $linha) {
            echo "<tr  class = 'alert-warning'>"
            . "<td><a href='alterar.php?id=" . $linha["id"]. "'>" . $linha["nome"] . " " . $linha["sobrenome"] . "</td>"
            . "<td> " . $linha["email"] . "</td>"
            . "<td>" . $linha["cargo"] . " " . "</td>"
            . "<td>" . $linha["salario"] . " " . "</td>"
            . "</tr>";
        }
    }

    //funcao de cadastro. Recebe os dados atraves da web e faz a insercao no banco
    public function cadastrar($nome, $sobrenome, $email, $cargo, $salario) {

        $conn = DataBase::getInstance()->getDb();


        //criacao do sql
        $sql = "INSERT INTO Empregado (nome, sobrenome, email, cargo, salario) VALUES ('$nome', '$sobrenome', '$email', '$cargo', '$salario')";
        $stmt = $conn->prepare($sql);

        //execucao do sql
        if ($stmt->execute()) {
            print "<script>alert('Cadastrado com sucesso!!')</script>";
        } else {

            print "<script>alert('Erro ao cadastrar!!')</script>";
        }
    }
    
    //funcao de alteracao. Recebe dados para alterar, MAS PRECISA DO ID PARA ALTERAR A LINHA CORRETA DA TABELA
    public function update($id, $nome, $sobrenome, $email, $cargo, $salario) {

        $conn = DataBase::getInstance()->getDb();


        //criacao do sql
        $sql = "UPDATE Empregado SET nome = '$nome', sobrenome= '$sobrenome', email = '$email', cargo= '$cargo', salario= '$salario' WHERE id = '$id'";
        $stmt = $conn->prepare($sql);

        //execucao do sql
        if ($stmt->execute()) {
            print "<script>alert('Alterado com sucesso!!')</script>";
        } else {

            print "<script>alert('Erro ao Alterar!!')</script>";
        }
    }
    
    
        
         
    
    

}
