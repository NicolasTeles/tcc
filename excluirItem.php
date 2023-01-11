<?php
require_once('conexao.php');
if(isset($_GET['idItem'])){
    $idItem = $_GET['idItem'];
    $sql = "DELETE FROM item WHERE idItem=$idItem";
    $consulta = "SELECT * FROM item WHERE idItem=$idItem";
    $folder = "imagens/";
    $resultado = $conn->query($consulta);
    $exibir = $resultado->fetch_assoc();
    if($conn->query($sql) === TRUE){
        echo "<script>alert('Registro excluído com sucesso');</script>";
        if (file_exists($folder . $exibir['nomeImg'])) {
            unlink($folder . $exibir['nomeImg']);
        }
        header("Location: listaCardapio.php");
    }else{
        echo "<script>alert('Erro ao excluir o registro');</script>";
        header("Location: listaCardapio.php");
    }
}
?>