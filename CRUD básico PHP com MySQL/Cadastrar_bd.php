<?php
session_start();
if(isset($_SESSION['nome']) and isset($_SESSION['senha'])){
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $data_de_validade = $_POST["data"];
    $valor = $_POST["valor"];

    include "conexao.php";

    $conn = conectar();

    $sql = "INSERT INTO produto (nome, descricao, valor, data_de_validade) VALUES ('$nome', '$descricao', '$valor', '$data_de_validade');";

    if($conn->query($sql)){
        header ('location:perfil.php?c=Produto+cadastrado+com+sucesso');
    }

    desconectar($conn);

}else{
    header('Location: index.php');
};
?>
