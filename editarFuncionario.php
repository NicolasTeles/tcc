<?php
require_once("conexao.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
        if (isset($_POST["nomeFunc"])) {
            $idFunc = $_GET['idFunc'];
            $nomeFunc = $_POST['nomeFunc'];
            $emailFunc = $_POST['emailFunc'];
            $senhaFunc = $_POST['senhaFunc'];

            $sql = "UPDATE funcionario SET
            nomeFuncionario = '$nomeFunc',
            emailFuncionario = '$emailFunc',
            senhaFuncionario = '$senhaFunc'
            WHERE idFuncionario = $idFunc";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registro atualizado com sucesso');</script>";
                header("Location: admin.php");
            }else{
                echo "<script>alert('Erro ao atualizar o registro');</script>";
                header("Location: admin.php");
            }
        }
        
        if (isset($_GET["idFunc"])) {
            $idFunc = $_GET['idFunc'];
            $consulta = "SELECT *  FROM funcionario WHERE idFuncionario = $idFunc";
            $resultado = $conn->query($consulta);
            $exibir = $resultado->fetch_assoc();
        }
        ?>
    </body>
</html>