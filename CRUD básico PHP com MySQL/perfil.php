<?php 
	session_start();
	if(isset($_SESSION['nome']) and isset($_SESSION['senha'])){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="icon" type="image/png" href="icon2.png">
</head>
<body onload="mostrar();">
		<a href="index.php">
			<figure>
			<img id="icon"src ="icon2.png" title="Pagina inicial"><figcaption>APPR</figcaption>
			</figure>
		</a>
		<h1>Perfil</h1>
		<?php
	
		if(isset($_GET['bv'])){
			echo "<p id='text' style='text-align:center;background-color:aqua;'>".$_GET['bv']."</p>";
		};

		?>
		<section>
		<button><a href="cadastrar.php">cadastrar novo item</a></button>
		<button><a href='apagar.php'>Desconectar</a></button>		
		</section>

		<section>
		<h2>Lista de itens cadastrados</h2>
		
			<?php

				if(isset($_GET['c'])){
					echo "<p id='text' style='text-align:center;background-color:aqua;'>".$_GET['c']."</p>";
				
				}else if(isset($_GET['e'])){
					echo "<p id='text' style='text-align:center;background-color:aqua;'>".$_GET['e']."</p>";
				}else if(isset($_GET['r'])){
					echo "<p id='text' style='text-align:center;background-color:aqua;'>".$_GET['r']."</p>";
				};

				include "conexao.php";

				$conn = conectar();

				$sql = "SELECT * FROM produto;";

				$result = $conn->query($sql);
				echo "<ul>";
				if($result->num_rows > 0){
					
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
						echo "<a href='editar.php?codigo=".$row['codigo']."'>Editar</a><a href='remover.php?codigo=".$row['codigo']."'>Remover</a>";
						echo "</li>";
					};
				}else{
					echo "<li>Sem produtos cadastrados</li>";
				};
				echo "</ul>";
			?>
		
	</section>
	<script type="text/javascript" src="script.js"></script>
	<footer>Todos os direitos reservados &copy Associação dos Pequenos Produtores Rurais</footer>
</body>
</html>

<?php
	}else{
		header('Location: index.php');
	};
?>