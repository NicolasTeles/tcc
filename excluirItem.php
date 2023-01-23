<?php
require_once('conexao.php');
if(isset($_GET['idItem'])){
    $idItem = $_GET['idItem'];
    $sql = "DELETE FROM item WHERE idItem=$idItem";
    $consulta = "SELECT * FROM item WHERE idItem=$idItem";
    $folder = "imagens/";
    $resultado = $conn->query($consulta);
    echo "<script>console.log($sql);</script>";
    echo "<script>console.log($consulta);</script>";
    /*if($conn->query($sql) === TRUE){
        echo "<script>alert('Registro excluído com sucesso');</script>";
        if (file_exists($folder . $resultado['nomeImg'])) {
            unlink($folder . $resultado['nomeImg']);
        }else{
            echo "<script>alert('Erro ao excluir a imagem');</script>";
        }
    }else{
        echo "<script>alert('Erro ao excluir o registro');</script>";
        header("Location: listaCardapio.php");
    }*/
}
?>