function unloadScrollBars() {
  if (document.body.style.overflow == "hidden") {
    document.body.style.overflow = "auto";
  } else {
    document.body.style.overflow = "hidden";
  }
}

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
    btnuser.disabled = true;
    imgcart.classList.remove("fa-cart-arrow-down");
    imgcart.classList.add("fa-circle-xmark");
    if (imguser) {
      imguser.classList.remove("fa-user-plus");
    } else if (imgUserMinus) {
      imgUserMinus.classList.remove("fa-user-minus");
    }
    nomeCliente.style.display = "none";
    /*subir botão com o click*/
  } else {
    imgcart.classList.remove("fa-circle-xmark");
    imgcart.classList.add("fa-cart-arrow-down");
    if (imguser) {
      imguser.classList.add("fa-user-plus");
    } else if (imgUserMinus) {
      imgUserMinus.classList.add("fa-user-minus");
    }
    btnuser.classList.remove("user2");
    btnuser.classList.add("user");
    btnuser.disabled = false;
    nomeCliente.style.display = "inline-block";
  }
};

btn.addEventListener("click", () => {
  produto.btnConfereCarrinho();
  if (fund.style.display == "block") {
    fund.style.display = "none";
  } else {
    fund.style.display = "block";
  }
  unloadScrollBars();
});

