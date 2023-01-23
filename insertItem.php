<?php
    require_once('conexao.php');
    $nomeItem = $_POST['nomeItem'];
    $desc = $_POST['desc'];
    $preco = $_POST['preco'];
    $tipo = $_POST['tipo'];
    $subtipo = $_POST["subtipo"];

    if (!str_contains($preco, "@@")) {
        if (str_contains($preco, ',')) {
            $split = explode(",", $preco);
            if (strlen($split[1]) == 1) {
                $split[1] = $split[1] . "0";
            }
            $preco = $split[0] . "," . $split[1];
        } else if (str_contains($preco, '.')) {
            $split = explode(".", $preco);
            if (strlen($split[1]) == 1) {
                $split[1] = $split[1] . "0";
            }
            $preco = $split[0] . "," . $split[1];
        } else {
            $preco = $preco . ",00";
        }
    }

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
        $sql = "INSERT INTO item (nomeItem, descItem, precoItem, tipoItem, subtipoItem, nomeImg, extensaoImg) 
                VALUES ('$nomeItem', '$desc', '$preco', '$tipo', '$subtipo', '$novoNome', '$extensaoImg')";
        if($conn->query($sql) === TRUE){
            echo "<script>alert('Item inserido com sucesso!');</script>";
            echo "<script>window.location = 'cadastraItem.php';</script>";
        }else{
            echo "Erro: " .$sql. "<br>" .$conn->error;
            echo "<script>window.history.back();</script>";
        }
    }else{
        $msg[] = "Erro ao mover o arquivo para a pasta";
    }
    foreach($msg as $value){
        echo $value . "<br>";
    }
?>