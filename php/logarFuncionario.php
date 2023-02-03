<?php
    require_once("conexao.php");
    session_start();
    session_unset();
    $email = $_POST["emailFunc"];
    $senha = $_POST["senhaFunc"];
    $sql = "SELECT * FROM funcionario WHERE emailFuncionario ='" .$email. "'";
    $resultado = $conn->query($sql);
    if($resultado->num_rows<=0){
        echo "<script>alert('Email não cadastrado');</script>";
        echo "<script>window.location = 'loginFuncionario.php';</script>";
    }else{
        $select = $resultado->fetch_assoc();
        if($senha != $select["senhaFuncionario"]){
            echo "<script>alert('Senha incorreta');</script>";
            echo "<script>window.location = 'loginFuncionario.php';</script>";
        }else{
            $_SESSION["nomeFunc"] = $select["nomeFuncionario"];
            $_SESSION["sobrenomeFunc"] = $select["sobrenomeFuncionario"];
            $_SESSION["emailFunc"] = $select["emailFuncionario"];
            $_SESSION["tipoFunc"] = $select["tipoFuncionario"];
            $_SESSION["idFunc"] = $select["idFuncionario"];
            header("Location: admin.php");
        }
    }
?>