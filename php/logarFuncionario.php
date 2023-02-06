<?php
require_once("conexao.php");
session_start();
session_unset();
$email = $_POST["emailFunc"];
$senha = $_POST["senhaFunc"];
$sql = "SELECT * FROM funcionario WHERE emailFuncionario ='" . $email . "'";
$resultado = $conn->query($sql);
if ($resultado->num_rows <= 0) {
    echo "<script>alert('Email não cadastrado');</script>";
    echo "<script>window.location = 'loginFuncionario.php';</script>";
} else {
    $select = $resultado->fetch_assoc();
    $senhaBD = $select["senhaFuncionario"];
    if (password_verify($senha, $senhaBD)) {
        $_SESSION["nomeFunc"] = $select["nomeFuncionario"];
        $_SESSION["sobrenomeFunc"] = $select["sobrenomeFuncionario"];
        $_SESSION["emailFunc"] = $select["emailFuncionario"];
        $_SESSION["tipoFunc"] = $select["tipoFuncionario"];
        $_SESSION["idFunc"] = $select["idFuncionario"];
        header("Location: admin.php");
    } else {
        echo "<script>alert('Senha Incorreta');</script>";
        echo "<script>window.location = 'loginFuncionario.php';</script>";
    }
}
?>