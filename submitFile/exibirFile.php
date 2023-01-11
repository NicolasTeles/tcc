<style>
    img{
        float: left;
        width: 20%;
        height: auto;
        margin-left: 0%;
        margin-right: 3%;
        margin-top: 10%;
        text-align: right;
    }
</style>

<?php
    require_once("conexaoFile.php");
    $sql = "SELECT * FROM tbfile order by idFile desc";
    $resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {
        while ($exibir = $resultado->fetch_assoc()) {
            ?>
                <img src="uploads/<?php echo $exibir['nomeFile'] ?>">
            <?php
        }
    }else{
        echo "Nenhum arquivo encontrado";
    }
?>