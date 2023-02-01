<?php
require_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="estiloLista.css">
        <link rel="stylesheet" href="estilo_Pedidos.css">
        <link rel="stylesheet" href="estilo_Guilherme.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <title>Document</title>
      
        </style>
    </head>
    <body>
    <header><img src="img/logo3.png" class="logoimg">
        <ul class="nav justify-content-end">
        <li class="nav-item" >
             <button class="menu-btn" onclick="home()"><i class="fa-solid fa-house-chimney carrinho fa-2x"></i> </button>
        </li>
            </ul>
      </header>
    <h1 class="titulo"> Listar Cardápio <i class="fa-regular fa-rectangle-list"></i> </h1>
    <div class="div_1">
        <?php
        $sql = "SELECT * FROM item order by subtipoItem";
        $resultado = $conn->query($sql);
        if($resultado->num_rows > 0){
            ?>
            <div class=divPedido>
                <div class="SemP">
            <table class="tabela">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Tipo</th>
                    <th>Subtipo</th>
                    <th>Imagem</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            <?php
            while ($exibir = $resultado->fetch_assoc()) {
                if (str_contains($exibir["descItem"], "@@") or str_contains($exibir["precoItem"], "@@")) {
                    $exibir["descItem"] = @end(explode("@@", $exibir["descItem"]));
                    $exibir["precoItem"] = @end(explode("@@", $exibir["precoItem"]));
                }
            ?>
                <tr>
                    <td><?php echo $exibir["idItem"]; ?></td>
                    <td><?php echo $exibir["nomeItem"]; ?></td>
                    <td><?php echo $exibir["descItem"]; ?></td>
                    <td><?php echo $exibir["precoItem"]; ?></td>
                    <td><?php echo $exibir["tipoItem"]; ?></td>
                    <td><?php echo $exibir["subtipoItem"]; ?></td>
                    <td><img class = "imged" src="imagens/<?php echo $exibir["nomeImg"] ?> "></td>
                    <td><a style="color: #d66f01;" href="editarItem.php?idItem=<?php echo $exibir['idItem'] ?>"><i class="fa-regular fa-pen-to-square fa-lg"></i></a></td>
                    <td><a href="#" onclick="confirmaApagar(
                        '<?php echo $exibir['nomeItem'] ?>', <?php echo $exibir['idItem'] ?>)">
                            <i style="color: #bd2a33;" class="fa-trash fa-solid fa-lg"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }    
        }
        ?>
   
    </table>
             </div>
         </div>
    </div>
    </body>

    <script>
        function confirmaApagar(nome, id){
            if (confirm("Deseja deletar o item "+nome+"?")) {
                console.log("excluirItem.php?idItem="+id);
                window.location = "excluirItem.php?idItem="+id;
            }
        }
    </script>
      <footer>
   <i class="fa-solid fa-mug-saucer fa-2x" aria-hidden="true"></i>
   </footer>
   <script src="home.js"></script>   
</html>
</html>