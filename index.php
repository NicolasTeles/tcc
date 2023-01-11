<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php
  require_once("conexao.php");
  session_start();
  unset($_SESSION["nomeFunc"]);
  unset($_SESSION["sobrenomeFunc"]);
  unset($_SESSION["emailFunc"]);
  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TCC</title>
  <link rel="stylesheet" href="index-estilo.css">
  <link rel="stylesheet" href="estiloRodape.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<body>
  <header class="classcabecalho"> <img src="img/logo3.png" class="logoimg">
    <nav class="navCarrinho">
      <div class="cardiv">
        <p class="textoTabela" hidden>Seu carrinho está vazinho =(</p>
          <div class="divCarrinho" hidden>
            <table class="tabela" border="1">
              <th class="thCarrinho" colspan="2">Item</th>
              <th class="thCarrinho">Preço</th>
              <th class="thCarrinho">Quantidade</th>
              <th class="thCarrinho">Total</th>
              <th class="thCarrinho">Apagar</th>
              <tbody class="tbody"></tbody>
            </table>
              <input type="button" value="Finalizar pedido" class="buttonCarrinho" onclick="">

          </div>
      </div>
    </nav>
    <nav class="navUser">
      <?php 
      if (!isset($_SESSION["nomeCliente"])) {
      ?>
        <h1 class="tituloUsuario">Login</h1>
        <a href="login.php" class="linkUsuario">Fazer login</a>
      <?php
      } else {
        ?>
        <h1 class="tituloUsuario">Logout</h1>
        <a href="logout.php" class="linkUsuario">Sair</a>
      <?php
      }
      ?>
    </nav>

    <ul class="headerUL">
      <?php
      if (isset($_SESSION["nomeCliente"])) {
        ?>
      <p class="nomeSession"><?php echo $_SESSION["nomeCliente"] ?></p>      
      <li class="headerLI"><button class="user"><i class="fa-solid fa-user-minus carrinho fa-3x"></i></button></li>
      <?php
      }else{
      ?>
      <li class="headerLI"><button class="user"><i class="fa-solid fa-user-plus carrinho fa-3x"></i></button></li>
      <?php
      }
      ?>
      <li class="headerLI"><button class="menu-btn"><i class="fa-solid fa-cart-arrow-down carrinho fa-3x"></i></button></li>
    </ul>
  </header>

  <br><br><br><br><br><br><br><br>

  <select class="escolha" onchange="escolher(this)">
    <option value="bebida">Bebidas</option>
    <option value="lanche">Lanches</option>
  </select>

  <br><br><br><br><br><br>

  <h1 id="bebidaTitulo" class="blog-title"> Bebidas </h1>
  <br>

  <!--Accordion-->

  <div class="container">
    <div class="content">
      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Filtrados
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Filtrados'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class="popup-link">
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="accordion_item" style="background-color: #fafdff">
        <div class="accordion_header">
          <span>
            Miseráveis
          </span>
          <div class="icon">
            +
          </div>
        </div>

        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Miseráveis'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>
      </div>

      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Espresso
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Expresso'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>

      </div>
      <div class="accordion_item" style="background-color:  #fafdff;">
        <div class="accordion_header">
          <span>
            Cappuccino
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Cappuccino'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>

      </div>
      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Cafés & Chás
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Cafés e Chás'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>

      </div>
      <div class="accordion_item" style="background-color:  #fafdff">
        <div class="accordion_header">
          <span>
            Smoothie & Frappé
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Smoothie e Frappé'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>

      </div>
      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Chocolate
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Chocolate'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>

      </div>

      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Sucos e Refrigerantes
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Sucos e Refrigerantes'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>

      </div>
      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Cervejas
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Cervejas'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>

      </div>
      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Drinks
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Drinks'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>

      </div>
    </div>
  </div>

  <br><br>
  <div class="popup-fundo">
    <div class="popup">
      <div class="popup-fechar"><i class="fa-solid fa-square-xmark fa-2x"></i></div>
      <div class="popup-content">
        <div id="Img_Lanche">
          <img class=imgp style="width: 80%; border-radius: 15px;" src="">
        </div>
        <?php
        if (isset($_SESSION["nomeCliente"])) {
          ?>
        <button onclick="proximo_item()">+</button>
        <button onclick="voltar_item()">-</button>
        <button onclick="produto.salvar()">ADD</button>
        <br>
        <select id="qtde" name="qtde" size="1">
          <option value="1" selected>1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        <?php
        } else {
          ?>
        <button><a href="login.php">Faça login para poder adicionar itens ao carrinho</a></button>
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  <h1 id="lancheTitulo" class="blog-title"> Lanches </h1>

  <br>
  <!--Accordion-->
  <div class="container2">
    <div class="content">
      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Quiches
          </span>
          <div class="icon">
            +
          </div>
        </div>

        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Quiches'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Folhados
          </span>
          <div class="icon">
            +
          </div>
        </div>

        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Folhados'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Pão de Queijo
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Pão de Queijo'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Sanduiches & Omeletes
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Sanduiches e Omeletes'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>

      </div>
      <div class="accordion_item" style="background-color: #fafdff;">
        <div class="accordion_header">
          <span>
            Doces
          </span>
          <div class="icon">
            +
          </div>
        </div>
        <div class="accordion_content">
          <?php
          $sql = "SELECT * FROM item WHERE subtipoItem='Doces'";
          $resultado = $conn->query($sql);
          while ($exibir = $resultado->fetch_assoc()) {
          ?>
            <p>
            <div class="d1">
              <button class=popup-link>
                <table>
                  <tr>
                    <td style="width: 100px"> <img src="imagens/<?php echo $exibir['nomeImg']; ?>" class="im2"></td>
                    <th style="width: 150px" class="nomeTable"><?php echo $exibir['nomeItem']; ?></th>
                    <td style="width: 80px" class="precoTable">R$<?php echo $exibir['precoItem']; ?></td>
                  </tr>
                </table>
              </button>
            </div>
            </p>
            <br>
          <?php
          }
          ?>
        </div>

      </div>
    </div>
  </div>

  <br><br>

  <!-- Rodapé-->
  <footer>
    <div class="caixa">
      <h2> Início </h2>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Produto</a></li>
        <li><a href="#">Download</a></li>
      </ul>
    </div>

    <div class="caixa">

      <h2>Sobre nós</h2>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, aliquam incidunt nobis praesentium a
        dolorum dolores id quae sequi earum, doloribus eum nemo nisi accusamus impedit magnam porro aspernatur
        optio?
      </p>
    </div>
  </footer>
  <div class="rodape">
    <h2><i class="fa-solid fa-mug-saucer" aria-hidden="true"></i></h2>
    <div class="sociais">
      <div class="social"> <a href="#"> <i class="fa-brands fa-instagram" aria-hidden="true"></i> </a></div>
      <div class="social"> <a href="#"> <i class="fa-brands fa-whatsapp" aria-hidden="true"></i> </a></div>
    </div>
  </div>

  <div class="fundo"></div>
  <script src="index-script.js"></script>
</body>

</html>