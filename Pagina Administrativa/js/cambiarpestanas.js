var items = [];

function actualizarLongitud() {
    const longitudElemento = document.getElementById('longitud-array-items'); 
    longitudElemento.textContent = `Cantidad agregada: ${items.length}`;
    if (items.length == 0) {
        $('#ocupacionEspecialidad').prop('disabled', false);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const agregarTodo = document.querySelector('.botonAgregarTodo');
    agregarTodo.addEventListener('click', function() {
        const contenedorPat = document.querySelector('.formPat');
        const contenedorEsp = document.querySelector('.formEsp');
        const contenedorOcu = document.querySelector('.formOcu');
        if(contenedorPat.style.display == "grid") {
            enviarFormulario("php/añadirpatologias.php");
        }
        if(contenedorEsp.style.display == "grid") {
            enviarFormulario("php/añadirespecialidades.php");
        }
        if(contenedorOcu.style.display == "grid") {
            enviarFormulario("php/añadirocupacion.php");
        }
    })
})

function agregarItem(texto, tipo) {
    const input = document.getElementById(texto); 
    const valor = input.value.trim();
    if (valor) {
        items.push(valor);
        mostrarItems(tipo);
        input.value = ''; 
        $('#ocupacionEspecialidad').prop('disabled', true);
    }
}

function mostrarItems(tipo) {
    let ocupacion;
    const selectOcupacion = document.getElementById('ocupacionEspecialidad')
    if(selectOcupacion) {
        if(selectOcupacion.value !== ""){
            ocupacion = selectOcupacion.value;
            if(items.length > 0){
                selectOcupacion.disabled = true;
            } else {
                selectOcupacion.disabled = false;
            }
        } else {
            ocupacion = false;
        }
    }
    console.log(ocupacion)
    const lista = document.querySelector('.ingresado'); 
    lista.innerHTML = ''; 
    items.forEach((item, index) => {
        const itemDiv = document.createElement('div');
        fetch("php/" + tipo + "&&item=" + item + "&&ocupacionEsp=" + ocupacion, {
            method: "POST",
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta');
            }
            return response.json();
        })
        .then(data => {
            console.log('Respuesta del servidor:', data);
            if (data.mensaje === 'agregado') {
                itemDiv.classList.add("lista-item-agregado");
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
        itemDiv.className = 'lista-item';
        itemDiv.innerHTML = `
            ${item} 
            <button onclick="eliminarItem(${index},'${tipo}')">Eliminar</button>
        `;
        lista.appendChild(itemDiv);
    });
    actualizarLongitud();
}

function eliminarItem(index, tipo) {
    items.splice(index, 1);
    mostrarItems(tipo);
}

function enviarFormulario(enlace) {
    console.log(enlace)
    const contenedorEsp = document.querySelector('.formEsp');
    const selectOcupacion = document.getElementById('ocupacionEspecialidad')
    if(contenedorEsp.style.display !== "none"){
        if(selectOcupacion.value !== ""){
            console.log("hizo esto")
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
                const lista = document.querySelector('.ingresado');
                lista.innerHTML = '';
                const contenedorErrores = document.getElementById('errores-items'); 
                contenedorErrores.innerHTML = '';
                const mensajeErrores = document.getElementById('mensaje-items'); 
                mensajeErrores.textContent = data.message;
                actualizarLongitud();
                if (data.errors) {
                    mostrarErrores(data.errors);
                }
            })
            .catch(error => {
                console.error('Error al enviar los datos:', error);
                alert('Error al procesar la solicitud. Intenta nuevamente. especialidad');
            });
        } else {
            const mensajeErrores = document.getElementById('mensaje-items'); 
            mensajeErrores.textContent = "No se ha seleccionado ninguna ocupación";
        }
    } else {
        fetch(enlace, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ 
                items: items
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
            const lista = document.querySelector('.ingresado');
            lista.innerHTML = '';
            const contenedorErrores = document.getElementById('errores-items'); 
            contenedorErrores.innerHTML = '';
            const mensajeErrores = document.getElementById('mensaje-items'); 
            mensajeErrores.textContent = data.message;
            actualizarLongitud();
            if (data.errors) {
                mostrarErrores(data.errors);
            }
        })
        .catch(error => {
            console.error('Error al enviar los datos:', error);
            alert('Error al procesar la solicitud. Intenta nuevamente. otro');
        });
    }
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

