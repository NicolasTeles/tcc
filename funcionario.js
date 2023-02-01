let toggleSenha = document.getElementById("botaoSenha");
let senha = document.getElementById("senhaFunc");
let toggleConfirma = document.getElementById("botaoConfirma");
let confirma = document.getElementById("confirmaSenha");

toggleSenha.addEventListener("click", function () {
    // toggle the type attribute
    const tipo = senha.getAttribute("type") === "password" ? "text" : "password";
    //console.log(tipo);    
    senha.setAttribute("type", tipo);
        
    // toggle the icon
    this.classList.toggle("bi-eye");
    console.log(this.classList);
});

toggleConfirma.addEventListener("click", function () {
    // toggle the type attribute
    const tipo = confirma.getAttribute("type") === "password" ? "text" : "password";
    //console.log(tipo);    
    confirma.setAttribute("type", tipo);
        
    // toggle the icon
    this.classList.toggle("bi-eye");
    console.log(this.classList);
});

//converter pra password qndo enviar
let cadastra = document.getElementById("enviar");
    cadastra.addEventListener("click", function(){
    senha.setAttribute("type", "password");
    confirma.setAttribute("type", "password");
});

const form = document.querySelector("form");
cadastra.addEventListener("click", function(){
    if(senha.value != confirma.value){
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        }); 
        alert("As senhas não coincidem");
        senha.value="";
        confirma.value="";
    }
});

radioTipos = document.querySelectorAll("[name='tipoFunc']");

function marcaTipo(id){
    for (input of radioTipos) {
        if (input.id == id) {
            input.checked = true;
        }
    }
}