<link rel="stylesheet" href="../css/estilo_PedidoFinalizados.css">
<?php

require_once('conexaoPedido.php');
$pesquisar = $_POST["pesquisa"];
if ($pesquisar != "") {
    list($ano, $mes, $dia) = explode("-", $pesquisar);
    $data = $dia . "/" . $mes . "/" . $ano;
    $select = "SELECT * FROM `pedido` WHERE dataPedido_Produto like '%$data%'";
} else {
    $select = "SELECT * FROM `pedido` WHERE dataPedido_Produto";
}
$pedidosPedentes = $conn->query($select);

if ($pedidosPedentes->num_rows > 0) {
    ?>
    <div class="divPedido">
        <div class="divPedidoBranca">
            <table class='tabela' border='1'>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Quantidade</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Total</th>
                </tr>
                <?php
                while ($exibirPedido = $pedidosPedentes->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><img src="<?php echo $exibirPedido['img_produto'] ?>"></td>
                        <td>
                            <?php echo $exibirPedido['nm_produto'] ?>
                        </td>
                        <td>
                            <?php echo $exibirPedido['dataPedido_produto'] ?>
                        </td>
                        <td>
                            <?php echo $exibirPedido['qtde_produto'] ?>
                        </td>
                        <td class='td_obs'>
                            <?php echo $exibirPedido['obs_produto'] ?>
                        </td>
                        <td>
                            <?php echo $exibirPedido['preco_produto'] ?>
                        </td>
                        <td>
                            <?php echo $exibirPedido['total_produto'] ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        <?php
} else {
    ?>
            <script>
                const divPedidoBranca_Pedente = document.querySelector('.divPedidoBranca_Pendente');
                divPedidoBranca_Pedente.classList.remove("divPedidoBranca_Pendente");
                divPedidoBranca_Pedente.classList.add("divPedidoBranca_vazia");
            </script>

            <div class="divPedido">
                <div class="SemP">
                    <p class='textoPedido'>Nenhum pedido encontrado para esta data! <i
                            class="fa-regular fa-calendar-xmark"></i></p>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>