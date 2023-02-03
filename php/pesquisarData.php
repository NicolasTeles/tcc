<?php 
require_once('conexaoPedido.php');
$data = $_POST['textPesquisar'];
echo $data;
        $select = 'SELECT * FROM pedido WHERE dataPedido_produto='.$data;
        $pedidosPedentes = $conn->query($select);
        if($pedidosPedentes->num_rows > 0){    
             
        }
?>