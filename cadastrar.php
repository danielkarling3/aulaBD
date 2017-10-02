

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
        <br>
        <br>
        <center>
            <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
                <img alt="Licença Creative Commons" style="border-width:0"
                     src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" />
            </a>
            <br />Este trabalho está licenciado com uma Licença <br><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons - Atribuição-NãoComercial-CompartilhaIgual 4.0 Internacional</a>
        </center>
        <br>
        <br>
    </center>

</body>
</html>