btnuser.onclick = function () {
  navUser.classList.toggle("active");
  if (imguser) {
    if (imguser.classList.contains("fa-user-plus")) {
      btn.classList.remove("menu-btn");
      btn.classList.add("menu-btn2");
      btn.disabled = true;
      imguser.classList.remove("fa-user-plus");
      imguser.classList.add("fa-circle-xmark");
      nomeCliente.style.display = "none";
    } else {
      btn.classList.remove("menu-btn2");
      btn.classList.add("menu-btn");
      btn.disabled = false;
      imguser.classList.remove("fa-circle-xmark");
      imguser.classList.add("fa-user-plus");
      nomeCliente.style.display = "inline-block";
    }
  } else if (imgUserMinus) {
    if (imgUserMinus.classList.contains("fa-user-minus")) {
      btn.classList.remove("menu-btn");
      btn.classList.add("menu-btn2");
      btn.disabled = true;
      imgUserMinus.classList.remove("fa-user-minus");
      imgUserMinus.classList.add("fa-circle-xmark");
      nomeCliente.style.display = "none";
    } else {
      btn.classList.remove("menu-btn2");
      btn.classList.add("menu-btn");
      btn.disabled = false;
      imgUserMinus.classList.remove("fa-circle-xmark");
      imgUserMinus.classList.add("fa-user-minus");
      nomeCliente.style.display = "inline-block";
    }
  }
};
btnuser.addEventListener("click", () => {
  if (fund.style.display == "block") {
    fund.style.display = "none";
  } else {
    fund.style.display = "block";
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

var custoClicado;

popdiv.forEach((mostra) => {
  mostra.addEventListener("click", () => {
    mostra.classList.add("referencia");
    imagemClicada = document.querySelector(".referencia").querySelector(".im2");
    tituloClicado = document
      .querySelector(".referencia")
      .querySelector(".nomeTable");
    custoClicado = document
      .querySelector(".referencia")
      .querySelector(".precoTable");
    descClicada = document
      .querySelector(".referencia")
      .querySelector(".descTable");

    imagemDiv = document.querySelector(".popup-tabimg");
    tituloDiv = document.querySelector(".tituloDiv");
    custoDiv = document.querySelector(".custoDiv");
    descDiv = document.querySelector(".descDiv");
    document.querySelector(".textpop").value = "";
    document.querySelector("#qtde").value = "";

    if (descClicada.textContent.includes("@@")) {
      document.querySelector("div.radio").textContent = "";
      document.querySelector("#rowDesc").hidden = true;
      document.querySelector("#rowObs").hidden = true;
      document.querySelector("div.radio").hidden = false;

      paragrafo = document.createElement("p");
      paragrafo.textContent = "Opções:";
      document.querySelector("div.radio").appendChild(paragrafo);

      custoClicado = custoClicado.textContent.replace("R$", "");
      var descricaoClicada = descClicada.textContent.replace("@@", "");
      custoClicado = custoClicado.split("/");
      descricaoClicada = descricaoClicada.split("/");
      for (let i = 0; i < custoClicado.length; i++) {
        opcao = document.createElement("input");
        opcao.type = "radio";
        opcao.name = "obs";
        opcao.id = "obs" + i;
        opcao.style = "margin-left: 30px";
        opcao.setAttribute("onchange", "geraPreco(" + i + ")");

        labelOpcao = document.createElement("label");
        labelOpcao.textContent = descricaoClicada[i];
        labelOpcao.id = "labelObs" + i;
        labelOpcao.setAttribute("onclick", "labelMarca(" + i + ")");
        document.querySelector("div.radio").appendChild(opcao);
        document.querySelector("div.radio").appendChild(labelOpcao);
      }
      custoDiv.textContent = "R$" + custoClicado[0];
      descDiv.textContent = descricaoClicada;
    } else {
      document.querySelector("#rowDesc").hidden = false;
      document.querySelector("#rowObs").hidden = false;
      document.querySelector("div.radio").hidden = true;
      custoDiv.textContent = custoClicado.textContent;
      descDiv.textContent = descClicada.textContent;
    }

    popup.style.display = "block";
    imagemDiv.src = imagemClicada.src;
    tituloDiv.textContent = tituloClicado.textContent;

    unloadScrollBars();
    mostra.classList.remove("referencia");
  });
});

function geraPreco(index) {
  document.querySelector(".custoDiv").textContent = "R$" + custoClicado[index];
}

function labelMarca(index) {
  document.querySelector("#obs" + index).checked = true;
  geraPreco(index);
}

popup.addEventListener("click", (event) => {
  const clicado = event.target.classList[0];
  if (
    clicado === "popup-fechar" ||
    clicado === "popup-fundo" ||
    clicado === "fa-solid" ||
    clicado === "fa-square-xmark"
  ) {
    popup.style.display = "none";
    unloadScrollBars();
  }
});

//add carrinho
function proximo_item() {
  let select = document.getElementById("qtde");
  if (!document.getElementById("qtde").value) {
    document.getElementById("qtde").value = 0;
  }
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

  icon_item_active.forEach((item) => (item.textContent = "+"));

  if (content_actived) {
    content_actived.style.height = 0;
    content_actived.classList.remove("activeacc");
  }

  if (content !== content_actived) {
    icon_item.textContent = "-";
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
    item = nomeClicado.textContent;
    precoUnit = precoClicado.textContent;
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
    unloadScrollBars();
  }
  adicionar(produto) {
    let array = this.arrayProdutos;
    let inserir = true;
    for (let i = 0; i < this.arrayProdutos.length; i++) {
      //conferir se existe produtos com mesmo Id
      if (produto.imagem == array[i].imagem) {
        //caso exista irei apenas mudar a quantidade
        if (produto.obs == array[i].obs) {
          inserir = false;
          this.arrayProdutos[i].qtde =
            parseInt(this.arrayProdutos[i].qtde) + parseInt(produto.qtde);
        }
      }
    }
    if (inserir) {
      this.arrayProdutos.push(produto);
    }
    this.id++;
  }
  lerDados() {
    var qtde = document.getElementById("qtde");
    var qtdeValor;
    if (qtde.value) {
      qtdeValor = qtde.value;
    } else {
      qtdeValor = 1;
    }

    let produto = {};
    produto.id = this.id;
    produto.imagem = imagemDiv.src;
    produto.nomeProduto = document.querySelector(".tituloDiv").innerText;
    produto.qtde = qtdeValor;
    produto.preco = document.querySelector(".custoDiv").innerText;
    if (!document.querySelector("#rowDesc").hidden) {
      if (document.querySelector(".textpop").value) {
        produto.obs = document.querySelector(".textpop").value;
      } else {
        produto.obs = "Sem observações";
      }
    } else if (!document.querySelector("div.radio").hidden) {
      const radioInputs = document.querySelectorAll("[name='obs']");

      for (let input of radioInputs) {
        if (input.checked) {
          let index = input.id.replace("obs", "");
          produto.obs = document.querySelector("#labelObs" + index).textContent;
          break;
        } else {
          produto.obs = document.querySelector("#labelObs0").textContent;
        }
      }
    }
    return produto;
  }
  listaTabela() {
    tbody.textContent = ""; //sempre que adicino um novo valor ao array, ele limpa os dados da tabela, para que assim não haja repetição, porque o for ele passa denovo pelo mesmo lugar do array
    for (let i = 0; i < this.arrayProdutos.length; i++) {
      let tr = tbody.insertRow(); //criar uma nova linha para a tabela

      //valores para os dados
      //let td_id = tr.insertCell(); //adiciona as colunas para a linha
      let td_imagem = tr.insertCell();
      let td_nome = tr.insertCell();
      let td_obs = tr.insertCell();
      let td_preco = tr.insertCell();
      let td_qtde = tr.insertCell();
      let td_total = tr.insertCell();
      let td_acao = tr.insertCell();

      //td_id.textContent = this.arrayProdutos[i].id;//dou valor as linhas da tabela
      td_obs.textContent = this.arrayProdutos[i].obs;
      td_nome.textContent = this.arrayProdutos[i].nomeProduto;
      td_preco.textContent = this.arrayProdutos[i].preco;
      var precoSeparado = this.arrayProdutos[i].preco.split(/[$,]/);
      var precoNum = Number(precoSeparado[1] + "." + precoSeparado[2]);
      var totalNum = precoNum * this.arrayProdutos[i].qtde;
      var totalString = totalNum.toString().split(".");
      if (totalString[1] != undefined && totalString[1] != null) {
        td_total.textContent =
          "R$" + (totalString[0] + "," + totalString[1] + "0");
      } else {
        td_total.textContent = "R$" + (totalString[0] + ",00");
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
    outer:for (var i = 0; i < this.arrayProdutos.length; i++) {
      var img_produto = this.arrayProdutos[i].imagem;
      var nm_produto = this.arrayProdutos[i].nomeProduto;
      var qtde_produto = this.arrayProdutos[i].qtde;
      var obs_produto = this.arrayProdutos[i].obs;
      var date = new Date();
      var dataBrasil = date.toLocaleString();
      var status_pedido = "Pedido feito";
      var total_produto;

      var precoSeparado = this.arrayProdutos[i].preco.split(/[$,]/);
      var precoNum = Number(precoSeparado[1] + "." + precoSeparado[2]);
      var totalNum = precoNum * this.arrayProdutos[i].qtde;
      var totalString = totalNum.toString().split(".");
      if (totalString[1] != undefined && totalString[1] != null) {
        total_produto = "R$" + (totalString[0] + "," + totalString[1] + "0");
      } else {
        total_produto = "R$" + (totalString[0] + ",00");
      }

      var preco_produto = this.arrayProdutos[i].preco;

      var bool;

      var src =
        "../php/enviaPedido.php?data=" +
        dataBrasil +
        "&imagem_produto=" +
        img_produto +
        "&nome=" +
        nm_produto +
        "&preco=" +
        preco_produto +
        "&qtde=" +
        qtde_produto +
        "&total=" +
        total_produto +
        "&status=" +
        status_pedido +
        "&obs=" +
        obs_produto;
        if (bool) {
          window.location.assign(src);
        }else{
          if (confirm("Tem certeza de enviar seu pedido?")) {
            bool = true;
            window.location.assign(src);
          }else{
            break outer;
          }
        }
    }
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

function login() {
  window.location = "../php/login.php";
}
function login_telefone() {
  window.location = "../php/login_telefone.php";
}
