<?php 
function conectar(){
	$servidor = "localhost";
	$usuario = "root";
	$senha = "root";
	$banco = "associacao";

	$conn = new mysqli($servidor, $usuario, $senha, $banco);

	if($conn->connect_error){
		die("Servidor indisponivel no momento".$conn->connect_error);
	};

	return $conn;
}

function desconectar($conn){
	$conn->close();
};

?>