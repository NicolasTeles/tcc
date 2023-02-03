<?php
require_once('conexao.php');
session_start();
if (isset($_SESSION["idFunc"]) and $_SESSION["tipoFunc"] == "ADMIN") {
    if (isset($_GET['idItem'])) {
        $idItem = $_GET['idItem'];
        $sql = "DELETE FROM item WHERE idItem=$idItem";
        $consulta = "SELECT * FROM item WHERE idItem=$idItem";
        $folder = "imagens/";
        $select = $conn->query($consulta);
        $resultado = $select->fetch_assoc();
        echo "<script>console.log($sql);</script>";
        echo "<script>console.log($consulta);</script>";
        if (file_exists($folder . $resultado['nomeImg'])) {
            if ($conn->query($sql) === TRUE) {
                unlink($folder . $resultado['nomeImg']);
                echo "<script>alert('Registro excluído com sucesso');</script>";
                echo "<script>window.location = 'listaCardapio.php';</script>";
            } else {
                echo "<script>alert('Erro ao excluir o registro');</script>";
                echo "<script>window.location = 'listaCardapio.php';</script>";
            }
        } else {
            echo "<script>alert('Erro ao excluir a imagem');</script>";
        }
    }
}
?>