<?php
    require_once('conexao.php');
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cel = $_POST['cel'];
    $consulta = "SELECT * FROM cliente WHERE numeroCliente = '" .$cel. "'";
    $resultado = $conn->query($consulta);
    if($resultado->num_rows<=0){
        $sql = "INSERT INTO cliente (nomeCliente, sobrenomeCliente, numeroCliente) 
        VALUES ('" .$nome. "', '" .$sobrenome. "', '" .$cel. "')";
        if($conn->query($sql) === true){
            echo "<script>alert('Registro inserido com sucesso!');</script>";
            echo "<script>window.location = 'cadastro.php';</script>";
        }else{
            echo "Erro: " .$sql. "<br>" .$conn->error;
            echo "<script>window.history.back();</script>";
        }
    }else{
        echo "<script>alert('Esse número de telefone já está cadastrado')</script>";
        echo "<script>window.location = 'cadastro.php';</script>";
    }
?>