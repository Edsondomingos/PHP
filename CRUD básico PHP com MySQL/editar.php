<?php 
    session_start();
    if(isset($_SESSION['nome']) and isset($_SESSION['senha'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Projeto</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="icon" type="image/png" href="icon2.png">
</head>
<body>

    <?php
    
    $codigo = $_GET["codigo"];

    include "conexao.php";

    $conn = conectar();

    $sql = "SELECT * FROM produto WHERE codigo=".$codigo;

    $result = $conn->query($sql);

    $nome ="nome";
    $descricao ="descricao";
    $data_de_validade="data_de_validade";
    $valor="valor";

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $nome = $row["nome"];
            $descricao = $row["descricao"];
            $data_de_validade = $row["data_de_validade"];
            $valor = $row["valor"];
        }
    }

    desconectar($conn);




    ?>
    <a href="index.php">
        <figure>
        <img id="icon"src ="icon2.png" title="Pagina inicial"><figcaption>APPR</figcaption>
        </figure>
    </a>
    <h1>Editar Projeto</h1>
    <button><a href='perfil.php'>Perfil</a></button>
    <form action="editar_bd.php" method="post">
    <p>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>"  required/>
    </p>
    <p>
        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" value="<?php echo $descricao; ?>" required/>
    </p>
    <p>
        <label for="data">Data de Validade</label>
        <input type="date" name="data_de_validade" id="data_de_validade" value="<?php echo $data_de_validade; ?>"  required/>
    </p>
    <p>
        <label for="valor">Valor</label>
        <input type="number" name="valor" id="valor" step="0.01" value="<?php echo $valor; ?>" required/>
    </p>

    <input type="hidden" name="codigo" value="<?php echo $codigo; ?>" />

    <p>
        <input type="submit" value="Editar">
    </p>
    </form>

    <footer>Todos os direitos reservados &copy Associação dos Pequenos Produtores Rurais</footer>
</body>
</html>
<?php
    }else{
        header('Location: index.php');
    };
?>