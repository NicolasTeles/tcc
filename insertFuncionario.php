<?php
    require_once("conexao.php");
    $nomeCompleto = $_POST["nomeFunc"] ." ". $_POST["sobrenomeFunc"];
    $email = $_POST["emailFunc"];
    //encriptar senha: $senha = password_hash($_POST["senhaFunc"], PASSWORD_ARGON2I);
    $senha = $_POST["senhaFunc"];
    $consulta = "SELECT * FROM funcionario WHERE emailFuncionario = '" .$email. "'";
    $resultado = $conn->query($consulta);
    if($resultado->num_rows<=0){
        $sql = "INSERT INTO funcionario (nomeFuncionario, emailFuncionario, senhaFuncionario)
        VALUES ('" .$nomeCompleto. "', '" .$email. "', '" .$senha. "')";
        if($conn->query($sql) === true){
            echo "<script>alert('Funcionário inserido com sucesso!');</script>";
            header("Location: admin.php");
        }else{
            echo "Erro: " .$sql. "<br>" .$conn->error;
            echo "<script>window.history.back();</script>";
        }
    }else{
        echo "<script>alert('Esse email já está cadastrado')</script>";
        echo "<script>window.location = 'cadastraFuncionario.php';</script>";
    }
?>