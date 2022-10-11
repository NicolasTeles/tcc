<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="estilo-formularios.css">
    </head>
    <body style="background-color: #3a1624;">
        <fieldset class="bordaForm">
            <form action="atualiza.php" style="margin-left: 10%; font-weight: bolder;" method="post">
                <h1 class="titulo">Login</h1>
                <label for="nome" style="font-size: 18px;">Nome completo</label><br>
                <input type="text" id="nome" name="nome" placeholder="Nome" style="width: 41%" required>
                <input type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" style="width: 41%" required>
                <div style="height: 110px;"></div>
                <label for="cel" style="font-size: 18px;">Telefone</label><br>
                <input type="text" id="cel" name="cel" placeholder="(99) 9 9999-9999" maxlength="16" required>
                <div style="height: 110px;"></div>
                <div style="text-align: center; margin-right: 15%;">
                    <input type="submit" id="enviar" value="Fazer Login" style="margin-right: 10%;">
                    <a href="index.html"><input type="button" value="Cancelar"></a>
                </div>
            </form>
            <p style="text-align: center;">Ainda não possui uma conta? <a href="cadastro.php" >Registre-se</a></p>
        </fieldset>
        <script src="formulario.js"></script>
    </body>
</html>