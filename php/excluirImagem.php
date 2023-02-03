<?php
$nomeImagem = $_GET['fileName'];
if (file_exists($nomeImagem)) {
    unlink($nomeImagem);
    header("Location: exibeImagens.php");
} else {
    echo "<script>alert('erro');</script>";
}
?>