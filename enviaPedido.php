<?php
require_once("conexaoPedido.php");
session_start();
print_r($_GET);
$dataPedido_produto = $_GET['data'];
$img_produto = $_GET['imagem_produto'];
$nm_produto = $_GET['nome'];
$qtde_produto = $_GET['qtde'];
$preco_produto = $_GET['preco'];
$total_produto = $_GET['total'];
$status_pedido = $_GET['status'];
$nomeCliente = $_SESSION["nomeCliente"];
$celCliente = $_SESSION["celCliente"];

    $inserir = "INSERT INTO pedido 
    (dataPedido_produto, img_produto, nm_produto,  qtde_produto, preco_produto, total_produto, status_pedido, nomeCliente, numeroCliente) 
    VALUES ('".$dataPedido_produto."','".$img_produto."','".$nm_produto."', '".$qtde_produto."', '".$preco_produto."',  
    '".$total_produto."',  '".$status_pedido."', '" .$nomeCliente. "', '" .$celCliente. "')";
    if($conn->query($inserir)){
        header("location: index.php");
    }else{
        echo "<script>alert('Erro ao enviar pedido');</script>";
    }
?>
