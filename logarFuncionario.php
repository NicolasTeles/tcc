<?php
    require_once("conexao.php");
    $email = $_POST["emailFunc"];
    $senha = $_POST["senhaFunc"];
    $sql = "SELECT * FROM funcionario WHERE emailFuncionario ='" .$email. "'";
    $resultado = $conn->query($sql);
    if($resultado->num_rows<=0){
        echo "<script>alert('Email não cadastrado');</script>";
        echo "<script>window.location = 'loginFuncionario.php';</script>";
    }else{
        $validarSenha = $resultado->fetch_assoc();
        if($senha != $validarSenha["senhaFuncionario"]){
            echo "<script>alert('Senha incorreta');</script>";
            echo "<script>window.location = 'loginFuncionario.php';</script>";
        }else{
            echo "<script>alert('login concluido com êxito');</script>";
            echo "<script>window.location = 'loginFuncionario.php';</script>";
        }
    }
?>