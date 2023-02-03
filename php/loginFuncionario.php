<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/estilo-func.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="titulo" style="top: 100px;">Login de Funcionário</h1>
    <fieldset class="bordaFunc">
        <form action="logarFuncionario.php" method="post">

            <div class="input-block">
                <label for="emailFunc">Email:</label><br>
                <input type="text" id="emailFunc" name="emailFunc" placeholder="exemplo@gmail.com" required>
            </div>

            <div style="height: 10vh;"></div>

            <div class="input-block">
                <label for="senhaFunc">Senha:</label><br>
                <input type="password" id="senhaFunc" name="senhaFunc" required>
                <i class="bi bi-eye-slash bi-eye" id="botaoSenha"></i>
            </div>

            <div style="height: 10vh;"></div>

            <div class=divcadastro>
                <input type="submit" id="enviar" value="Fazer Login" style="margin-right: 10%;"
                    class="btn btn-outline-primary">
                <a href="index.php"><input type="button" value="Cancelar" class="btn btn-outline-danger"></a>
            </div>
            <div style="height: 10vh;"></div>
        </form>
    </fieldset>

    <script src="../javascript/loginFuncScript.js"></script>
</body>

</html>