<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<html>
    <head>
        <meta charset="UTF-8">
        <title>Aula Banco de Dados</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body class="bg-warning">
    <center><br>

        <div class="row">
            <img height="200" src="./img/banco.png" alt="banco"/>
            <br>
            <h1>Atividade de Banco de Dados</h1>

        </div>
        <br>
        <div class="row">
            <div class="container container-fluid bg-warning">


                <div class="col-xs-4">
                    <h2>Cadastro e listagem:</h2>
                    <!-- atividade 1 - cadastrar um empregado  -->
                    <br>
                    <button class = "bg-primary btn btn-lg" onclick = "window.location.href = 'cadastrar.php'">Cadastrar</button>
                    <br>
                    <br>


                    <!-- atividade 2 - listar todos os empregados  -->       
                    <button class = "bg-primary btn btn-lg" onclick = "window.location.href = 'listar.php'">Listar</button>
                    <br>
                    <br>
                </div>


                <div class="col-xs-4">
                    <h2>Procurar:</h2>
                    <!-- atividade 3 - listar empregados com filtro de salario  -->
                    <form id="filtro" class="container-fluid " name="filtro" method="post" action="filtroSalario.php">
                        <label>Salário maior que:</label>
                        <input name="min" class="text-success center-block " style="width: 80px" type="number" id="min" value = "0">
                        <br>
                        <label>e menor que:</label>
                        <input name="max" class="text-success center-block "  style="width: 80px" type="number" id="max" value = "100000">
                        <br><input type="submit" name="submit" class="btn-primary" value="Listar">
                    </form>
                    <br>
                    <br>
                </div>


                <div class="col-xs-4">
                    <h2>Procurar:</h2>
                    <!-- atividade 4 - listar empregados com filtro no nome e sobrenome  -->
                    <form id="filtro" class="container-fluid " name="filtro" method="post" action="filtroNome.php">
                        <label>Nome:</label>
                        <input name="nome" class="text-success center-block "  type="text" id="nome" value = "">
                        <br><input type="submit" name="submit" class="btn-primary" value="Listar">
                    </form>
                    <br>
                    <br>
                </div>




            </div>
            <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
                <img alt="Licença Creative Commons" style="border-width:0"
                     src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" />
            </a>
            <br />Este trabalho está licenciado com uma Licença <br><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons - Atribuição-NãoComercial-CompartilhaIgual 4.0 Internacional</a>

        </div>
    </center>

</body>
</html>
