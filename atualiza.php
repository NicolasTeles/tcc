<?php
    include 'conexao.php';
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cel = $_POST['cel'];
    $sql = "UPDATE cliente SET nomeCliente='" .$nome. "', sobrenomeCliente='" .$sobrenome. "' WHERE numeroCliente='" .$cel. "'";
    $consulta = "SELECT * FROM cliente WHERE numeroCliente = '" .$cel. "'";
    $resultado = $conn->query($consulta);
    if($resultado->num_rows<=0){
        echo "<script>alert('Esse número de telefone não está cadastrado')</script>";
        echo "<script>window.location = 'login.php';</script>";
    }else{
        if($conn->query($sql) === true){
            echo "<script>alert('Registro atualizado com sucesso!');</script>";
            echo "<script>window.location = 'login.php';</script>";
        }else{
            echo "Erro: " .$sql. "<br>" .$conn->error;
            echo "<script>window.history.back();</script>";
        }
    }
?>