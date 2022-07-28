<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>É Nós</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        form {
            background: #000;
            color: #fff;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
        input {
            width:70%;
            height: 30px;
            padding: 10px;
        }
        button {
            width: 150px;
            margin: 0px 0px 10px 0px;
            border-radius: 7px;
            height: 30px;
            font-weight: bold;
            background: #aaf;
        }
        button:hover {
            background: yellow;
        }
        ol {
            padding: 50px;
        }
    </style>
</head>
<body>

    <form action="add_bd.php" method='post'>
        <h2>Adicione seu nome</h2>
        <input type="text" name='nome' placeholder='Digite seu nome'><br>
        <button type="submit">Adicionar</button>
    </form>

    <ol>
        <?php
            include "conexao.php";
            $conn = conectar();
            $sql = "SELECT * FROM nomes;";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<li>".$row['nome']."</li>";
                }
            }
        ?>
    </ol>
    
</body>
</html>