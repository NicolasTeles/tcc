
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloAdmin.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title> Local de Administração</title>
</head>
<body>
<header><img src="img/logo3.png" class="logoimg">
<ul class="headerUL">
      <!-- <li class="headerLI"><button class="menu-btn"><i class="fa-solid fa-user-gear carrinho fa-3x"></i> </button></li>-->
      </ul>
      </header>

    <h1 class="blog-title"> Administração <i class="fa-solid fa-computer"></i> </h1>


    <div class= DivCont>
        <div class="DivBranca">
 <table>
    <tr>
        <td> <button class ="butadm" onclick="abreReferencia('verPedidos')"> <p><i class="fa-solid fa-pen-to-square icon fa-3x"></i></p> Progresso de Pedidos </Button></td>
        <td> <button class ="butadm" onclick="abreReferencia('verPedidosFinalizados')"> <p><i class="fa-solid fa-clock-rotate-left icon fa-3x"></i></p> Historico de Pedidos </button></td>
    </tr>
    <tr>
        <td><button class ="butadm" onclick="abreReferencia('listaCardapio')"><p> <i class="fa-regular fa-rectangle-list icon fa-3x"></i></p> Listar Cardápio </button></td>
        <td><button class ="butadm" onclick="abreReferencia('exibeImagens')"><p> <i class="fa-regular fa-images icon fa-3x"></i></p> Listar Imagens </button></td>
    </tr>
    <tr>
        <td><button class ="butadm" onclick="abreReferencia('cadastraItem')"> <p><i class="fa-solid fa-cookie icon fa-3x"></i></p> Cadastrar Item </button></td>
        <td><button class ="butadm" onclick="abreReferencia('cadastraFuncionario')"> <p><i class="fa-solid fa-elevator icon fa-3x"></i></p> Cadastrar Funcionário </button></td>
    </tr>
    <tr>
        <td colspan="2"><button class="butadm" onclick="abreReferencia('listaFuncionario')"> <p> <i class="fa-regular fa-address-card icon fa-3x"></i></p> Listar Funcionário </button></td>
    </tr>
</table>
</div>
</div>

 <footer>
   <i class="fa-solid fa-mug-saucer fa-2x" aria-hidden="true"></i>
   </footer> 
   <script src="referencias.js"></script>
</body>
</html>