let toggleSenha = document.getElementById("botaoSenha");
let senha = document.getElementById("senhaFunc");

toggleSenha.addEventListener("click", function () {
    // toggle the type attribute
    const tipo = senha.getAttribute("type") === "password" ? "text" : "password";
    //console.log(tipo);    
    senha.setAttribute("type", tipo);
        
    // toggle the icon
    this.classList.toggle("bi-eye");
    console.log(this.classList);
});

//converter pra password qndo enviar
let cadastra = document.getElementById("enviar");
    cadastra.addEventListener("click", function(){
    senha.setAttribute("type", "password");
});