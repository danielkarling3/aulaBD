<?php
require_once './BD/DataBase.php';


//pegar o id atraves do método get
$id = $_GET["id"];                                


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
                <br>Sobrenome: <input name="sobrenome" class="text-success center-block "  type="text" id="sobrenome" value = "<?php echo $resultado["sobrenome"]; ?>">
                <br>E-mail: <input name="email" class="text-success center-block "  type="text" id="email" value = "<?php echo $resultado["email"]; ?>">
                <br>Cargo: <input name="cargo" class="text-success center-block "  type="text" id="cargo" value = "<?php echo $resultado["cargo"]; ?>">
                <br>Salário: <input name="salario" class="text-success center-block "  type="number" id="salario" value = "<?php echo (float)($resultado["salario"]); ?>">                
                <br>
                <input name="id"  type="hidden" id="id" value = "<?php echo ($resultado["id"]); ?>">
                <input type="submit" name="submit" class="alert-success" value="Cadastrar">
            </form>
        </div>
    </center>

</body>
</html>
