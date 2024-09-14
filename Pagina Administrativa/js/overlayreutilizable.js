var items = []; 

    
document.addEventListener('DOMContentLoaded', function() {
    const OcupacionValor = document.getElementById('select-ocupacion-overlay');
    document.getElementById('nueva-especialidad-boton').addEventListener('click', function(){
        if(OcupacionValor){
            OcupacionValor.addEventListener('change', function () {
                console.log("cambio");
            });
        }
        
    })
    
    document.getElementById('boton-agregar-items').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') { 
            event.preventDefault(); 
            agregarItem();
        }
    });
});


function agregarItem() {
    const input = document.getElementById('boton-agregar-items'); 
    const valor = input.value.trim();
    if (valor) {
        items.push(valor);
        mostrarItems();
        input.value = ''; 
    }
}



function mostrarItems() {
    const selectOcupacion = document.getElementById('select-ocupacion-overlay')
    if(selectOcupacion){
        if(selectOcupacion.value !== ""){
            if(items.length > 0){
                $('#select-ocupacion-overlay').prop('disabled', true);   
            } else {
                $('#select-ocupacion-overlay').prop('disabled', false);   
            }
        }
    }
    const lista = document.getElementById('items-lista'); 
    lista.innerHTML = ''; 
    items.forEach((item, index) => {
        const itemDiv = document.createElement('div');
        itemDiv.className = 'lista-item';
        itemDiv.innerHTML = `
            ${item} 
            <button onclick="eliminarItem(${index})">Eliminar</button>
        `;
        lista.appendChild(itemDiv);
    });
    actualizarLongitud();
}


function eliminarItem(index) {
    items.splice(index, 1);
    mostrarItems();
}


function enviarFormulario(enlace) {
    const selectOcupacion = document.getElementById('select-ocupacion-overlay')
    if(selectOcupacion){
        if(selectOcupacion.value !== ""){
            fetch(enlace, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ 
                    items: items,
                    ocupacion: selectOcupacion.value
                 })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor: ' + response.status);
                }
                return response.json(); 
            })
            .then(data => {
                items = [];
                const lista = document.getElementById('items-lista');
                lista.innerHTML = '';
                const contenedorErrores = document.getElementById('errores-items'); 
                contenedorErrores.innerHTML = '';
                const mensajeErrores = document.getElementById('mensaje-items'); 
                mensajeErrores.textContent = data.message;
                if (data.errors) {
                    mostrarErrores(data.errors);
                }
            })
            .catch(error => {
                console.error('Error al enviar los datos:', error);
                alert('Error al procesar la solicitud. Intenta nuevamente.');
            });
        } else {
            const mensajeErrores = document.getElementById('mensaje-items'); 
            mensajeErrores.textContent = "No se ha seleccionado ninguna ocupación";
        }
    }
}

function actualizarLongitud() {
    const longitudElemento = document.getElementById('longitud-array-items'); 
    longitudElemento.textContent = `Cantidad agregada: ${items.length}`;
}


function mostrarErrores(errores) {
    const contenedorErrores = document.getElementById('errores-items'); 
    contenedorErrores.innerHTML = ''; 
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
