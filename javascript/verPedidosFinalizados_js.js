function confereText() {
    const textPesquisar = document.querySelector('textPesquisar');
    if (textPesquisar == '') {
        alert('Escreva a data!');
    } else {

    }
}
if (history.scrollRestoration) {
    history.scrollRestoration = 'manual';
} else {
    window.onbeforeunload = function () {
        window.scrollTo(0, 0);

    }
}
