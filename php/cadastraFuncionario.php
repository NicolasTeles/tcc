<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/estilo-func.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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
</head>

<body>
    <?php
    if (isset($_SESSION["idFunc"])) {
        if ($_SESSION["tipoFunc"] == "ADMIN") {
    ?>
            <h1 class="titulo" style="top: 100px;">Cadastro de Funcionário</h1>
            <fieldset class="bordaFunc">
                <form action="insertFuncionario.php" method="post">

                    <div class="input-block">
                        <label for="nomeFunc">Nome:</label><br>
                        <input type="text" id="nomeFunc" name="nomeFunc" placeholder="Nome" style="width: 42%" required>
                        <input type="text" id="sobrenomeFunc" name="sobrenomeFunc" placeholder="Sobrenome" style="width: 41%" required>
                    </div>

                    <div style="height: 75px;"></div>

                    <div class="input-block">
                        <label for="emailFunc">Email:</label><br>
                        <input type="text" id="emailFunc" name="emailFunc" placeholder="exemplo@gmail.com" required>
                    </div>

                    <div style="height: 75px;"></div>

                    <div class="input-block">
                        <label for="senhaFunc">Senha:</label><br>
                        <input type="password" id="senhaFunc" name="senhaFunc" required>
                        <i class="bi bi-eye-slash bi-eye" id="botaoSenha"></i>
                    </div>

                    <div style="height: 75px;"></div>

                    <div class="input-block">
                        <label for="confirmaSenha">Confirme a senha:</label><br>
                        <input type="password" id="confirmaSenha" name="confirmaSenha" required>
                        <i class="bi bi-eye-slash bi-eye" id="botaoConfirma"></i>
                    </div>

                    <div style="height: 75px;"></div>

                    <div class="input-block">
                        <label for="">Tipo do funcionário:</label>
                        <br><br>
                        <div style="margin-left: 25%; margin-right: 25%;">
                            <input type="radio" name="tipoFunc" id="tipoAdm" value="ADMIN">
                            <label for="tipoFunc" onclick="marcaTipo('tipoAdm')">Admin</label>
                            <input type="radio" name="tipoFunc" id="tipoComum" value="COMUM">
                            <label for="tipoFunc" onclick="marcaTipo('tipoComum')">Comum</label>
                        </div>
                    </div>

                    <div style="height: 75px;"></div>

                    <div class=divcadastro>
                        <input type="submit" id="enviar" value="Cadastrar" style="margin-right: 10%;" class="btn btn-outline-primary">
                        <a href="index.html"><input type="button" value="Cancelar" class="btn btn-outline-danger"></a>
                    </div>
                    <div style="height: 60px;"></div>
                </form>
            </fieldset>
            <script src="../javascript/funcionario.js"></script>
        <?php
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