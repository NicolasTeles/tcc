<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Upload de imagens</h1>
    <?php require_once("uploadFile.php"); ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Selecione os arquivos</label>
        <input type="file" name="file" id="file" required accept="image/*">
        <br>
        <input type="submit" value="Enviar" name="upload">
    </form>

    <h2>Imagens cadastradas:</h2>
    <?php include_once("exibirFile.php"); ?>
</body>
</html>