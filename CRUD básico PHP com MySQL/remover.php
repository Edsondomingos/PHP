<?php
session_start();
if(isset($_SESSION['nome']) and isset($_SESSION['senha'])){
    $codigo = $_GET["codigo"];

    include "conexao.php";

    $conn = conectar();

    $sql = "DELETE FROM produto WHERE codigo=".$codigo;

    if($conn->query($sql)){
        header ('location:perfil.php?r=Removido+com+sucesso');
    }else{
        echo "Deu erro!";
        echo $conn->error;
    }

    desconectar($conn);
}else{
    header('Location: index.php');
};
?>