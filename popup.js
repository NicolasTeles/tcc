const pendente = document.querySelector('.divPendente');
const escurecePendente = document.querySelector('.fundoPendente');
const escurecePronto = document.querySelector('.fundoPronto');
const fecha = document. querySelector('.popupFechar');
const pronto = document.querySelector('.divPronto');

pronto.addEventListener('click', () => {
    escurecePronto.style.display = 'block';
})

pendente.addEventListener('click', () => {
    escurecePendente.style.display = 'block';
})

escurecePendente.addEventListener('click', event => {
    const classNameOfClickedElement = event.target.classList[0];
    const nomesClasses = ['popupFechar', 'fundoPendente'];
    const deveFechar = nomesClasses.some(nomeClasse => nomeClasse === classNameOfClickedElement);

    if(deveFechar){
        escurecePendente.style.display = 'none';
    }
})

escurecePronto.addEventListener('click', event => {
    const classNameOfClickedElement = event.target.classList[0];
    const nomesClasses = ['popupFechar', 'fundoPronto'];
    const deveFechar = nomesClasses.some(nomeClasse => nomeClasse === classNameOfClickedElement);

    if(deveFechar){
        escurecePronto.style.display = 'none';
    }
})