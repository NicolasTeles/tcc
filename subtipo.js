function mudaOpcao(){
    let selecionado = document.getElementById("tipo").value;
    let subtipo = document.getElementById("subtipo").options;
    if(selecionado == "Lanche"){
        subtipo.item(0).text = "Quiches";
        subtipo.item(0).value = "Quiches";
        subtipo.item(0).selected = true;

        subtipo.item(1).text = "Folhados";
        subtipo.item(1).value = "Folhados";

        subtipo.item(2).text = "Pão de Queijo";
        subtipo.item(2).value = "Pão de Queijo";

        subtipo.item(3).text = "Sanduiches e Omeletes";
        subtipo.item(3).value = "Sanduiches e Omeletes";

        subtipo.item(4).text = "Doces";
        subtipo.item(4).value = "Doces";
        
        subtipo.remove(9);
        subtipo.remove(8);
        subtipo.remove(7);
        subtipo.remove(6);
        subtipo.remove(5);

    }else if(selecionado == "Bebida"){
        subtipo.item(0).text = "Filtrados";
        subtipo.item(0).value = "Filtrados";
        subtipo.item(0).selected = true;

        subtipo.item(1).text = "Miseráveis";
        subtipo.item(1).value = "Miseráveis";

        subtipo.item(2).text = "Expresso";
        subtipo.item(2).text = "Expresso";

        subtipo.item(3).text = "Cappuccino";
        subtipo.item(3).value = "Cappuccino";

        subtipo.item(4).text = "Cafés e Chás";
        subtipo.item(4).value = "Cafés e Chás";

        let w = document.createElement("OPTION");
        w.setAttribute("value", "Smoothie e Frappé");
        w.text = "Smoothie e Frappé"
        document.getElementById("subtipo").options.add(w);

        let x = document.createElement("OPTION");
        x.setAttribute("value", "Chocolate");
        x.text = "Chocolate"
        document.getElementById("subtipo").options.add(x);

        let y = document.createElement("OPTION");
        y.setAttribute("value", "Sucos e Refrigerantes");
        y.text = "Sucos e Refrigerantes"
        document.getElementById("subtipo").options.add(y);

        let z = document.createElement("OPTION");
        z.setAttribute("value", "Cervejas");
        z.text = "Cervejas"
        document.getElementById("subtipo").options.add(z);

        let c = document.createElement("OPTION");
        c.setAttribute("value", "Drinks");
        c.text = "Drinks"
        document.getElementById("subtipo").options.add(c);
    }
}

function criaOpcoes(){
    var qtdeTamanhos = document.getElementById("qtdeTamanhos").value;
    if(qtdeTamanhos > 3){
        alert("O limite de opções é 3");
        qtdeTamanhos.value = "";
    }else if(!qtdeTamanhos){
        alert("Favor inserir uma quantidade de opções");
    }else{
        var tamanho = document.querySelectorAll(".tamanhos");
        var labelTamanho = document.querySelectorAll(".labelTamanho");
        // var precos = document.querySelectorAll(".precoMultiplo");
        if (tamanho.length>qtdeTamanhos) {
            for (let j = qtdeTamanhos; j < tamanho.length; j++) {
                document.getElementById("container").removeChild(labelTamanho[j]);
                document.getElementById("container").removeChild(tamanho[j]);
                criaDesc();
            }
        }
        for(let i=0; i<qtdeTamanhos; i++){
            if(!tamanho[i]){
                // var inputPreco = document.createElement("input");
                // inputPreco.type = "text";
                // inputPreco.name = "custo"+i;
                // inputPreco.id = "custo"+i;
                // inputPreco.classList.add("precoMultiplo");

                var label = document.createElement("label");
                label.for = "field"+i;
                label.classList.add("labelTamanho");
                label.innerHTML = i+1 +"ª opção";

                var input = document.createElement("input");
                input.type = "text";
                input.name = "field"+i;
                input.id = "field"+i;
                input.classList.add("tamanhos");
                input.oninput = criaDesc;
                document.getElementById("container").appendChild(label);
                document.getElementById("container").appendChild(input);
            }
        }
    }
}

$(document).ready(function(){
    let textoCheckbox = document.getElementById("bold");
    var testaChecado = document.getElementById("confereTamanho");

    textoCheckbox.addEventListener('click', () => {
        if(testaChecado.checked){
            testaChecado.checked = false;
            checou();
        }else{
            testaChecado.checked = true;
            checou();
        }
    });
});

function checou(){
    var checkbox = document.querySelector("#confereTamanho");
    var numTamanhos = document.querySelector("#qtdeTamanhos");
    var btnOpcao = document.querySelector("#criaOpcao");
    var divContainer = document.querySelector("#container");
    var textarea = document.querySelector("#desc");
    
    
    
    if(checkbox.checked){
        numTamanhos.hidden = false;
        btnOpcao.hidden = false;
        divContainer.hidden = false;
        textarea.value = "";
        textarea.disabled = true;
    }else{
        numTamanhos.hidden = true;
        btnOpcao.hidden = true;
        divContainer.hidden = true;
        textarea.value = "";
        textarea.disabled = false;
    }
}

function criaDesc(){
    tamanhos = document.querySelectorAll(".tamanhos");
    var caixaTexto =  document.querySelector("#desc");
    caixaTexto.value = "";
    for (let i = 0; i < tamanhos.length; i++) {
        if(tamanhos[i]){
            caixaTexto.value += tamanhos[i].value;
            if(tamanhos[i+1]){
                caixaTexto.value += "/";
            }
        }
    }
}