<?php
require_once("conexao.php");
session_start();
$nomeFunc = $_POST["nomeFunc"];
$sobrenomeFunc = $_POST["sobrenomeFunc"];
$emailFunc = $_POST["emailFunc"];
$tipoFunc = $_POST["tipoFunc"];
$senhaFunc = $_POST["senhaFunc"];
//$senhaFunc = password_hash($_POST["senhaFunc"], PASSWORD_BCRYPT);
$consulta = "SELECT * FROM funcionario WHERE emailFuncionario = '" . $emailFunc . "'";
$resultado = $conn->query($consulta);
if ($resultado->num_rows <= 0) {
    $sql = "INSERT INTO funcionario (nomeFuncionario, sobrenomeFuncionario, emailFuncionario, senhaFuncionario, tipoFuncionario)
        VALUES ('" . $nomeFunc . "', '" . $sobrenomeFunc . "', '" . $emailFunc . "', '" . $senhaFunc . "', '" . $tipoFunc . "')";
    if ($conn->query($sql) === true) {
        header("Location: admin.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
        echo "<script>window.history.back();</script>";
    }
} else {
    echo "<script>alert('Esse email já está cadastrado')</script>";
    echo "<script>window.location = 'cadastraFuncionario.php';</script>";
}
?>