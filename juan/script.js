const barrasInput = document.getElementById("Barras");
const instruccion = document.getElementById("Instruccion");

barrasInput.addEventListener("keydown", function(event) {
    if (event.keyCode === 13) { 
        instruccion.textContent = "Espere, por favor";
        setTimeout(function() {
            instruccion.textContent = "Ha sido registrada su asistencia";
            barrasInput.value = ""; 
        }, 4000); 
    }
});







