<?php
header("location: verPedidos.php");
include('conexao.php');
echo $_POST['idHidden'];
$selectUpdate = 'SELECT `img_produto`, `nm_produto`, `qtde_produto`, `desc_produto`, `preco_produto`, `total_produto`, `dataPedido_produto`, `status_pedido`, `id_pedido` FROM `pedido`';
$selectPedidos = $conn->query($selectUpdate);

while($updatePedidos = $selectPedidos->fetch_assoc()){
        if($updatePedidos['status_pedido'] == 'Pedido em processo'){
            $updatePendente = 'UPDATE `pedido` SET `status_pedido`="Pedido concluído" WHERE id_pedido='.$_POST['idHidden']; 
            $conn->query($updatePendente);
        }
}
?>