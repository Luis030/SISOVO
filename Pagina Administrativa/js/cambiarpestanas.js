var items = [];

document.addEventListener('DOMContentLoaded', () => {
    const agregarTodo = document.querySelector('.botonAgregarTodo');
    agregarTodo.addEventListener('click', function() {
        const contenedorPat = document.querySelector('.formPat');
        const contenedorEsp = document.querySelector('.formEsp');
        const contenedorOcu = document.querySelector('.formOcu');
        if(contenedorPat.style.display == "flex"){
            enviarFormulario("php/añadirpatologias.php");
        }
        if(contenedorEsp.style.display == "flex"){
            enviarFormulario("php/añadirespecialidades.php");
        }
        if(contenedorOcu.style.display == "flex"){
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
    }
}

function mostrarItems(tipo) {
    const selectOcupacion = document.getElementById('ocupacionEspecialidad')
    if(selectOcupacion){
        if(selectOcupacion.value !== ""){
            if(items.length > 0){
                selectOcupacion.disabled = true;
            } else {
                selectOcupacion.disabled = false;
            }
        }
    }
    const lista = document.querySelector('.ingresado'); 
    lista.innerHTML = ''; 
    items.forEach((item, index) => {
        console.log(tipo)
        const itemDiv = document.createElement('div');
        fetch("php/" + tipo + "&&item=" + item)
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
    const contenedorEsp = document.querySelector('.formEsp');
    const selectOcupacion = document.getElementById('ocupacionEspecialidad')
    if(contenedorEsp.style.display !== "none"){
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
                const lista = document.querySelector('.ingresado');
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
            console.log("se llego hasta aca")
            items = [];
            const lista = document.querySelector('.ingresado');
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
            alert('Error al procesar la solicitud. Intenta nuevamente. otro');
        });
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

function patologiaForm(){ 
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
    if(contenedorPat.style.display == "none"){
        items = [];
        const lista = document.querySelector('.ingresado');
        lista.innerHTML = '';
        actualizarLongitud();
    }
    tituloP.textContent = 'Patologías agregadas'
    botonPat.style.backgroundColor = 'var(--color-secundario)';
    botonPat.style.color = 'var(--color-primario)';
    contenedorPat.style.display = 'flex';

    botonEsp.style.backgroundColor = '#f8f7f7';
    botonEsp.style.color = '#000000'
    contenedorEsp.style.display = 'none';

    botonOcu.style.backgroundColor = '#f8f7f7'
    botonOcu.style.color = '#000000'
    contenedorOcu.style.display = 'none'
}

function ocupacionForm(){
    const contErrores = document.getElementById('errores-items');
    const contMensajes = document.getElementById('mensaje-items');
    const contenedorPat = document.querySelector('.formPat');
    const contenedorEsp = document.querySelector('.formEsp');
    const contenedorOcu = document.querySelector('.formOcu');
    const botonPat = document.getElementById('patologiaBoton');
    const botonEsp = document.getElementById('especialidadBoton');
    const botonOcu = document.getElementById('ocupacionBoton');
    const tituloP = document.getElementById('tituloAgregado');
    contErrores.innerHTML = '';
    contMensajes.innerHTML = '';
    if(contenedorOcu.style.display == "none"){
        items = [];
        const lista = document.querySelector('.ingresado');
        lista.innerHTML = '';
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
    botonOcu.style.color = 'var(--color-primario)';
    contenedorOcu.style.display = 'flex'
}

function especialidadForm(){
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
    agregarTodo.onlick = 'enviarFormulario("añadirespecialidades")'

    botonPat.style.backgroundColor = '#f8f7f7';
    botonPat.style.color = '#000000'
    contenedorPat.style.display = 'none';

    tituloP.textContent = 'Especialidades agregadas';
    botonEsp.style.backgroundColor = 'var(--color-secundario)'
    botonEsp.style.color = 'var(--color-primario)';
    contenedorEsp.style.display = 'flex'

    botonOcu.style.backgroundColor = '#f8f7f7';
    botonOcu.style.color = '#000000'
    contenedorOcu.style.display = 'none';
}