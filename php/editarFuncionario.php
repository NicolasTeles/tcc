<?php
require_once("conexao.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="../css/estilo-func.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
    if (!isset($_SESSION["idFunc"]) or $_GET["idFunc"] != $_SESSION["idFunc"]) {
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
        if (isset($_POST["nomeFunc"])) {
            $idFunc = $_GET['idFunc'];
            $nomeFunc = $_POST['nomeFunc'];
            $sobrenomeFunc = $_POST["sobrenomeFunc"];
            $emailFunc = $_POST['emailFunc'];

            $sql = "UPDATE funcionario SET
            nomeFuncionario = '$nomeFunc',
            sobrenomeFuncionario = '$sobrenomeFunc',
            emailFuncionario = '$emailFunc'
            WHERE idFuncionario = $idFunc";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registro atualizado com sucesso');</script>";
                echo "<script>window.location = 'admin.php';</script>";
            } else {
                echo "<script>alert('Erro ao atualizar o registro');</script>";
                echo "<script>window.location = 'admin.php';</script>";
            }
        }

        if (isset($_GET["idFunc"])) {
            if ($_GET["idFunc"] == $_SESSION["idFunc"]) {
                $idFunc = $_GET['idFunc'];
                $consulta = "SELECT *  FROM funcionario WHERE idFuncionario = $idFunc";
                $resultado = $conn->query($consulta);
                $exibir = $resultado->fetch_assoc();
                ?>

                <h1 class="titulo" style="top: 100px;">Edição de Funcionário</h1>
                <fieldset class="bordaFunc">
                    <form action="editarFuncionario.php?idFunc=<?php echo $_GET['idFunc']; ?>" method="post">

                        <div class="input-block">
                            <label for="nomeFunc">Nome:</label><br>
                            <input type="text" id="nomeFunc" name="nomeFunc" value="<?php echo $exibir["nomeFuncionario"]; ?>"
                                placeholder="Nome" style="width: 42%" required>
                            <input type="text" id="sobrenomeFunc" name="sobrenomeFunc"
                                value="<?php echo $exibir["sobrenomeFuncionario"]; ?>" placeholder="Sobrenome" style="width: 41%"
                                required>
                        </div>

                        <div style="height: 10vh;"></div>

                        <div class="input-block">
                            <label for="emailFunc">Email:</label><br>
                            <input type="text" id="emailFunc" name="emailFunc" value="<?php echo $exibir["emailFuncionario"]; ?>"
                                placeholder="exemplo@gmail.com" required>
                        </div>

                        <div style="height: 10vh;"></div>

                        <div class=divcadastro>
                            <input type="submit" id="enviar" value="Editar" style="margin-right: 10%;"
                                class="btn btn-outline-primary">
                            <a href="admin.php"><input type="button" value="Cancelar" class="btn btn-outline-danger"></a>
                        </div>
                        <div style="height: 10vh;"></div>
                    </form>
                </fieldset>
                <script src="../javascript/funcionario.js"></script>
                <?php
            } else {
                ?>
                <div class="text-center alert alert-warning">
                    Id informado e id do funcionário logado não coincidem,<a href="admin.php">voltar para a página inicial</a>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="text-center alert alert-warning">
                Id de funcionário não informado,<a href="admin.php">voltar para página inicial</a>
            </div>
            <?php
        }
        ?>
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

</html>