<?php
 
session_start();
if(isset($_SESSION['nome']) and isset($_SESSION['senha'])){

    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $data_de_validade = $_POST["data_de_validade"];
    $valor = $_POST["valor"];

    include "conexao.php";

    $conn = conectar();

    $sql = "UPDATE produto SET nome='".$nome."' , valor='".$valor."' , descricao='".$descricao."' , data_de_validade='".$data_de_validade."' WHERE codigo=".$codigo;

    if($conn->query($sql)){
        header ('location:perfil.php?e=Produto+alterado+com+sucesso');
    }else{
        echo "ocorreu algum erro";
    }

    desconectar($conn);

}else{
    header('Location: index.php');
};
?>
?>