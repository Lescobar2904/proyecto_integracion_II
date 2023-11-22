document.addEventListener('DOMContentLoaded', function() {
    const CodigoBarras = document.getElementById('codigoBarras');

    CodigoBarras.focus();

    var asis = document.getElementById('btn');
    asis.addEventListener('click', function() {
        window.location.href = 'https://pillan.inf.uct.cl/~lescobar/DesWeb/TallerIntegracion/Lukas/pag1.HTML';
    });

    window.addEventListener('load', function () {
        document.body.classList.add('loaded');
    });
});

function escanear() {
    const codigoBarras = document.getElementById('codigoBarras').value;

    if (codigoBarras.trim() === '') {
        mostrarMensaje('Por favor, ingrese un codigo de barras valido.', 'error');
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
            mostrarMensaje('Error: ' + data.error, 'error');
        } else {
            mostrarMensaje(data.message, 'success');
            document.getElementById('codigoBarras').value = ''; 
        }
    })
    .catch(error => {
        mostrarMensaje('Ha ocurrido un error en la solicitud: ' + error.message, 'error');
    });
}

function mostrarMensaje(mensaje, tipo) {
    const mensajeElement = document.getElementById('mensaje');
    mensajeElement.textContent = mensaje;
    mensajeElement.className = tipo;
}