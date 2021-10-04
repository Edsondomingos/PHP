<html>
  <head>
    <title>Autenticar Usuário</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="icon" type="image/png" href="icon2.png">
  </head>
  <body>
    <a href="index.php"><img id="icon"src ="icon2.png" title="Pagina inicial"></a>
    <h1>Login</h1>  

    <form action="autenticar.php" method="POST">
        <?php
          if (isset($_GET["autenticar"])) {
            echo "<strong style='color:red;'>" .$_GET["autenticar"]. "</strong>";
          };
        ?>
        <p> <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" /></p>
        
            
        
        <p> <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" /></p>
            
        <input type="submit" value="Autenticar" name="autenticar" >       
       
    </form>

    <footer>Todos os direitos reservados &copy Associação dos Pequenos Produtores Rurais</footer>
</body>
</html>