function patologiaForm() { 
    const selectOcupacion = document.getElementById('ocupacionEspecialidad')
    if (selectOcupacion) {
        selectOcupacion.disabled = false;
    }
    const contErrores = document.getElementById('errores-items');
    const contMensajes = document.getElementById('mensaje-items');
    const contenedorPat = document.querySelector('.formPat');
    const contenedorEsp = document.querySelector('.formEsp');
    const contenedorOcu = document.querySelector('.formOcu');
    const botonPat = document.getElementById('patologiaBoton');
    const botonEsp = document.getElementById('especialidadBoton');
    const botonOcu = document.getElementById('ocupacionBoton');
    const tituloP = document.getElementById('tituloAgregado');
    const agregarTodo = document.querySelector('.botonAgregarTodo');

    contErrores.innerHTML = '';
    contMensajes.innerHTML = '';

    agregarTodo.onlick = function(){
        enviarFormulario("añadirpatologias.php");
    }

    if (contenedorPat.style.display == "none") {
        items = [];
        const lista = document.getElementById('ingresado');
        lista.textContent = '';
        actualizarLongitud();
    }

    tituloP.textContent = 'Patologías agregadas'
    botonPat.style.backgroundColor = 'var(--color-secundario)';
    botonPat.style.color = 'white';
    contenedorPat.style.display = 'grid';

    botonEsp.style.backgroundColor = '#f8f7f7';
    botonEsp.style.color = '#000000'
    contenedorEsp.style.display = 'none';

    botonOcu.style.backgroundColor = '#f8f7f7'
    botonOcu.style.color = '#000000'
    contenedorOcu.style.display = 'none'
}

function ocupacionForm() {
    const selectOcupacion = document.getElementById('ocupacionEspecialidad')
    if(selectOcupacion) {
        selectOcupacion.disabled = false;
    }
    const contErrores = document.getElementById('errores-items');
    const contMensajes = document.getElementById('mensaje-items');
    const contenedorPat = document.querySelector('.formPat');
    const contenedorEsp = document.querySelector('.formEsp');
    const contenedorOcu = document.querySelector('.formOcu');
    const botonPat = document.getElementById('patologiaBoton');
    const botonEsp = document.getElementById('especialidadBoton');
    const botonOcu = document.getElementById('ocupacionBoton');
    const tituloP = document.getElementById('tituloAgregado');
    const agregarTodo = document.querySelector('.botonAgregarTodo');

    contErrores.innerHTML = '';
    contMensajes.innerHTML = '';

    agregarTodo.onlick = function() {
        enviarFormulario("añadirocupacion.php");
    }

    if (contenedorOcu.style.display == "none") {
        items = [];
        const lista = document.getElementById('ingresado');
        lista.textContent = '';
        actualizarLongitud();
    }

    botonPat.style.backgroundColor = '#f8f7f7';
    botonPat.style.color = '#000000'
    contenedorPat.style.display = 'none';

    botonEsp.style.backgroundColor = '#f8f7f7';
    botonEsp.style.color = '#000000'
    contenedorEsp.style.display = 'none';
    tituloP.textContent = 'Ocupaciones agregadas';

    botonOcu.style.backgroundColor = 'var(--color-secundario)'
    botonOcu.style.color = 'white';
    contenedorOcu.style.display = 'grid'
}

function especialidadForm() { 
    const contErrores = document.getElementById('errores-items');
    const contMensajes = document.getElementById('mensaje-items');
    const contenedorPat = document.querySelector('.formPat');
    const contenedorEsp = document.querySelector('.formEsp');
    const contenedorOcu = document.querySelector('.formOcu');
    const botonPat = document.getElementById('patologiaBoton');
    const botonEsp = document.getElementById('especialidadBoton');
    const botonOcu = document.getElementById('ocupacionBoton');
    const tituloP = document.getElementById('tituloAgregado');
    const agregarTodo = document.querySelector('.botonAgregarTodo');

    contErrores.innerHTML = '';
    contMensajes.innerHTML = '';

    agregarTodo.onlick = function() {
        enviarFormulario("añadirespecialidades.php");
    }

    if (contenedorEsp.style.display == "none") {
        items = [];
        const lista = document.getElementById('ingresado');
        lista.textContent = '';
        actualizarLongitud();
    }

    agregarTodo.onlick = 'enviarFormulario("añadirespecialidades")'

    botonPat.style.backgroundColor = '#f8f7f7';
    botonPat.style.color = '#000000'
    contenedorPat.style.display = 'none';

    tituloP.textContent = 'Especialidades agregadas';
    botonEsp.style.backgroundColor = 'var(--color-secundario)'
    botonEsp.style.color = 'white';
    contenedorEsp.style.display = 'grid'

    botonOcu.style.backgroundColor = '#f8f7f7';
    botonOcu.style.color = '#000000'
    contenedorOcu.style.display = 'none';
}