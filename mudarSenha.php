<?php
require_once("conexao.php");
session_start();

if (isset($_POST["senhaFunc"])) {
    $senhaFunc = $_POST["senhaFunc"];

    $sql = "UPDATE funcionario SET senhaFuncionario = '$senhaFunc'";
    if ($conn->query($sql)) {
        echo "<script>alert('Senha atualizada com êxito');</script>";
        echo "<script>window.location = 'admin.php';</script>";
    }
}
if (isset($_GET["idFunc"])) {
    ?>

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
    <h1 class="titulo" style="top: 100px;">Mudar senha</h1>
    <fieldset class="bordaFunc">
        <form action="mudarSenha.php?idFunc=<?php echo $_GET["idFunc"];?>" method="post">
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
<?php
}else{
    echo "<script>alert('ID de funcionário não especificado');</script>";
    echo "<script>window.location = 'admin.php';</script>";
}
?>