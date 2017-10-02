<?php
require_once './BD/DataBase.php';


//pegar o id atraves do método get
$id = $_GET[""];


//instancia do banco
$conn = DataBase::getInstance()->getDb();

//criacao do sql
//TAREFA criar um sql que pegue todos os dados de um determinado empregado =============================================
$sql = "";
$stmt = $conn->prepare($sql);

//execucao do sql
$stmt->execute();

//fetch unique pega apenas um resultado
$resultado = $stmt->fetch(PDO::FETCH_UNIQUE);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Aula Banco de Dados</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body class="bg-warning">
    <center><br><br><br>

        <div class="container">

            <!--Formulario que envia os dados para a funcao de insercao. cada input serve para enviar uma informacao,
            atentar nos nomes e id dos input-->
            <form id="filtro" class="container-fluid " name="filtro" method="post" action="update.php">
                <br>Nome: <input name="nome" class="text-success center-block "  type="text" id="nome" value = "<?php echo $resultado["nome"]; ?>">
                <br>Sobrenome: <input name="sobrenome" class="text-success center-block "  type="text" id="sobrenome" value = "<?php /* parametro */; ?>">
                <br>E-mail: <input name="email" class="text-success center-block "  type="text" id="email" value = "<?php /* parametro */; ?>">
                <br>Cargo: <input name="cargo" class="text-success center-block "  type="text" id="cargo" value = "<?php /* parametro */; ?>">
                <br>Salário: <input name="salario" class="text-success center-block "  type="number" id="salario" value = "<?php /* parametro */; ?>">                
                <br>
                <input name="id"  type="hidden" id="id" value = "<?php echo ($resultado["id"]); ?>">
                <input type="submit" name="submit" class="alert-success" value="Cadastrar">
            </form>
        </div>
    </center>
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

</body>
</html>
