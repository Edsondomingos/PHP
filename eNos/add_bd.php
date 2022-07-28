<?php
    $nome = $_POST['nome'];

    include 'conexao.php';
    $conn = conectar();
    $sql = "INSERT INTO nomes (nome) VALUES ('$nome');";

    $result = $conn->query($sql);

    if ($result){
        header('Location: index.php');
    } else {
        echo $conn->error;
    }

?>