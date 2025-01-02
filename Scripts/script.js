const texto = "Este es el texto que aparecerá poco a poco.";
let index = 0;

function mostrarTexto() {
    if (index < texto.length) {
        document.getElementById("text-box").innerHTML += texto.charAt(index);
        index++;
        setTimeout(mostrarTexto, 100); // Cambia 100 por el tiempo en milisegundos que desees
    }
}

window.onload = mostrarTexto;