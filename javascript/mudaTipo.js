radioTipos = document.querySelectorAll("[name='tipoFunc']");

function marcaTipo(id) {
    for (input of radioTipos) {
        if (input.id == id) {
            input.checked = true;
        }
    }
}
