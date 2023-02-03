<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estiloItem.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
    if (!isset($_SESSION["nomeFunc"])) {
        ?>
        <style>
            body{
                background: linear-gradient(800deg, #3a1624, #741413);
            }
            .alert.alert-warning{
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
    if (isset($_SESSION["nomeFunc"])) {
    if ($_SESSION["tipoFunc"] == "ADMIN") {
        ?>
    <h1 class="titulo" style="top: 100px;">Cadastro de Itens</h1>
    <fieldset class="bordaForm">
        <form action="insertItem.php" method="post" enctype="multipart/form-data">
          
            <div class="input-block">
                <label for="nomeItem">Nome:</label><br>
                <input type="text" id="nomeItem" name="nomeItem" placeholder="Nome" required>
            </div>

            <div style="height: 45px;"></div>

            <div class="input-block">
                <input type="checkbox" name="confereTamanho" id="confereTamanho" onchange="checou()">
                <p id="bold">Deseja ter tamanhos diferentes para esse item?</p>
                <input type="number" name="qtdeTamanhos" id="qtdeTamanhos" max="3" min="1" hidden>
                <button type="button" class="btn btn-secondary" id="criaOpcao" onclick="criaOpcoes()" hidden>Criar opções</button>
                <div id="container" hidden>

                </div>
            </div>

            <div style="height: 45px;"></div>

            <div class="input-block">
                <label for="desc">Descrição:</label><br>
                <textarea name="desc" id="desc" cols="50" rows="2" style="width: 85%;" placeholder="Descrição"></textarea>
            </div>

            <div style="height: 45px;"></div>

            <div class="input-block">
                <div id="containerPreco">
                    
                </div>
                <label for="preco">Preço:</label><br>
                <input type="text" name="preco" id="preco" placeholder="Preço">
            </div>

            <div style="height: 30px;"></div>

            
            <div class="input-block">
                <label style="margin-left: 39%;" for="tipo">Tipo:</label><br>
                <div style="margin-left: 20%;">
                    <select name="tipo" id="tipo" style="width: 60%;" onchange="mudaOpcao()">
                        <option value="Lanche">Lanche</option>
                        <option value="Bebida">Bebida</option>
                    </select>
                </div>
            </div>

            <div style="height: 30px;"></div>

            
            <div class="input-block"  style="animation: move 500ms; animation-delay: 1200ms; animation-fill-mode: backwards;">
                <label style="margin-left: 35%;" for="subtipo">Sub-tipo:</label><br>
                <div style="margin-left: 20%;">
                    <select name="subtipo" id="subtipo" style="width: 60%;">
                        <option value="Quiches" selected>Quiches</option>
                        <option value="Folhados">Folhados</option>
                        <option value="Pão de Queijo">Pão de Queijo</option>
                        <option value="Sanduiches e Omeletes">Sanduiches & Omeletes</option>
                        <option value="Doces">Doces</option>
                    </select>
                </div>
            </div>

            <div style="height: 30px;"></div>

            <div class="imganima">
            <label for="imagem">Imagem:</label>
            <input type="file" class="form-control" accept="image/*" name="imagem" id="imagem">
            <div></div>
            <div style="height: 50px;"></div>

            <div class= divcadastro>
                <input type="submit" id="enviar" value="Cadastrar" style="margin-right: 10%;" class="btn btn-outline-primary">
                <a href="index.html"><input type="button" value="Cancelar" class="btn btn-outline-danger"></a>
            </div>
  
    <div style="height: 75px;"></div>
    </form>
    </fieldset> 
    <script src="subtipo.js"></script>
    <?php
    }else{
        ?>
        <div class="text-center alert alert-warning">
            Usuário não autenticado,<a href="admin.php">voltar para a página inicial</a>
        </div>
        <?php
    }
    }else{
        ?>
        <div class="text-center alert alert-warning">
            Usuário não logado, favor <a href="loginFuncionario.php">fazer login</a>
        </div>
        <?php
    }
    ?>
</body>

</html> 