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
    <title>Listagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estiloLista.css">
    <link rel="stylesheet" href="../css/estilo_Pedidos.css">
    <link rel="stylesheet" href="../css/estilo_Guilherme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <?php
    if (!isset($_SESSION["nomeFunc"])) {
    ?>
        <style>
            body {
                background: linear-gradient(800deg, #3a1624, #741413);
            }

            .alert.alert-warning {
                margin: 150px;
                width: 80%;
                background-color: white;
                color: #3a1624;
            }
        </style>
    <?php
    }
    ?>

</head>

<body>
    <?php
    if (isset($_SESSION["idFunc"])) {
    ?>
        <header>
            <img src="../img/logo3.png" class="logoimg">
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
                                <?php
                                if ($_SESSION["tipoFunc"] == "ADMIN") {
                                    ?>
                                <th>Id</th>
                                <th>Editar tipo</th>
                                <th>Excluir</th>
                                <?php
                                }
                                ?>
                            </tr>
                            <?php
                            while ($exibir = $resultado->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $exibir["nomeFuncionario"] . " " . $exibir["sobrenomeFuncionario"]; ?></td>
                                    <td><?php echo $exibir["emailFuncionario"]; ?></td>
                                    <?php
                                    if ($_SESSION["tipoFunc"] == "ADMIN") {
                                    ?>
                                        <td><?php echo $exibir["idFuncionario"]; ?></td>
                                        <td><a style="color: #d66f01;" href="editarFuncionario.php?idFunc=<?php echo $exibir['idFuncionario'] ?>"><i class="fa-regular fa-pen-to-square fa-lg"></i></a></td>
                                        <td><a href="#" onclick="confirmaApagar(
                        '<?php echo $exibir['nomeFuncionario'] ?>', <?php echo $exibir['idFuncionario'] ?>)">
                                                <i style="color: #bd2a33;" class="fa-trash fa-solid fa-lg"></i>
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        </table>
                    </div>
                </div>
        </div>
        <footer>
            <i class="fa-solid fa-mug-saucer fa-2x" aria-hidden="true"></i>
        </footer>
    <?php
    } else {
    ?>
        <div class="text-center alert alert-warning">
            Usuário não logado, favor <a href="loginFuncionario.php">fazer login</a>
        </div>
    <?php
    }
    ?>
</body>

<script>
    function confirmaApagar(nome, id) {
        if (confirm("Deseja deletar o funcionário " + nome + "?")) {
            window.location = "excluirFuncionario.php?idFunc=" + id;
        }
    }
</script>


</html>