<html>
  <head>
    <title>Atividade Final</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="icon" type="image/png" href="icon2.png">
  </head>
  <body>

    <a href="index.php">
      <figure>
      <img id="icon"src ="icon2.png" title="Pagina inicial"><figcaption>APPR</figcaption>
      </figure>
    </a>
    <h1>Associação dos Pequenos Produtores Rurais</h1>
    
    
    
    

    <?php
      session_start();
      if(isset($_SESSION['nome']) and isset($_SESSION['senha'])){
        echo "<button><a href='perfil.php'>Perfil</a></button>";
        echo "<button><a href='apagar.php'>Desconectar</a></button>";        
      }else {
        echo "<a href='login.php' title='Clique para fazer login'><button id='login'>Login</button></a>";
      };

      include "conexao.php";

      $conn = conectar();

      $sql = "SELECT * FROM produto;";

      $result = $conn->query($sql);

      if($result->num_rows > 0){
        echo "<h2>Produtos</h2>";
        echo "<ul>";
        while($row = $result->fetch_assoc()){
          echo "<li>";
          echo "Nome: ".$row['nome'];
          echo "<br/>";
          echo "Descrição: ".$row['descricao'];
          echo "<br/>";
          echo "Valor: R$".$row['valor'];
          echo "<br/>";
          echo "Data de Validade: ".$row['data_de_validade'];
          echo "<br/>";
          echo "</li>";
        };
        echo "</ul>";
      }else{
        echo "<li>Sem produtos no momento</li>";
      };

    ?>
      <footer>Todos os direitos reservados &copy Associação dos Pequenos Produtores Rurais</footer>
  </body>
</html>