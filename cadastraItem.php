<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilo-item.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <h1 class="titulo" style="top: 100px;">Cadastro de Itens</h1>
    <fieldset class="bordaForm">
        <form action="" method="post">
          

            <div class="input-block">
                <label for="nomeItem">Nome:</label><br>
                <input type="text" id="nomeItem" name="nomeItem" placeholder="Nome" required>
            </div>

            <div style="height: 75px;"></div>

            <div class="input-block">
                <label for="desc">Descrição:</label><br>
                <textarea name="desc" id="desc" cols="50" rows="2" style="width: 85%;" placeholder="Descrição"></textarea>
            </div>

            <div style="height: 75px;"></div>

            <div class="input-block">
                <label for="preco">Preço:</label><br>
                <input type="number" name="preco" id="preco">
            </div>

            <div style="height: 30px;"></div>

            
            <div class="input-block">
                <label for="tipo:">Tipo:</label><br>
                <select name="tipo" id="tipo">
                    <option value="Lanche">Lanche</option>
                    <option value="Bebida">Bebida</option>
                    <option value="Sobremesa">Sobremesa</option>
                </select>
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