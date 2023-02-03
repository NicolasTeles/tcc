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
    <title>Altera tipo</title>
    <link rel="stylesheet" href="../css/estilo-func.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
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


    if (isset($_POST["tipoFunc"])) {
        $tipoFunc = $_POST["tipoFunc"];
        $idFunc = $_GET["idFunc"];
        $sql = "UPDATE funcionario SET
            tipoFuncionario = '$tipoFunc'
            WHERE idFuncionario = $idFunc";
        if ($conn->query($sql)) {
            echo "<script>alert('Tipo de funcionário atualizado com sucesso');</script>";
            echo "<script>window.location = 'admin.php';</script>";
        } else {
            echo "<script>alert('Erro ao editar tipo do funcionario');</script>";
            echo "<script>window.location = 'admin.php';</script>";
        }
    }
    if (isset($_SESSION["idFunc"])) {
        if ($_SESSION["tipoFunc"] == "ADMIN") {
            if (isset($_GET["idFunc"])) {
                $idFunc = $_GET["idFunc"];
                $sql = "SELECT * FROM funcionario WHERE idFuncionario=$idFunc";
                $consulta = $conn->query($sql);
                if ($consulta->num_rows > 0) {
                    $exibir = $consulta->fetch_assoc();
    ?>


                    <h1 class="titulo" style="top: 100px;">Mudar tipo</h1>
                    <fieldset class="bordaFunc">
                        <form action="mudaTipo.php?idFunc=<?php echo $idFunc; ?>" method="post">
                            <div class="input-block">
                                <label for="">Tipo do funcionário:</label>
                                <br><br>
                                <div style="margin-left: 25%; margin-right: 25%;">
                                    <input type="radio" name="tipoFunc" id="tipoAdm" value="ADMIN" <?php if ($exibir["tipoFuncionario"] == "ADMIN") {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                                    <label for="tipoFunc" onclick="marcaTipo('tipoAdm')">Admin</label>
                                    <input type="radio" name="tipoFunc" id="tipoComum" value="COMUM" <?php if ($exibir["tipoFuncionario"] == "COMUM") {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                    <label for="tipoFunc" onclick="marcaTipo('tipoComum')">Comum</label>
                                </div>
                            </div>

                            <div class=divcadastro>
                                <input type="submit" id="enviar" value="Atualizar" style="margin-right: 10%;" class="btn btn-outline-primary">
                                <a href="index.php"><input type="button" value="Cancelar" class="btn btn-outline-danger"></a>
                            </div>
                            <div style="height: 10vh;"></div>
                        </form>
                    </fieldset>
                    <script src="../javascript/mudaTipo.js"></script>
                <?php
                } else {
                ?>
                    <div class="text-center alert alert-warning">
                        Id de usuário informado não existe no banco de dados<a href="admin.php">voltar para a página inicial</a>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="text-center alert alert-warning">
                    Id de funcionário não informado,<a href="admin.php">voltar para a página inicial</a>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="text-center alert alert-warning">
                Usuário não autenticado,<a href="admin.php">voltar para a página inicial</a>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="text-center alert alert-warning">
            Usuário não logado, favor <a href="loginFuncionario.php">fazer login</a>
        </div>
    <?php
    }
    ?>
</body>

</html>