<!DOCTYPE html>
<html lang="pt-br">
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="estilo-nicolas.css">
        <link rel="stylesheet" href="estiloAdmin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    </head>
    <body style="text-align: center;">
        <div style="background-color: #3a1624; height: 150px; margin: auto; left: 0; right: 0; top: 0; position: absolute;"> <img src="Capturar.PNG" style="margin-top: 20px;"></div>
        <br><br><br><br><br><br><br><br><br><br>

        <button class="divPendente" style="right: 7%;">
            <img src="pedidos pendentes-nicolas.png" class="imagem pretoBranco">
            <div style="display: inline-block;">
                <p class="nome" style="margin-top: 50px;">Pedidos pendentes</p>
            </div>
        </button>

        <button class="divPronto" style="left: 5%;">
            <img src="pedidos prontos-nicolas.png" class="imagem">
            <div style="display: inline-block;">
                <p class="nome" style="margin-top: 50px;">Pedidos prontos</p>
            </div>
        </button>


        <br><br><br><br><br><br><br><br><br><br>
        <div class="fundoPendente">
            <div class="popupPendente">
                <div class="popupFechar"><i class="fa-solid fa-xmark"></i></div>

                <div class="popup-conteudo">
                    <h2>Pedidos Pendentes</h2>
                    <table style="width: 100%;" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Preço unit.</th>
                                <th>Qtde</th>
                                <th>Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Croissant</td>
                                <td>R$16,50</td>
                                <td>1</td>
                                <td>R$16,50</td>
                            </tr>
                            <tr>
                                <td>Cappuccino</td>
                                <td>R$7,00</td>
                                <td>2</td>
                                <td>R$14,00</td>
                            </tr>
                            <tr>
                                <td>Misto Quente</td>
                                <td>R$8,50</td>
                                <td>1</td>
                                <td>R$8,50</td>
                            </tr>
                            <tr>
                                <th colspan="3">Total</th>
                                <td>R$39,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>     

        <div class="fundoPronto">
            <div class="popupPronto">
                <div class="popupFechar"><i class="fa-solid fa-xmark"></i></div>

                <div class="popup-conteudo">
                    <h2>Pedidos Prontos</h2>
                    <table style="width: 100%;" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Preço unit.</th>
                                <th>Qtde</th>
                                <th>Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Café expresso</td>
                                <td>R$5,50</td>
                                <td>4</td>
                                <td>R$22,00</td>
                            </tr>
                            <tr>
                                <td>Cappuccino</td>
                                <td>R$7,00</td>
                                <td>3</td>
                                <td>R$21,00</td>
                            </tr>
                            <tr>
                                <td>Panqueca</td>
                                <td>R$10,50</td>
                                <td>2</td>
                                <td>R$21,00</td>
                            </tr>
                            <tr>
                                <th colspan="3">Total</th>
                                <td>R$64,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
        
        
        <script src="popup.js"></script>
    </body>
</html>