const patologias = [];
document.addEventListener('DOMContentLoaded') = function(){
    document.getElementById('boton-agregar-patologias').addEventListener('keydown', function(event) {
        if (event.key === 'C') { // Verifica si la tecla presionada es Enter
            agregarPatologia();
        }
    });
}


function agregarPatologia() {
    const input = document.getElementById('boton-agregar-patologias');
    const valor = input.value.trim();
    if (valor) {
        patologias.push(valor);
        mostrarPatologias();
        input.value = ''; // Limpia el input después de agregar
    }
}

function mostrarPatologias() {
    const lista = document.getElementById('patologias-lista');
    lista.innerHTML = ''; // Limpiamos la lista antes de volver a mostrar
    patologias.forEach((patologia, index) => {
        const item = document.createElement('div');
        item.className = 'lista-item';
        item.innerHTML = `
            ${patologia} 
            <button onclick="eliminarPatologia(${index})">Eliminar</button>
        `;
        lista.appendChild(item);
    });
    actualizarLongitud();
}

function eliminarPatologia(index) {
    patologias.splice(index, 1);
    mostrarPatologias();
}

function enviarFormulario() {
    fetch('php/añadirpatologias.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ patologias: patologias })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Respuesta del servidor:', data);
        alert(data.message);
        console.log(data.errors);
        mostrarErrores(data.errors || []); 
    })
    .catch(error => {
        console.error('Error al enviar los datos:', error);
    });
}

function actualizarLongitud() {
    const longitudElemento = document.getElementById('longitud-array-patologias');
    longitudElemento.textContent = `Cantidad agregada: ${patologias.length}`;
}

function mostrarErrores(errores) {
    const contenedorErrores = document.getElementById('errores-patologias');
    contenedorErrores.innerHTML = ''; // Limpiar errores anteriores
    if (errores.length > 0) {
        errores.forEach(error => {
            const p = document.createElement('p');
            p.textContent = error;
            contenedorErrores.appendChild(p);
        });
    } else {
        contenedorErrores.textContent = 'No se encontraron errores.';
    }
}

