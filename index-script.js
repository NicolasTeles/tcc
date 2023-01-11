//clicar na posição
function escolher(valor) {
    if (valor.value == "lanche") {
        const lanches = document.getElementById("lancheTitulo");
        lanches.scrollIntoView({ behavior: "smooth" });
    }
    if (valor.value == "bebida") {
        const bebidas = document.getElementById("bebidaTitulo");
        bebidas.scrollIntoView({ behavior: "smooth" });
    }
}

//carrinho
const btn = document.querySelector(".menu-btn");
const btnuser = document.querySelector(".user");
const navCarrinho = document.querySelector(".navCarrinho");
const navUser = document.querySelector(".navUser");
const fund = document.querySelector(".fundo");
const imgcart = document.querySelector(".fa-solid.fa-cart-arrow-down");
const imguser = document.querySelector(".fa-solid.fa-user-plus");
const imgUserMinus = document.querySelector(".fa-user-minus");
const nomeCliente = document.querySelector(".nomeSession");

btn.onclick = function () {
    this.classList.toggle("active");
    navCarrinho.classList.toggle("active");

    if (imgcart.classList.contains("fa-cart-arrow-down")) {
        btnuser.classList.remove("user");
        btnuser.classList.add("user2");
        imgcart.classList.remove("fa-cart-arrow-down");
        imgcart.classList.add("fa-circle-xmark");
        if (imguser != null && imguser != undefined) {
            imguser.classList.remove("fa-user-plus");
        } else if (imgUserMinus != null && imgUserMinus != undefined) {
            imgUserMinus.classList.remove("fa-user-minus");
        }
        nomeCliente.style.display = "none";
        /*subir botão com o click*/
    } else {
        imgcart.classList.remove("fa-circle-xmark");
        imgcart.classList.add("fa-cart-arrow-down");
        if (imguser != null && imguser != undefined) {
            imguser.classList.add("fa-user-plus");
        } else if (imgUserMinus != null && imgUserMinus != undefined) {
            imgUserMinus.classList.add("fa-user-minus");
        }
        btnuser.classList.remove("user2");
        btnuser.classList.add("user");
        nomeCliente.style.display = "inline-block";
    }
};
btn.addEventListener("click", () => {
    produto.btnConfereCarrinho();
    if (fund.style.display == "block") {
        fund.style.display = "none";
        function unloadScrollBars() {
            document.documentElement.style.overflow = "auto";
            document.documentElement.style.overflowX = "hidden";
            document.body.scroll = "no";
        }
        unloadScrollBars();
    } else {
        fund.style.display = "block";
    }
    function unloadScrollBars() {
        document.documentElement.style.overflow = "hidden";
        document.body.scroll = "no";
    }
    unloadScrollBars();
});

btnuser.onclick = function () {
    navUser.classList.toggle("active");
    if (imguser != null && imguser != undefined) {
        if (imguser.classList.contains("fa-user-plus")) {
            btn.classList.remove("menu-btn");
            btn.classList.add("menu-btn2");
            imguser.classList.remove("fa-user-plus");
            imguser.classList.add("fa-circle-xmark");
            fund.style.width = '80%';
            nomeCliente.style.display = "none";
        } else {
            btn.classList.remove("menu-btn2");
            btn.classList.add("menu-btn");
            imguser.classList.remove("fa-circle-xmark");
            imguser.classList.add("fa-user-plus");
            fund.style.width = '60%';
            nomeCliente.style.display = "inline-block";
        }
    } else if (imgUserMinus != null && imgUserMinus != undefined) {
        if (imgUserMinus.classList.contains("fa-user-minus")) {
            btn.classList.remove("menu-btn");
            btn.classList.add("menu-btn2");
            imgUserMinus.classList.remove("fa-user-minus");
            imgUserMinus.classList.add("fa-circle-xmark");
            fund.style.width = '80%';
            nomeCliente.style.display = "none";
        } else {
            btn.classList.remove("menu-btn2");
            btn.classList.add("menu-btn");
            imgUserMinus.classList.remove("fa-circle-xmark");
            imgUserMinus.classList.add("fa-user-minus");
            fund.style.width = '60%';
            nomeCliente.style.display = "inline-block";
        }
    }
};
btnuser.addEventListener("click", () => {
    if (fund.style.display == "block") {
        fund.style.display = "none";
        function unloadScrollBars() {
            document.documentElement.style.overflow = "auto";
            document.documentElement.style.overflowX = "hidden";
            document.body.scroll = "no";
        }
        unloadScrollBars();
    } else {
        fund.style.display = "block";
    }
    function unloadScrollBars() {
        document.documentElement.style.overflow = "hidden";
        document.body.scroll = "no";
    }
    unloadScrollBars();
});

