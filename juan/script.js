function escanear() {
    const codigoBarras = document.getElementById('codigoBarras').value;

    if (codigoBarras.trim() === '') {
        mostrarMensaje('Por favor, ingrese un código de barras válido.', 'error');
        return;
    }

    fetch('guardar.php', {
        method: 'POST',
        body: JSON.stringify({ codigoBarras }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            mostrarMensaje(data.error, 'error');
        } else {
            mostrarMensaje(data.message, 'success');
            document.getElementById('codigoBarras').value = ''; 
        }
    })
    .catch(error => {
        mostrarMensaje('Ha ocurrido un error en la solicitud.', error);
    });
}

function mostrarMensaje(mensaje, tipo) {
    const mensajeElement = document.getElementById('mensaje');
    mensajeElement.innerHTML = mensaje;
    mensajeElement.className = tipo;
}

document.addEventListener("DOMContentLoaded", function() {
    var asis = document.getElementById("btn");
    asis.addEventListener("click", function() {
        window.location.href = "../pag1.HTML";
    });
});

window.addEventListener('load', function () {
    document.body.classList.add('loaded');
});






