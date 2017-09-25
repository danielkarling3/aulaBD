

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body class="bg-warning">
    <center><br><br><br>

        <div class="container">

            <!--Formulario que envia os dados para a funcao de insercao. cada input serve para enviar uma informacao,
            atentar nos nomes e id dos input-->
            <form id="filtro" class="container-fluid " name="filtro" method="post" action="inserir.php">
                <br>Nome: <input name="nome" class="text-success center-block "  type="text" id="nome" value = "">
                <br>Sobrenome: <input name="sobrenome" class="text-success center-block "  type="text" id="sobrenome" value = "">
                <br>E-mail: <input name="email" class="text-success center-block "  type="text" id="email" value = "">
                <br>Cargo: <input name="cargo" class="text-success center-block "  type="text" id="cargo" value = "">
                <br>Salário: <input name="salario" class="text-success center-block "  type="number" id="salario" value = "0">                
                <br>
                <input type="submit" name="submit" class="alert-success" value="Cadastrar">
            </form>
        </div>
    </center>

</body>
</html>
