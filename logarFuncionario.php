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
        $exibir = $resultado->fetch_assoc();
        if($senha != $exibir["senhaFuncionario"]){
            echo "<script>alert('Senha incorreta');</script>";
            echo "<script>alert('" .$email. "');</script>";
            echo "<script>window.location = 'loginFuncionario.php';</script>";
            echo "<script>let emailFunc = document.getElementById('emailFunc');</script>";
            echo "<script>emailFunc.value =" .$email. ";</script>";
            
            
        }else{
            echo "<script>alert('login concluido com êxito');</script>";
            echo "<script>window.location = 'loginFuncionario.php';</script>";
        }
    }
?>