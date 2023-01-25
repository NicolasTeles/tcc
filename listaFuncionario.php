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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        table,
        td,
        th {
            border: solid black 1px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h1 style="top: 100px;" class="titulo">Listar Funcionários</h1>
    <div style="width: 80%; margin-top: 150px; margin-left: auto; margin-right: auto;">
        <?php
        $sql = "SELECT * FROM funcionario order by nomeFuncionario";
        $resultado = $conn->query($sql);
        if ($resultado->num_rows > 0) {
        ?>
            <table class="table table-dark table-striped" style="text-align: center; vertical-align: middle;">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Id</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
                <?php
                while ($exibir = $resultado->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $exibir["nomeFuncionario"]; ?></td>
                        <td><?php echo $exibir["emailFuncionario"]; ?></td>
                        <td><?php echo $exibir["idFuncionario"]; ?></td>
                        <td><a style="color: rgb(214, 111, 1);" href="#"><i class="fa-regular fa-pen-to-square"></i></a></td>
                        <td><a href="#" onclick="confirmaApagar(
                        '<?php echo $exibir['nomeFuncionario'] ?>', <?php echo $exibir['idFuncionario'] ?>)">
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
        if (confirm("Deseja deletar o funcionário " + nome + "?")) {
            
        }
    }
</script>

</html>