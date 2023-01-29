<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estiloLista.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <style>
    img{
      width: 300px;
      height: auto;
    }
    table, td, th{
      border: solid black 1px;
      border-collapse: collapse;
    }
  </style>
</head>

<body>
  <h1 style="top: 100px;" class="titulo">Imagens não salvas no banco de dados</h1>
  <div style="width: 50%; margin-top: 150px; margin-left: auto; margin-right: auto;">
  <?php
  require_once('conexao.php');
  $sql = "SELECT * FROM item order by idItem";
  $resultado = $conn->query($sql);
  
  // Set the directory where the images are stored
  $dir = 'imagens/';

  // Open the directory
  $dirHandle = opendir($dir);
  ?>
  <table class="table table-dark table-striped" style="text-align: center; vertical-align: middle;">
    <tr>
        <th>Imagem</th>
        <th>Excluir</th>
    </tr>
  
  <?php
  while ($exibir = $resultado->fetch_assoc()) {
    $array[] = $exibir['nomeImg'];
  }

  // Loop through the directory
  while ($file = readdir($dirHandle)) {
    if ($file == '.' || $file == '..') {
      continue;
    }
    for ($i=0; $i < count($array); $i++) { 
      if ($array[$i] == $file) {
        continue 2;
      }
    }

    ?>
    <tr>
      <td><img src="<?php echo $dir . $file; ?>"></td>
      <td>
        <a href="#" onclick="confirmaExclusao('<?php echo $dir . $file; ?>')">
          <i style="color: red;" class="fa-trash fa-solid"></i>
        </a>
      </td>
    </tr>
    <?php
  }

  // Close the directory
  closedir($dirHandle);
  ?>
  </table>
  </div>
</body>

<script>
  function confirmaExclusao(nomeImagem){
    if (confirm("Deseja realmente excluir a imagem?")) {
      window.location = "excluirImagem.php?fileName=" + nomeImagem;
    }
  }
</script>

</html>