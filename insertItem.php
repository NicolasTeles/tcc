<?php
    include 'conexao.php';
    $nomeItem = $_POST['nomeItem'];
    $desc = $_POST['desc'];
    $preco = $_POST['preco'];
    $tipo = $_POST['tipo'];
    $imagem = $_POST['imagem'];
    $sql = "INSERT INTO item (nomeItem, descItem, precoItem, tipoItem, imgItem) 
    VALUES ('" .$nomeItem. "', '" .$desc. "', " .$preco. ", '" .$tipo. "', '" .$imagem. "')";
    if($conn->query($sql) === true){
        echo "<script>alert('Item inserido com sucesso!');</script>";
        echo "<script>window.location = 'cadastraItem.php';</script>";
    }else{
        echo "Erro: " .$sql. "<br>" .$conn->error;
        echo "<script>window.history.back();</script>";
    }
    $conn->close();
?>