//cabecalho
const header = document.querySelector("header");
const logoimg = document.querySelector(".logoimg");

window.addEventListener("scroll", diminuirHeader);

function diminuirHeader() {
    if (window.pageYOffset > 0 && header.classList.contains("classcabecalho")) {
        header.classList.remove("classcabecalho");
        header.classList.add("classcabecalhomin");
        logoimg.style.width = "65px";
        logoimg.style.height = "62.5px";
        logoimg.style.transition = ".7s";
    } else if (
        window.pageYOffset == 0 &&
        header.classList.contains("classcabecalhomin")
    ) {
        header.classList.add("classcabecalho");
        header.classList.remove("classcabecalhomin");
        logoimg.style.width = "120px";
        logoimg.style.height = "115px";
        logoimg.style.transition = ".35s";
    }
}

//popups
const popdiv = document.querySelectorAll(".popup-link");
const popup = document.querySelector(".popup-fundo");

popdiv.forEach((mostra) => {
    mostra.addEventListener("click", () => {
        mostra.classList.add("referencia");
        imagemClicada = document.querySelector(".referencia").querySelector(".im2");
        imagemDiv = document.querySelector(".imgp");
        popup.style.display = "block";
        imagemDiv.src = imagemClicada.src;
        function unloadScrollBars() {
            document.documentElement.style.overflow = "hidden";
            document.body.scroll = "no";
        }
        unloadScrollBars();
        mostra.classList.remove("referencia");
    });
});

popup.addEventListener("click", (event) => {
    const clicado = event.target.classList[0];
    if (
        clicado === "popup-fechar" ||
        clicado === "popup-fundo" ||
        clicado === "fa-solid" ||
        clicado === "fa-square-xmark"
    ) {
        popup.style.display = "none";
        function unloadScrollBars() {
            document.documentElement.style.overflow = "auto";
            document.documentElement.style.overflowX = "hidden";
            document.body.scroll = "no";
        }
        unloadScrollBars();
    }
});

//add carrinho
function proximo_item() {
    let select = document.getElementById("qtde");
    if (document.getElementById("qtde").value != 4) {
        let soma = parseInt(select.value) + 1;
        document.getElementById("qtde").value = soma;
    }
}
function voltar_item() {
    let select = document.getElementById("qtde");
    if (document.getElementById("qtde").value > 1) {
        let soma = parseInt(select.value) - 1;
        document.getElementById("qtde").value = soma;
    }
}

/*function Add_carrinho() {
    var qtde = document.getElementById('qtde');
    var qtdeValor = qtde.options[qtde.selectedIndex].value;
    
    alert("Quantidade de "+item+": "+qtdeValor+"\nPreço unitário:" +precoUnit);
}*/

//accordion
const accordion_item = document.querySelectorAll(".accordion_item");

accordion_item.forEach((item) => {
    const accordion_header_item = item.querySelector(".accordion_header");

    accordion_header_item.addEventListener("click", () => {
        const accordion_content_item = item.querySelector(".accordion_content");

        const item_actived = document.querySelector(".activeacc");

        VerifyActive(item, accordion_content_item, item_actived);
    });
});

function VerifyActive(item, content, content_actived) {
    const icon_item = item.querySelector(".icon");
    const icon_item_active = document.querySelectorAll(".icon");

    icon_item_active.forEach((item) => (item.innerHTML = "+"));

    if (content_actived) {
        content_actived.style.height = 0;
        content_actived.classList.remove("activeacc");
    }

    if (content !== content_actived) {
        icon_item.innerHTML = "-";
        content.classList.add("activeacc");
        content.style.height = content.scrollHeight + 10 + "px";
    }
}

//javascript do carrinho

