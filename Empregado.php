<?php

require_once './BD/DataBase.php';


//usaremos esta classe para todo acesso e alteracao na tabela Empregado do banco de dados
class Empregado {

    function __construct() {
        
    }

    //funcao listar generica. busca todos os empregados do banco
    public function listar() {


        $conn = DataBase::getInstance()->getDb();

        //criacao do sql
        //TAREFA  criar um sql que pegue todas informacoes de todas as linhas da tabela de Empregado ========================
        $sql = ""; 
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        //fetch all recebe todos os resultados
        $resultados = $stmt->fetchAll();

        //php imprime codigo html dinamicamente junto com as informacoes recebidas do banco
        //usamos um foreach para iterar na lista de resultados
        foreach ($resultados as $empregado) {
            echo "<tr  class = 'alert-warning'>"
            . "<td><a href='alterar.php?id=" . $empregado["id"]. "'>" . $empregado["nome"] . " " . $empregado["sobrenome"] . "</td>"
            . "<td> " . $empregado[""] . "</td>"   //colocar o email
            . "<td>" . $empregado[""] . " " . "</td>" // colocar o cargo
            . "<td>" . $empregado[""] . " " . "</td>"  //colocar o salario
            . "</tr>";
        }
    }

    //funcao listar com filtro no salario, necessita de um valor minimo e maximo
    //para buscar todas as ocorrencias no banco
    public function listarFiltroSalario(/*Precisa de alguns parametros??????*/) {


        $conn = DataBase::getInstance()->getDb();

        //criacao do sql
        // TAREFA criar um sql que retorne todas as informacoes dos Empregados que tem salario entre min e max ================
        $sql = "";
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $resultados = $stmt->fetchAll();

        //php imprime codigo html dinamicamente junto com as informacoes recebidas do banco
        foreach ($resultados as $empregado) {
            echo "<tr  class = 'alert-warning'>"
            . "<td><a href='alterar.php?id=" . $empregado["id"]. "'>" . $empregado["nome"] . " " . $empregado["sobrenome"] . "</td>"
            . "<td> " . $empregado[""] . "</td>"      // colocar o email
            . "<td>" . $empregado[""] . " " . "</td>"   //colocar o cargo
            . "<td>" . $empregado[""] . " " . "</td>"   //colocar o salario
            . "</tr>";
        }
    }

    //funcao listar com filtro para nome. necessita de um nome/sobrenome ou parte dele 
    //para buscar as ocorrencias no danco
    public function listarFiltroNome( /*Precisa de um parametro ???*/ ) {


        $conn = DataBase::getInstance()->getDb();


        //criacao do sql
        //TAREFA criar um sql que recebe todos os dados dos Empregados que tem parte do nome ou sobrenome igual o filtro de entrada
        $sql = "";
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $resultados = $stmt->fetchAll();

        //php imprime codigo html dinamicamente junto com as informacoes recebidas do banco
        foreach ($resultados as $linha) {
            echo "<tr  class = 'alert-warning'>"
            . "<td><a href='alterar.php?id=" . $linha["id"]. "'>" . $linha["nome"] . " " . $linha["sobrenome"] . "</td>"
            . "<td> " . $linha[""] . "</td>"    //acho que nao preciso nem falar neah
            . "<td>" . $linha[""] . " " . "</td>"  //acho que nao preciso nem falar neah
            . "<td>" . $linha[""] . " " . "</td>"   //acho que nao preciso nem falar neah
            . "</tr>";
        }
    }

    //funcao de cadastro. Recebe os dados atraves da web e faz a insercao no banco
    public function cadastrar(/*Aqui vamos cadastrar um empregado. Quais parametros preciso????*/) {

        $conn = DataBase::getInstance()->getDb();


        //criacao do sql
        //TAREFA  criar um sql que cadastre todas as informacoes de um empregado
        //dica, vamos receber todos os dados por parametro da funcao, assim:
        //se quero inserir um nome fica,  INSERT INTO Tabela (nome) VALUES ('$variavel'); 
        //nao esqueca das aspas simples
        $sql = "";
        $stmt = $conn->prepare($sql);

        //execucao do sql
        if ($stmt->execute()) {
            print "<script>alert('Cadastrado com sucesso!!')</script>";
        } else {

            print "<script>alert('Erro ao cadastrar!!')</script>";
        }
    }
    
    //funcao de alteracao. Recebe dados para alterar, MAS PRECISA DO ID PARA ALTERAR A LINHA CORRETA DA TABELA
    public function update(/*aqui precisamos saber QUAL empregado tera os dados alterados...  precisamos de parametros*/) {

        $conn = DataBase::getInstance()->getDb();


        //criacao do sql
        //TAREFA   criar sql que atualize UM empregado especifico com todos os dados recebidos por parametros
        $sql = "";
        $stmt = $conn->prepare($sql);

        //execucao do sql
        if ($stmt->execute()) {
            print "<script>alert('Alterado com sucesso!!')</script>";
        } else {

            print "<script>alert('Erro ao Alterar!!')</script>";
        }
    }
    
    
        
         
    
    

}
