<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mudar senha</title>
    <link rel="stylesheet" href="../css/estilo-func.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
    if (!isset($_SESSION["nomeFunc"]) or $_GET["idFunc"] == $_SESSION["idFunc"]) {
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
    require_once("conexao.php");
    session_start();

    if (isset($_POST["senhaFunc"])) {
        $senhaFunc = $_POST["senhaFunc"];
        $idFunc = $_GET["idFunc"];

        $sql = "UPDATE funcionario SET senhaFuncionario = '$senhaFunc' WHERE idFuncionario = $idFunc";
        if ($conn->query($sql)) {
            echo "<script>alert('Senha atualizada com êxito');</script>";
            echo "<script>window.location = 'admin.php';</script>";
        }
    }
    if (isset($_SESSION["idFunc"])) {
        if (isset($_GET["idFunc"])) {
            $idFunc = $_GET["idFunc"];
            $select = "SELECT * FROM funcionario WHERE idFuncionario = $idFunc";
            $resultado = $conn->query($select);
            if ($resultado->num_rows > 0) {
                if ($_GET["idFunc"] == $_SESSION["idFunc"]) {
                    ?>


                    <h1 class="titulo" style="top: 100px;">Mudar senha</h1>
                    <fieldset class="bordaFunc">
                        <form action="mudarSenha.php?idFunc=<?php echo $_GET["idFunc"]; ?>" method="post">
                            <div class="input-block">
                                <label for="senhaFunc">Senha:</label><br>
                                <input type="password" id="senhaFunc" name="senhaFunc" required>
                                <i class="bi bi-eye-slash bi-eye" id="botaoSenha"></i>
                            </div>

                            <div style="height: 10vh;"></div>

                            <div class="input-block">
                                <label for="confirmaSenha">Confirme a senha:</label><br>
                                <input type="password" id="confirmaSenha" name="confirmaSenha" required>
                                <i class="bi bi-eye-slash bi-eye" id="botaoConfirma"></i>
                            </div>

                            <div style="height: 10vh;"></div>

                            <div class=divcadastro>
                                <input type="submit" id="enviar" value="Mudar" style="margin-right: 10%;"
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
                        Id de usuário logado não coincide com o informado<a href="admin.php">voltar para a página inicial</a>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="text-center alert alert-warning">
                    Usuário com id informado não existe no banco de dados,<a href="admin.php">voltar para a página inicial</a>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="text-center alert alert-warning">
                Id de usuário não informado<a href="admin.php">voltar para a página inicial</a>
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