<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilo-formularios.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <h1 class="titulo">Cadastro</h1>
    <fieldset class="bordaForm">
        <form action="insert.php" method="post">
          

            <div class="input-block">
                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome" placeholder="Nome" style="width: 42%" required>
                <input type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" style="width: 41%" required>
            </div>

            <div style="height: 75px;"></div>

            <div class="input-block">
                <label for="cel">Telefone:</label><br>
                <input type="text" id="cel" name="cel" placeholder="(99) 9 9999-9999" maxlength="16" required>
            </div>

            <div style="height: 75px;"></div>

            <div class= divcadastro>
                <input type="submit" id="enviar" value="Cadastrar" style="margin-right: 10%;" class="btn btn-outline-primary">
                <a href="index.html"><input type="button" value="Cancelar" class="btn btn-outline-danger"></a>
            </div>
        </form>
        <div style="height: 15px;"></div>
    </fieldset>
    <div class="divlink"><p style="text-align: center;"><a href="login.php"> Já tenho uma conta ></a></p></div>
  
    <script src="formulario.js"></script>
</body>

</html>