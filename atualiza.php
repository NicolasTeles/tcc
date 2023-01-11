<?php
    require_once('conexao.php');
    session_start();
    session_unset();
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cel = $_POST['cel'];
    $consulta = "SELECT * FROM cliente WHERE numeroCliente = '" .$cel. "'";
    $resultado = $conn->query($consulta);
    if($resultado->num_rows<=0){
        $sql = "INSERT INTO cliente (nomeCliente, sobrenomeCliente, numeroCliente) 
        VALUES ('" .$nome. "', '" .$sobrenome. "', '" .$cel. "')";
    }else{
        $sql = "UPDATE cliente SET nomeCliente='" .$nome. "', sobrenomeCliente='" .$sobrenome. "' WHERE numeroCliente='" .$cel. "'";
    }
    if($conn->query($sql) === true){
        echo "<script>alert('Login realizado com sucesso!');</script>";
        $_SESSION['nomeCliente'] = $nome;
        $_SESSION['sobrenomeCliente'] = $sobrenome;
        $_SESSION['celCliente'] = $cel;
        header("Location: index.php");
    }else{
        echo "Erro: " .$sql. "<br>" .$conn->error;
        echo "<script>window.history.back();</script>";
    }
?>  