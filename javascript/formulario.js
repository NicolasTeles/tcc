const input = document.querySelector("#cel");

input.addEventListener('keypress', () => {
    let inputlenght = input.value.length;

    if(inputlenght === 0){
        input.value += "("
    }

    if(inputlenght === 3){
        input.value += ") "
    }

    if(inputlenght === 6){
        input.value += " "
    }
    if(inputlenght === 11){
        input.value += "-"
    }
});