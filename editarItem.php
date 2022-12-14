<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="estiloItem.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="subtipo.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<body>
    <?php
    require_once('conexao.php');
    if(isset($_POST['nomeItem'])){
        $id = $_GET['idItem'];
        $nomeItem = $_POST['nomeItem'];
        $desc = $_POST['desc'];
        $preco = $_POST['preco'];
        $tipo = $_POST['tipo'];
        $subtipo = $_POST["subtipo"];

        if (str_contains($preco, ',')) {
            $split = explode(",", $preco);
            if(strlen($split[1]) == 1){
                $split[1] = $split[1] . "0";
            }
            $preco = $split[0] . "," . $split[1];
        }else if (str_contains($preco, '.')) {
            $split = explode(".", $preco);
            if(strlen($split[1]) == 1){
                $split[1] = $split[1] . "0";
            }
            $preco = $split[0] . "," . $split[1];
        }else{
            $preco = $preco .",00";
        }

        if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] != UPLOAD_ERR_NO_FILE){
            $file = $_FILES["imagem"];
            $folder = "imagens";
            $permite = array("tif", "jpg", "png", "jpeg");
            $msg = array();
            $erroMsg = array(
                1 => "O upload do arquivo foi feito parcialmente",
                2 => "Não foi possível fazer o upload"
            );

            $nomeImg = $file["name"];
            $tipoImg = $file["type"];
            $error = $file["error"];
            $tmp = $file["tmp_name"];
            $extensaoImg = @end(explode(".", $nomeImg));
            $novoNome = rand() . ".$extensaoImg";

            if (move_uploaded_file($tmp, $folder."/".$novoNome)) {
                $sql = "UPDATE item 
                    SET nomeItem = '$nomeItem',
                    descItem = '$desc',
                    precoItem = '$preco',
                    tipoItem = '$tipo',
                    subtipoItem = '$subtipo',
                    nomeImg = '$novoNome',
                    extensaoImg = '$extensaoImg'
                    WHERE idItem = $id";
            }else{
                $msg[] = "Erro ao mover o arquivo para a pasta";
            }
            foreach($msg as $value){
                echo $value . "<br>";
            }
        }else{
            $sql = "UPDATE item 
                    SET nomeItem = '$nomeItem',
                    descItem = '$desc',
                    precoItem = '$preco',
                    tipoItem = '$tipo',
                    subtipoItem = '$subtipo'
                    WHERE idItem = $id";
        }

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registro atualizado com sucesso');</script>";
            echo "<script>window.location = 'listaCardapio.php';</script>";
        }else{
            echo "<script>alert('Erro ao atualizar o registro');</script>";
            echo "<script>window.history.back();</script>";
        }
    }
    
    if(isset($_GET["idItem"])){
        $idItem = $_GET['idItem'];
        $sql = "SELECT * FROM item WHERE idItem=$idItem";
        $resultado = $conn->query($sql);
        $exibir = $resultado->fetch_assoc();
    
    ?>
    <h1 class="titulo" style="top: 100px;">Edição de Itens</h1>
    <fieldset class="bordaForm">
        <form action="editarItem.php?idItem=<?php echo $_GET['idItem'] ?>" method="post" enctype="multipart/form-data">
          
            <div class="input-block">
                <label for="nomeItem">Nome:</label><br>
                <input type="text" id="nomeItem" name="nomeItem" placeholder="Nome" required value="<?php echo $exibir['nomeItem']; ?>">
            </div>

            <div style="height: 75px;"></div>

            <div class="input-block">
                <label for="desc">Descrição:</label><br>
                <textarea name="desc" id="desc" cols="50" rows="2" style="width: 85%;" placeholder="Descrição"><?php echo $exibir['descItem']; ?></textarea>
            </div>

            <div style="height: 75px;"></div>

            <div class="input-block">
                <label for="preco">Preço:</label><br>
                <input type="text" name="preco" id="preco" placeholder="Preço" value="<?php echo $exibir['precoItem']; ?>">
            </div>

            <div style="height: 30px;"></div>

            
            <div class="input-block">
                <label for="tipo">Tipo:</label><br>
                <div style="margin-left: 20%;">
                    <select name="tipo" id="tipo" style="width: 60%;" onchange="mudaOpcao()">
                        <option value="Lanche">Lanche</option>
                        <option value="Bebida">Bebida</option>
                    </select>
                </div>
            </div>

            <script>
                for (let i = 0; i < 2; i++) {
                    if(document.getElementById('tipo').options.item(i).value=='<?php echo $exibir['tipoItem'] ?>'){
                        document.getElementById('tipo').options.item(i).selected = true;
                        $(document).ready(function() {
                            mudaOpcao();
                        });
                    }
                }
                
                $(document).ready(function(){
                    for (let j = 0; j < $('#tipo option').length; j++) {
                        if(document.getElementById('subtipo').options.item(j).value=='<?php echo $exibir['subtipoItem'] ?>'){
                            document.getElementById('subtipo').options.item(j).selected = true;
                        }
                    }
                });
            </script>

            <div style="height: 30px;"></div>

            
            <div class="input-block">
                <label for="subtipo">Sub-tipo:</label><br>
                <div style="margin-left: 20%;">
                    <select name="subtipo" id="subtipo" style="width: 60%;">
                        <option value="Quiches">Quiches</option>
                        <option value="Folhados">Folhados</option>
                        <option value="Pão de Queijo">Pão de Queijo</option>
                        <option value="Sanduiches e Omeletes">Sanduiches & Omeletes</option>
                        <option value="Doces">Doces</option>
                    </select>
                </div>
            </div>

            <div style="height: 30px;"></div>

            <div class="input-block" id="divBotao">
                <label for="avisoMudar">Deseja mudar a imagem desse item?</label>
                <input type="button" onclick="mostraFile()" class="btn btn-warning" name="avisoMudar" id="avisoMudar" value="Mudar imagem do item" style="margin-left: 25%; width: 35%;">
            </div>

            <div id="divImagem" hidden>
                <label for="imagem">Imagem(deixe o campo vazio para nao alterar):</label>
                <input type="file" class="form-control" accept="image/*" name="imagem" id="imagem">
            </div>

            <script>
                function mostraFile(){
                    document.getElementById('divImagem').hidden = false;
                    document.getElementById('divBotao').hidden = true;
                }
            </script>

            <div style="height: 50px;"></div>

            <div class= divcadastro>
                <input type="submit" id="enviar" value="Cadastrar" style="margin-right: 10%;" class="btn btn-outline-primary">
                <a href="listaCardapio.php"><input type="button" value="Cancelar" class="btn btn-outline-danger"></a>
            </div>
        </form>
    </fieldset>
    <div style="height: 75px;"></div>
    <?php 
    }else{
        echo "<script>alert('Id de item não informado');</script>";
        header("location: listaCardapio.php");
    } 
    ?>
</body>

</html>