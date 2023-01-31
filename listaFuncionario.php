<?php
require_once("conexao.php");
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estiloLista.css">
    <link rel="stylesheet" href="estilo_Pedidos.css">
    <link rel="stylesheet" href="estilo_Guilherme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>

<body>
    <header>
        <img src="img/logo3.png" class="logoimg">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <button class="menu-btn"><i class="fa-solid fa-house-chimney carrinho fa-2x"></i> </button>
            </li>
        </ul>
    </header>
    <h1 class="titulo"> Listar Funcionários <i class="fa-regular fa-address-card"></i> </h1>
    <div class="div_1">
        <?php
        $sql = "SELECT * FROM funcionario order by nomeFuncionario";
        $resultado = $conn->query($sql);
        if ($resultado->num_rows > 0) {
        ?>
            <div class=divPedido>
                <div class="SemP">
                    <table class="tabela">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Id</th>
                            <th>Excluir</th>
                        </tr>
                        <?php
                        while ($exibir = $resultado->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $exibir["nomeFuncionario"] . " " . $exibir["sobrenomeFuncionario"]; ?></td>
                                <td><?php echo $exibir["emailFuncionario"]; ?></td>
                                <td><?php echo $exibir["idFuncionario"]; ?></td>
                                <td><a href="#" onclick="confirmaApagar(
                        '<?php echo $exibir['nomeFuncionario'] ?>', <?php echo $exibir['idFuncionario'] ?>)">
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
    function confirmaApagar(nome, id) {
        if (confirm("Deseja deletar o funcionário " + nome + "?")) {
            window.location = "excluirFuncionario.php?idFunc=" + id;
        }
    }
</script>
<footer>
    <i class="fa-solid fa-mug-saucer fa-2x" aria-hidden="true"></i>
</footer>

</html>