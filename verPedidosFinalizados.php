<?php 
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilo_Guilherme.css">
    <link rel="stylesheet" href="estilo_PedidoFinalizados.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos finalizados</title>
    <script>
        $(document).ready(function() {

             let pesquisar = $("#inputPesquisar").val();
                
                let dados = {
                    pesquisa : pesquisar
                }
                $.post("pesquisaData.php", dados, function(retorna){
                    $(".resultadosPesquisa").html(retorna)
                });


            $("#formPesquisar").submit(function(evento){
                evento.preventDefault();
                listar_registros();
            });
        });

        function listar_registros(){
            let pesquisar = $("#inputPesquisar").val();
                
                let dados = {
                    pesquisa : pesquisar
                }
                $.post("pesquisaData.php", dados, function(retorna){
                    $(".resultadosPesquisa").html(retorna)
                });
        }
    </script>
</head>
<body>
<header class="classcabecalho"><img src="img_Guilherme/logo3.png" class="logoimg"></header>
<br><br><br><br><br><br><br><br>
    
        <form action="" id="formPesquisar" method="POST">
            <label for="inpuntPesquisar">Pesquisar data:</label>
            <input type="date" name="inputPesquisar" id="inputPesquisar" value='<?php echo date("Y-m-d"); ?>'>
            <input type="submit" name="EnviarPesquisar"value="Pesquisar">
        </form>
        <br>
        <div class="resultadosPesquisa">
    </div>
       

</body>
</html>