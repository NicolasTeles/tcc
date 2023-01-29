<?php
    require_once("conexao.php");
    $nomeFunc = $_POST["nomeFunc"];
    $sobrenomeFunc = $_POST["sobrenomeFunc"];
    $emailFunc = $_POST["emailFunc"];
    //encriptar senha: $senha = password_hash($_POST["senhaFunc"], PASSWORD_ARGON2I);
    $senhaFunc = $_POST["senhaFunc"];
    $consulta = "SELECT * FROM funcionario WHERE emailFuncionario = '" .$emailFunc. "'";
    $resultado = $conn->query($consulta);
    if($resultado->num_rows<=0){
        $sql = "INSERT INTO funcionario (nomeFuncionario, sobrenomeFuncionario, emailFuncionario, senhaFuncionario)
        VALUES ('" .$nomeFunc. "', '" .$sobrenomeFunc. "', '" .$emailFunc. "', '" .$senhaFunc. "')";
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