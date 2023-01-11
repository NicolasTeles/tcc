<?php
if (isset($_POST["upload"])) {
    $file = $_FILES["file"];
    $folder = "uploads";
    $permite = array("tif", "jpg", "png", "jpeg");
    $msg = array();
    $erroMsg = array(
        1 => "O upload do arquivo foi feito parcialmente",
        2 => "Não foi possível fazer o upload"
    );

    $name = $file["name"];
    $type = $file["type"];
    $error = $file["error"];
    $tmp = $file["tmp_name"];
    $extensao = @end(explode(".", $name));
    $novoNome = rand() . ".$extensao";

    if ($error != 0) {
        $msg[] = "<b>$name</b>" . $erroMsg[$error];
    }else if (!in_array($extensao, $permite)) {
        $msg[] = "<b>$name</b>" . "Erro: tipo de arquivo não suportado";
    }else{
        if (move_uploaded_file($tmp, $folder."/".$novoNome)) {
            require_once("conexaoFile.php");
            $sql = "INSERT INTO tbfile (nomeFile, extensaoFile) VALUES ('$novoNome', '$extensao')";
            //echo $sql;
            if($conn->query($sql) === TRUE){
                $msg[] = "Upload realizado com sucesso";
            }else{
                $msg[] = "Erro ao realizar upload";
            }
        }else{
            $msg[] = "Erro ao mover o arquivo para a pasta";
        }
    }
    foreach($msg as $value){
        echo $value . "<br>";
    }
    
    header("Location: testeFile.php");
}
?>