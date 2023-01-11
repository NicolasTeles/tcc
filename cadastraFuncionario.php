<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilo-func.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
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

            <div class= divcadastro>
                <input type="submit" id="enviar" value="Cadastrar" style="margin-right: 10%;" class="btn btn-outline-primary">
                <a href="index.html"><input type="button" value="Cancelar" class="btn btn-outline-danger"></a>
            </div>
        </form>
        <div style="height: 15px;"></div>
    </fieldset>
    <script src="funcionario.js"></script>
</body>

</html>