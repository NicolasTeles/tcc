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