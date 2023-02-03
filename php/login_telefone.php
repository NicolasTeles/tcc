<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/estiloFormularios.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="titulo">Login</h1>
    <fieldset class="bordaForm">
        <form action="atualiza.php" method="post">
        
            <div class="input-block">
                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome" placeholder="Nome" style="width: 41%" required>
                <input type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" style="width: 41%" required>
            </div>

            <div style="height: 15vh;"></div>

            <div class="input-block">    
                <label for="cel">Telefone:</label><br>
                <input type="text" id="cel" name="cel" placeholder="(99) 9 9999-9999" maxlength="16" required>
            </div>

            <div style="height: 10vh;"></div>

            <div class= divcadastro>
                <input type="submit" id="enviar" value="Fazer Login" style="margin-right: 10%;" class="btn btn-outline-primary">
                <a href="index.html"><input type="button" value="Cancelar" class="btn btn-outline-danger"></a>
            </div>
        <div style="height: 10vh;"></div>
        </form>
    </fieldset>
 
    <script src="../javascript/formulario.js"></script>
</body>

</html>