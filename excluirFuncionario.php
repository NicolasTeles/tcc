<?php
require_once("conexao.php");
session_start();
if (isset($_SESSION["idFunc"]) and $_SESSION["tipoFunc"] == "ADMIN") {
    if (isset($_GET["idFunc"])) {
        $idFunc = $_GET["idFunc"];
        $sql = "DELETE FROM funcionario WHERE idFuncionario = $idFunc";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Funcionário deletado com sucesso');</script>";
            header("Location: listaFuncionario.php");
        } else {
            echo "<script>alert('Erro ao deletar o funcionário');</script>";
            header("Location: listaFuncionario.php");
        }
    }
}
?>