<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estiloLista.css">
  <link rel="stylesheet" href="estilo_Pedidos.css">
  <link rel="stylesheet" href="estilo_Guilherme.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
  <header><img src="img/logo3.png" class="logoimg">
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <button class="menu-btn" onclick="home()"><i class="fa-solid fa-house-chimney carrinho fa-2x"></i> </button>
      </li>
    </ul>
  </header>
  <h1 class="titulo"> Listar Imagens <i class="fa-regular fa-images"></i> </h1>
  <div class=div_1>
    <?php
    require_once('conexao.php');
    $sql = "SELECT * FROM item order by idItem";
    $resultado = $conn->query($sql);

    // Set the directory where the images are stored
    $dir = 'imagens/';

    // Open the directory
    $dirHandle = opendir($dir);
    ?>
    <div class=divPedido>
      <div class="SemP">
        <table class="tabela" style="wigth: 50%;">
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
            for ($i = 0; $i < count($array); $i++) {
              if ($array[$i] == $file) {
                continue 2;
              }
            }

          ?>
            <tr>
              <td><img class=imgex src="<?php echo $dir . $file; ?>"></td>
              <td>
                <a href="" onclick="confirmaExclusao('<?php echo $dir . $file; ?>')">
                  <i style="color: #bd2a33;" class="fa-trash fa-solid fa-2x"></i>
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
    </div>
  </div>
</body>

<script>
  function confirmaExclusao(nomeImagem) {
    if (confirm("Deseja realmente excluir a imagem?")) {
      alert(nomeImagem);
      window.location = "excluirImagem.php?fileName=" + nomeImagem;
    }
  }
</script>
<footer>
  <i class="fa-solid fa-mug-saucer fa-2x" aria-hidden="true"></i>
</footer>
<script src="home.js"></script>

</html>