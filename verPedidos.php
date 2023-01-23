<?php
require_once('conexaoPedido.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo_Pedidos.css">
    <title>Ver pedidos</title>
</head>

<body>
    <header class="classcabecalho"> <img src="img/logo3.png" class="logoimg"></header>
    <br><br><br><br><br><br><br><br>
    <h1 class='blog-title'>Pedidos Pendentes</h1>
    <div class='divPedido'>
        <div class='divPedidoBranca_Pendente'>
            <?php
            $select = 'SELECT * FROM pedido WHERE status_pedido= "Pedido feito"';
            $pedidosPedentes = $conn->query($select);
            if ($pedidosPedentes->num_rows > 0) {
            ?>
                <table class='tabela' border='1'>
                    <tr>
                        <th>Cliente</th>
                        <th>Celular</th>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    while ($exibirPedido = $pedidosPedentes->fetch_assoc()) {
                    ?>
                        <script>
                            let precoSeparado = this.arrayProdutos[i].preco.split(".");
                            let precoNum = Number(precoSeparado[1] + "." + precoSeparado[2]);
                            let totalNum = precoNum * this.arrayProdutos[i].qtde;
                            let totalString = totalNum.toString().split(".");
                            if (totalString[1] != undefined && totalString[1] != null) {
                                td_total.innerText = "R$" + (totalString[0] + "," + totalString[1] + "0");
                            } else {
                                td_total.innerText = "R$" + (totalString[0] + ",00");
                            }
                        </script>
                        <tr>
                            <td><?php echo $exibirPedido["nomeCliente"] ?></td>
                            <td><?php echo $exibirPedido["numeroCliente"] ?></td>
                            <td><img src="<?php echo $exibirPedido['img_produto'] ?>"></td>
                            <td><?php echo $exibirPedido['nm_produto'] ?></td>
                            <td><?php echo $exibirPedido['qtde_produto'] ?></td>
                            <td class='td_desc'><?php echo $exibirPedido['desc_produto'] ?></td>
                            <td><?php echo $exibirPedido['preco_produto'] ?></td>
                            <td><?php echo $exibirPedido['total_produto'] ?></td>
                            <td>
                                <div class='divStatus'>
                                    <form action='atualizarPedidoFeito.php' method='POST'>
                                        <input type='hidden' name='idHidden' value=<?php echo $exibirPedido['id_pedido'] ?>>
                                        <input type='submit' value=' Vou preparar!' class='buttonPedidoPendente'>
                                    </form>
                                </div>

                                <div class='divCancelado'>
                                    <form action='CancelarPedido.php' method='POST'>
                                        <input type='hidden' name='idHidden' value=<?php echo $exibirPedido['id_pedido'] ?>>
                                        <input type='submit' value='Pedido cancelado!' class='buttonPedidoCancelado'>
                                    </form>
                                </div>
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
                <p class='textoPedido'>Não há pedidos pendentes!</p>
            <?php
            }
            ?>
        </div>
    </div>

    <h1 class='blog-title'>Pedidos em processo</h1>
    <div class='divPedido'>
        <div class='divPedidoBranca_Processo'>
            <?php
            $select = 'SELECT * FROM pedido WHERE status_pedido= "Pedido em processo"';
            $pedidosPedentes = $conn->query($select);
            if ($pedidosPedentes->num_rows > 0) {
            ?>
                <table class='tabela' border='1'>
                    <tr>
                        <th>Cliente</th>
                        <th>Celular</th>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    while ($exibirPedido = $pedidosPedentes->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $exibirPedido["nomeCliente"] ?></td>
                            <td><?php echo $exibirPedido["numeroCliente"] ?></td>
                            <td><img src="<?php echo $exibirPedido['img_produto'] ?>"></td>
                            <td><?php echo $exibirPedido['nm_produto'] ?></td>
                            <td><?php echo $exibirPedido['qtde_produto'] ?></td>
                            <td class='td_desc'><?php echo $exibirPedido['desc_produto'] ?></td>
                            <td><?php echo $exibirPedido['preco_produto'] ?></td>
                            <td><?php echo $exibirPedido['total_produto'] ?></td>
                            <td>
                                <form action='atualizarPedidoProcesso.php' method='POST'>
                                    <input type='hidden' name='idHidden' value=<?php echo $exibirPedido['id_pedido'] ?>>
                                    <input type='submit' value='Pedido pronto!' class='buttonPedidoConcluido'>
                                </form>
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
                    const divPedidoBranca_Processo = document.querySelector('.divPedidoBranca_Processo');
                    divPedidoBranca_Processo.classList.remove("divPedidoBranca_Processo");
                    divPedidoBranca_Processo.classList.add("divPedidoBranca_vazia");
                </script>
                <p class='textoPedido'>Não há pedidos em processo!</p>
            <?php
            }
            ?>
        </div>
    </div>

    <h1 class='blog-title'>Pedidos concluído</h1>
    <div class='divPedido'>
        <div class='divPedidoBranca_Concluido'>
            <?php
            $select = 'SELECT * FROM pedido WHERE status_pedido="Pedido concluído"';
            $pedidosPedentes = $conn->query($select);
            if ($pedidosPedentes->num_rows > 0) {
            ?>
                <table class='tabela' border='1'>
                    <tr>
                        <th>Cliente</th>
                        <th>Celular</th>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    while ($exibirPedido = $pedidosPedentes->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $exibirPedido["nomeCliente"] ?></td>
                            <td><?php echo $exibirPedido["numeroCliente"] ?></td>
                            <td><img src="<?php echo $exibirPedido['img_produto'] ?>"></td>
                            <td><?php echo $exibirPedido['nm_produto'] ?></td>
                            <td><?php echo $exibirPedido['qtde_produto'] ?></td>
                            <td class='td_desc'><?php echo $exibirPedido['desc_produto'] ?></td>
                            <td><?php echo $exibirPedido['preco_produto'] ?></td>
                            <td><?php echo $exibirPedido['total_produto'] ?></td>
                            <td>
                                <div class='divStatus'>
                                    <form action='ocultarPedidoConcluido.php' method='POST'>
                                        <input type='hidden' name='idHidden' value=<?php echo $exibirPedido['id_pedido'] ?>>
                                        <input type='submit' value='Pedido pago' class='buttonPedidoFinalizado'>
                                    </form>
                                </div>
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
                    const divPedidoBranca_Concluido = document.querySelector('.divPedidoBranca_Concluido');
                    divPedidoBranca_Concluido.classList.remove("divPedidoBranca_Concluido");
                    divPedidoBranca_Concluido.classList.add("divPedidoBranca_vazia");
                </script>
                <p class='textoPedido'>Não há pedidos concluídos!</p>
            <?php
            }
            ?>
        </div>
    </div>

</body>

</html>