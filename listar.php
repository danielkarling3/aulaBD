<?php
require_once './Empregado.php';



//criacao do objeto para acesso no banco
$empregados = new Empregado();
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
                <table class="table bg-success" >
                    <center>
                        <tr class = "alert-success ">
                            <th>NOME</th><th>E-MAIL</th><th>CARGO</th><th>SALÁRIO</th>
                        </tr> 
                        <?php
                        //codigo em PHP dentro do HTML, o objeto empregado deve chamar a funcao para listar todos os empregados
                        //chamada da funcao nao necessita de parametros. 
                        // RESPONDA PORQUE NAO PRECISA



                        $empregados->listar();
                        ?>

                    </center>
                </table> 
            </div>
        </div>





    </body>
</html>
