<?php
header("location: verPedidos.php");
include('conexaoPedido.php');
echo $_POST['idHidden'];
$selectOcultar = 'SELECT * FROM `pedido`';
$selectPedidos = $conn->query($selectOcultar);

while($ocultarPedido = $selectPedidos->fetch_assoc()){
    if($ocultarPedido['status_pedido'] == 'Pedido concluído'){
        $ocultarPedido = 'UPDATE `pedido` SET `status_pedido`="Pedido finalizado" WHERE id_pedido='.$_POST['idHidden']; 
        $conn->query($ocultarPedido);
    }
}
?>