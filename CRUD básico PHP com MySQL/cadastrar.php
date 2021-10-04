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
    <title>Cadastrar</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="icon" type="image/png" href="icon2.png">
</head>
<body>
    <a href="index.php">
        <figure>
        <img id="icon"src ="icon2.png" title="Pagina inicial"><figcaption>APPR</figcaption>
        </figure>
    </a>

    <h1>Cadastrar</h1>
    <button><a href='perfil.php'>Perfil</a></button>
    <form action="Cadastrar_bd.php" method="post">

    <p>
        <label for="nome" >Nome do Produto:</label>
        <input type="text" name="nome" id="nome" required>
    </p>

    <p>
        <label for="descricao" >Descrição</label>
        <input type="text" name="descricao" id="descricao" required>
    </p>

    <p>
        <label for="data" >Data de Validade</label>
        <input type="date" name="data" id="data" required>
    </p>

    <p>
        <label for="valor" >Valor</label>
        <input type="number" name="valor" id="valor" step="0.01" required>
    </p>
    <p><input type="submit" value="cadastrar"></p>

    </form>
    <footer>Todos os direitos reservados &copy Associação dos Pequenos Produtores Rurais</footer>
</body>
</html>
<?php
    }else{
        header('Location: index.php');
    };
?>