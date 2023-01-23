<?php
header("location: verPedidos.php");
include('conexao.php');
echo $_POST['idHidden'];
$selectOcultar = 'SELECT `img_produto`, `nm_produto`, `qtde_produto`, `desc_produto`, `preco_produto`, `total_produto`, `dataPedido_produto`, `status_pedido`, `id_pedido` FROM `pedido`';
$selectPedidos = $conn->query($selectOcultar);

while($ocultarPedido = $selectPedidos->fetch_assoc()){
        if($ocultarPedido['status_pedido'] == 'Pedido concluído'){
            $ocultarPedido = 'UPDATE `pedido` SET `status_pedido`="Pedido finalizado" WHERE id_pedido='.$_POST['idHidden']; 
            $conn->query($ocultarPedido);
        }
}
?>