<?php
require_once('conexaoPedido.php');
?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilo_Guilherme.css">
    <link rel="stylesheet" href="estilo_PedidoFinalizados.css">
    <script src="verPedidosFinalizados_js.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos finalizados</title>
    <script>
        $(document).ready(function() {

            listar_registros();



            $("#formPesquisar").submit(function(evento) {
                evento.preventDefault();
                listar_registros();
            });
        });

        function listar_registros() {
            let pesquisar = $("#inputPesquisar").val();

            let dados = {
                pesquisa: pesquisar
            }
            $.post("pesquisaData.php", dados, function(retorna) {
                $(".resultadosPesquisa").html(retorna)
            });
        }
    </script>
</head>

<body>
    <header><img src="img/logo3.png" class="logoimg">
        <ul class="headerUL">
            <li class="headerLI"><button class="menu-btn" onclick="home()"><i class="fa-solid fa-house-chimney carrinho fa-3x"></i> </button></li>
        </ul>
    </header>
    <br><br><br><br><br><br><br><br>
    <h1 class="blog-title"> Historico de Pedidos <i class="fa-solid fa-clock-rotate-left"></i> </h1>
    <form action="" id="formPesquisar" method="POST">
        <label for="inpuntPesquisar">Pesquise pela data:</label>

        <div class="al">
            <input type="date" name="inputPesquisar" id="inputPesquisar">
            <button type="submit" name="EnviarPesquisar" id="inputBotao"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>
    <br>
    <div class="resultadosPesquisa">
    </div>

    <footer>
        <i class="fa-solid fa-mug-saucer fa-2x" aria-hidden="true"></i>
    </footer>

    <script src="home.js"></script>
</body>

</html>