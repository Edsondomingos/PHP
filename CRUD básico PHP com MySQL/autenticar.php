<?php 
    include "conexao.php";

    // $_SESSION['nome'] = $_POST["usuario"];
    // $_SESSION['senha'] = $_POST["senha"];

    $conn = conectar();

    // $sql = "SELECT * FROM associacao WHERE nome ='".$_SESSION['nome']."' and senha = '".$_SESSION['senha']."';";
    $sql = "SELECT * FROM associacao WHERE nome ='".$_POST['usuario']."' and senha = '".$_POST['senha']."';";
  
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        header('Location: perfil.php?bv=Seja+bem+vindo');
        session_start();
        $_SESSION['nome'] = $_POST["usuario"];
        $_SESSION['senha'] = $_POST["senha"];
    }else{
        header('Location: login.php?autenticar=usuario+ou+senha+incorreta,+tente+novamente.');
    };

    desconectar($conn);
?>