const cardiv = document.querySelector(".cardiv");
const divCarrinho = document.querySelector(".divCarrinho");
const textoTabela = document.querySelector(".textoTabela");
const tbodyCheckout = document.querySelector(".tbodyCheckout");
const tbody = document.querySelector(".tbody");
const checkCarrinho = document.querySelector("fa-solid fa-circle-check fa-1x");

let item;
let precoUnit;
popdiv.forEach((cada) => {
    cada.addEventListener("click", () => {
        cada.classList.add("referencia");
        nomeClicado = document
            .querySelector(".referencia")
            .querySelector(".nomeTable");
        precoClicado = document
            .querySelector(".referencia")
            .querySelector(".precoTable");
        item = nomeClicado.innerHTML;
        precoUnit = precoClicado.innerHTML;
        cada.classList.remove("referencia");
    });
});

class Produto {
    constructor() {
        this.id = 0;
        this.arrayProdutos = [];
    }
    btnConfereCarrinho() {
        if (this.arrayProdutos.toString() == 0) {
            divCarrinho.hidden = true;
            textoTabela.hidden = false;
            cardiv.classList.add("cardiv");
            cardiv.classList.remove("cardiv2");
        } else {
            divCarrinho.hidden = false;
            textoTabela.hidden = true;
            cardiv.classList.remove("cardiv");
            cardiv.classList.add("cardiv2");
        }
    }
    salvar() {
        let produto = this.lerDados();
        this.adicionar(produto);
        this.listaTabela();
        popup.style.display = "none";
        function unloadScrollBars() {
            document.documentElement.style.overflow = "auto";
            document.documentElement.style.overflowX = "hidden";
            document.body.scroll = "no";
        }
        unloadScrollBars();
    }
    adicionar(produto) {
        let array = this.arrayProdutos;
        let inserir = true;
        for (let i = 0; i < this.arrayProdutos.length; i++) {
            //conferir se existe produtos com mesmo Id
            if (produto.imagem == array[i].imagem) {
                //caso exista irei apenas mudar a quantidade
                inserir = false;
                this.arrayProdutos[i].qtde =
                    parseInt(this.arrayProdutos[i].qtde) + parseInt(produto.qtde); //produto.qtde estou pegando valor do input digitado, pois é do array de mesmo id
            }
        }
        if (inserir) {
            this.arrayProdutos.push(produto);
        }
        this.id++;
    }
    lerDados() {
        var qtde = document.getElementById("qtde");
        var qtdeValor = qtde.options[qtde.selectedIndex].value;

        let produto = {};
        produto.id = this.id;
        produto.imagem = imagemDiv.src;
        produto.nomeProduto = item;
        produto.qtde = qtdeValor;
        produto.preco = precoUnit;
        return produto;
    }
    listaTabela() {
        tbody.innerText = ""; //sempre que adicino um novo valor ao array, ele limpa os dados da tabela, para que assim não haja repetição, porque o for ele passa denovo pelo mesmo lugar do array
        for (let i = 0; i < this.arrayProdutos.length; i++) {
            let tr = tbody.insertRow(); //criar uma nova linha para a tabela

            //valores para os dados
            //let td_id = tr.insertCell(); //adiciona as colunas para a linha
            let td_imagem = tr.insertCell();
            let td_nome = tr.insertCell();
            let td_preco = tr.insertCell();
            let td_qtde = tr.insertCell();
            let td_total = tr.insertCell();
            let td_acao = tr.insertCell();

            //td_id.innerText = this.arrayProdutos[i].id;//dou valor as linhas da tabela
            td_nome.innerText = this.arrayProdutos[i].nomeProduto;
            td_preco.innerText = this.arrayProdutos[i].preco;
            let precoSeparado = this.arrayProdutos[i].preco.split(/[$,]/);
            let precoNum = Number(precoSeparado[1] + "." + precoSeparado[2]);
            let totalNum = precoNum * this.arrayProdutos[i].qtde;
            let totalString = totalNum.toString().split(".");
            if (totalString[1] != undefined && totalString[1] != null) {
                td_total.innerText =
                    "R$" + (totalString[0] + "," + totalString[1] + "0");
            } else {
                td_total.innerText = "R$" + (totalString[0] + ",00");
            }

            let imgProduto = document.createElement("img");
            imgProduto.classList.add("imgCarrinho");
            imgProduto.src = this.arrayProdutos[i].imagem;
            td_imagem.appendChild(imgProduto);

            let qtdeEditar = document.createElement("input"); //criei um input do tipo number
            qtdeEditar.type = "text";
            qtdeEditar.disabled = "true";
            qtdeEditar.classList.add("inputQtde");
            let qtdeDiminuir = document.createElement("Input");
            let qtdeAumentar = document.createElement("Input");
            qtdeDiminuir.type = "button";
            qtdeAumentar.type = "button";

            //aumentar e diminuir quantidade
            qtdeDiminuir.classList.add("buttonqQtdeCarrinho");
            qtdeAumentar.classList.add("buttonqQtdeCarrinho");
            qtdeDiminuir.value = "-";
            qtdeAumentar.value = "+";
            qtdeEditar.value = this.arrayProdutos[i].qtde; //dei o valor da quantidade do indice (i) do array
            td_qtde.appendChild(qtdeDiminuir);
            td_qtde.appendChild(qtdeEditar);
            td_qtde.appendChild(qtdeAumentar);
            qtdeDiminuir.setAttribute(
                "onclick",
                "produto.DiminuirQtde(" + this.arrayProdutos[i].id + ")"
            );
            qtdeAumentar.setAttribute(
                "onclick",
                "produto.AumentarQtde(" + this.arrayProdutos[i].id + ")"
            );

            //lixeira
            let iEditar = document.createElement("i"); //essa variavel cria uma tag HTML, <img>
            iEditar.classList.add("fa-trash");
            iEditar.classList.add("fa-solid");
            iEditar.setAttribute(
                "onclick",
                "produto.deletar(" + this.arrayProdutos[i].id + ")"
            ); //1°arg: Dou uma ação a imagem, e segundo passo o que a ação irá fazer
            td_acao.appendChild(iEditar); //dentro de um td, vair ter um outro elemento, nesse caso a imagem
        }
    }
    enviaPedido() {
        for (var i = 0; i < this.arrayProdutos.length; i++) {
            var img_produto = this.arrayProdutos[i].imagem;
            var nm_produto = this.arrayProdutos[i].nomeProduto;
            var qtde_produto = this.arrayProdutos[i].qtde;
            var preco_produto = this.arrayProdutos[i].preco;
            var total_produto =
                this.arrayProdutos[i].preco * this.arrayProdutos[i].qtde;
        }
        var src =
            "enviaPedido.php?imagem_produto=" +
            img_produto +
            "&nome=" +
            nm_produto +
            "&preco=" +
            preco_produto +
            "&qtde=" +
            qtde_produto +
            "&total=" +
            total_produto;
        window.location.assign(src);
    }
    deletar(idDeletar) {
        let nomeDeletar;
        let index;
        for (let i = 0; i < this.arrayProdutos.length; i++) {
            if (this.arrayProdutos[i].id == idDeletar) {
                nomeDeletar = this.arrayProdutos[i].nomeProduto;
                index = i;
            }
        }
        if (
            confirm(
                "Deseja realmente remover o item " + nomeDeletar + " do seu carrinho?"
            )
        ) {
            this.arrayProdutos.splice(index, 1); //essa função deleta um array por meio do indice passado (i), e deletará apenas um registro
            tbody.deleteRow(index); //deleto da tabela a linha com o indice enviado
            this.btnConfereCarrinho();
        }
    }

    DiminuirQtde(idSubtrair) {
        for (let i = 0; i < this.arrayProdutos.length; i++) {
            if (this.arrayProdutos[i].id == idSubtrair) {
                if (this.arrayProdutos[i].qtde != 1) {
                    this.arrayProdutos[i].qtde = parseInt(this.arrayProdutos[i].qtde) - 1;
                } else {
                    this.deletar(this.arrayProdutos[i].id);
                }
            }
            this.listaTabela();
        }
    }

    AumentarQtde(idAumentar) {
        for (let i = 0; i < this.arrayProdutos.length; i++) {
            if (this.arrayProdutos[i].id == idAumentar) {
                this.arrayProdutos[i].qtde = parseInt(this.arrayProdutos[i].qtde) + 1;
            }
            this.listaTabela();
        }
    }
}
var produto = new Produto();
