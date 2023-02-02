function abreReferencia(referencia){
    window.location = referencia+".php";
}

function unloadScrollBars() {
  if (document.body.style.overflow == "hidden") {
    document.body.style.overflow = "auto";
  } else {
    document.body.style.overflow = "hidden";
  }
}

const fundo = document.querySelector(".fundo");
const btnFunc = document.querySelector(".menu-btn");
const navFunc = document.querySelector(".navFunc");
const btnGear = document.querySelector(".carrinho");
const nomeFunc = document.querySelector(".nomeSession");

btnFunc.onclick = function () {
  navFunc.classList.toggle("active");
  if (btnGear.classList.contains("fa-user-gear")) {
    btnGear.classList.remove("fa-user-gear");
    btnGear.classList.add("fa-circle-xmark");
    nomeFunc.style.display = "none";
  } else if (btnGear.classList.contains("fa-circle-xmark")) {
    btnGear.classList.remove("fa-circle-xmark");
    btnGear.classList.add("fa-user-gear");
    nomeFunc.style.display = "inline-block";
  }
};

btnFunc.addEventListener("click", () => {
  if (fundo.style.display == "block") {
    fundo.style.display = "none";
  } else {
    fundo.style.display = "block";
  }
  unloadScrollBars();
});
