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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Document</title>
    <style>
        table,
        td,
        th {
            border: solid black 1px;
            border-collapse: collapse;
        }

        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <h1 style="top: 100px;" class="titulo">Listar Itens</h1>
    <div style="width: 80%; margin-top: 150px; margin-left: auto; margin-right: auto;">
        <?php
        $sql = "SELECT * FROM item order by subtipoItem";
        $resultado = $conn->query($sql);
        if ($resultado->num_rows > 0) {
        ?>
            <table class="table table-dark table-striped" style="text-align: center; vertical-align: middle;">
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
                        <td><img src="imagens/<?php echo $exibir["nomeImg"] ?> "></td>
                        <td><a style="color: rgb(214, 111, 1);" href="editarItem.php?idItem=<?php echo $exibir['idItem'] ?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
                        <td><a href="#" onclick="confirmaApagar(
                        '<?php echo $exibir['nomeItem'] ?>', <?php echo $exibir['idItem'] ?>)">
                                <i style="color: red;" class="fa-trash fa-solid"></i>
                            </a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
            </table>
    </div>
</body>

<script>
    function confirmaApagar(nome, id) {
        if (confirm("Deseja deletar o item " + nome + "?")) {
            window.location = "excluirItem.php?idItem=" + id;
        }
    }
</script>

</html>