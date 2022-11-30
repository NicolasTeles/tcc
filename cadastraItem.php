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
        <form action="insertItem.php" method="post">
          
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
                <input type="number" name="preco" id="preco" placeholder="Preço">
            </div>

            <div style="height: 30px;"></div>

            
            <div class="input-block">
                <label for="tipo">Tipo:</label><br>
                <div style="margin-left: 20%;">
                    <select name="tipo" id="tipo" style="width: 60%;">
                        <option value="Lanche">Lanche</option>
                        <option value="Bebida">Bebida</option>
                    </select>
                </div>
            </div>

            <div style="height: 30px;"></div>

            <label for="imagem">Imagem:</label>
            <input type="file" class="form-control" accept="image/*" name="imagem" id="imagem">

            <div style="height: 50px;"></div>

            <div class= divcadastro>
                <input type="submit" id="enviar" value="Cadastrar" style="margin-right: 10%;" class="btn btn-outline-primary">
                <a href="index.html"><input type="button" value="Cancelar" class="btn btn-outline-danger"></a>
            </div>
        </form>
    </fieldset>
    <div style="height: 75px;"></div>
</body>

</html>