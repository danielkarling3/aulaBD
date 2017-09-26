<?php
require_once './Empregado.php';


//criacao do objeto para acesso no banco
$empregados = new Empregado();


//precisa receber duas informacoes para enviar a funcao
$max = $_POST["max"];
$min = $_POST["min"];
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
                    <tr  class = "alert-success">
                        <th>NOME</th><th>E-MAIL</th><th>CARGO</th><th>SALÁRIO</th>
                    </tr> 
                    <?php
                    //codigo em PHP dentro do HTML, o objeto empregado deve chamar a funcao para listar com filtro no salario
                    //chamada da funcao precisa de doios parametros


                    $empregados->listarFiltroSalario($min, $max);
                    ?>
                </table>  
            </div>
        </div>





    </body>
</html>
