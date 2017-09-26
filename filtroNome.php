<?php
require_once './Empregado.php';

//criacao do objeto para acesso no banco
$empregados = new Empregado();

//precisa receber uma informacao para enviar a funcao
$nome = $_POST["nome"];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Listando</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body class="bg-warning">
        <div class="col-lg-10">
            <br><br><br>
            <div>
                <table class="table bg-warning" >
                    <tr class = "alert-success ">
                        <th>NOME</th><th>E-MAIL</th><th>CARGO</th><th>SALÁRIO</th>
                    </tr> 
                    <?php
                    //codigo em PHP dentro do HTML, o objeto empregado deve chamar a funcao para listar com filtro no nome
                    //chamada da funcao precisa de um parametro

                    $empregados->listarFiltroNome($nome);
                    ?>
                </table>  
            </div>
        </div>





    </body>
</html>
