<?php
include('conexaoPedido.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="verPedidosFinalizados_js.js"></script>
    <link rel="stylesheet" href="estilo_Pedidos.css">
    <link rel="stylesheet" href="estilo_Guilherme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Ver pedidos</title>
</head>

<body>
    <header><img src="img/logo3.png" class="logoimg">
        <ul class="headerUL">
            <li class="headerLI"><button class="menu-btn" onclick="home()"><i class="fa-solid fa-house-chimney carrinho fa-3x"></i> </button></li>
        </ul>
    </header>
    <br><br><br><br><br><br><br><br>
    <h1 class="blog-title"> Progresso dos Pedidos <i class="fa-solid fa-pen-to-square"></i> </h1>
    <h2 class='subti'> Pendentes <i class="fa-solid fa-hourglass-start"></i></h2>
    <div class='divPedido'>
        <div class='divPedidoBranca_Pendente'>
            <?php
            $select = 'SELECT * FROM `pedido` WHERE `status_pedido`= "Pedido feito"';
            $pedidosPedentes = $conn->query($select);
            if ($pedidosPedentes->num_rows > 0) {
            ?>
                <table class='tabela'>
                    <tr>

                        <th colspan=2>Nome</th>
                        <th>Quantidade</th>
                        <th>Obs</th>
                        <th>Preço</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    while ($exibirPedido = $pedidosPedentes->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><img src="<?php echo $exibirPedido['img_produto'] ?>"></td>
                            <td><?php echo $exibirPedido['nm_produto'] ?></td>
                            <td><?php echo $exibirPedido['qtde_produto'] ?></td>
                            <td class='td_obs'><?php echo $exibirPedido['obs_produto'] ?></td>
                            <td><?php echo $exibirPedido['preco_produto'] ?></td>
                            <td><?php echo $exibirPedido['total_produto'] ?></td>
                            <td>
                                <div class='divStatus'>
                                    <form action='atualizarPedidoFeito.php' method='POST'>
                                        <input type='hidden' name='idHidden' value=<?php echo $exibirPedido['id_pedido'] ?>>
                                        <input type='submit' value='Preparar' class='buttonPedidoPendente'>
                                    </form>
                                </div>

                                <div class='divCancelado'>
                                    <form action='CancelarPedido.php' method='POST'>
                                        <input type='hidden' name='idHidden' value=<?php echo $exibirPedido['id_pedido'] ?>>
                                        <input type='submit' value='Cancelar' class='buttonPedidoCancelado'>
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
                <p class='textoPedido'>Não existem pedidos pendentes <i class="fa-regular fa-calendar-xmark"></i></p>
            <?php
            }
            ?>
        </div>
    </div>

    <h2 class='subti'> Em processo <i class="fa-solid fa-hourglass-half"></i></h2>
    <div class='divPedido'>
        <div class='divPedidoBranca_Processo'>
            <?php
            $select = 'SELECT * FROM `pedido` WHERE `status_pedido`= "Pedido em processo"';
            $pedidosPedentes = $conn->query($select);
            if ($pedidosPedentes->num_rows > 0) {
            ?>
                <table class='tabela' border='1'>
                    <tr>

                        <th colspan=2>Nome</th>
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
                            <td><img src="<?php echo $exibirPedido['img_produto'] ?>"></td>
                            <td><?php echo $exibirPedido['nm_produto'] ?></td>
                            <td><?php echo $exibirPedido['qtde_produto'] ?></td>
                            <td class='td_obs'><?php echo $exibirPedido['obs_produto'] ?></td>
                            <td><?php echo $exibirPedido['preco_produto'] ?></td>
                            <td><?php echo $exibirPedido['total_produto'] ?></td>
                            <td>
                                <form action='atualizarPedidoProcesso.php' method='POST'>
                                    <input type='hidden' name='idHidden' value=<?php echo $exibirPedido['id_pedido'] ?>>
                                    <input type='submit' value='Concluido' class='buttonPedidoConcluido'>
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
                <p class='textoPedido'>Não existem pedidos em processo <i class="fa-regular fa-calendar-xmark"></i></p>
            <?php
            }
            ?>
        </div>
    </div>

    <h2 class='subti'> Concluído(s) <i class="fa-solid fa-hourglass-end"></i></h2>
    <div class='divPedido'>
        <div class='divPedidoBranca_Concluido'>
            <?php
            $select = 'SELECT * FROM `pedido` WHERE `status_pedido`= "Pedido concluído"';
            $pedidosPedentes = $conn->query($select);
            if ($pedidosPedentes->num_rows > 0) {
            ?>
                <table class='tabela' border='1'>
                    <tr>
                        <th colspan=2>Nome</th>
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
                            <td><img src="<?php echo $exibirPedido['img_produto'] ?>"></td>
                            <td><?php echo $exibirPedido['nm_produto'] ?></td>
                            <td><?php echo $exibirPedido['qtde_produto'] ?></td>
                            <td class='td_obs'><?php echo $exibirPedido['obs_produto'] ?></td>
                            <td><?php echo $exibirPedido['preco_produto'] ?></td>
                            <td><?php echo $exibirPedido['total_produto'] ?></td>
                            <td>
                                <div class='divStatus'>
                                    <form action='ocultarPedidoConcluido.php' method='POST'>
                                        <input type='hidden' name='idHidden' value=<?php echo $exibirPedido['id_pedido'] ?>>
                                        <input type='submit' value='Pago' class='buttonPedidoFinalizado'>
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
                <p class='textoPedido'>Não existem pedidos concluídos <i class="fa-regular fa-calendar-xmark"></i></p>
            <?php
            }
            ?>
        </div>
    </div>
    <footer>
        <i class="fa-solid fa-mug-saucer fa-2x" aria-hidden="true"></i>
    </footer>
    <script src="home.js"></script>
</body>

</html>