<?php
header("location: verPedidos.php");
include('conexaoPedido.php');
echo $_POST['idHidden'];
$selectUpdate = 'SELECT * FROM `pedido`';
$selectPedidos = $conn->query($selectUpdate);

while ($updatePedidos = $selectPedidos->fetch_assoc()) {
    if ($updatePedidos['status_pedido'] == 'Pedido em processo') {
        $updatePendente = 'UPDATE `pedido` SET `status_pedido`="Pedido concluído" WHERE id_pedido=' . $_POST['idHidden'];
        $conn->query($updatePendente);
    }
}
?>