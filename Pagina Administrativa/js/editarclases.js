function mostrarEditarNombre() { 
    const divNombre = document.getElementById('editandoNombre');
    if (divNombre.classList.contains('visible')) {
        divNombre.classList.remove('visible');
    } else {
        divNombre.classList.add('visible');
    }
}

function mostrarEditarDia() { 
    const divDia = document.getElementById('editandoDia');
    if (divDia.classList.contains('visible')) {
        divDia.classList.remove('visible');
    } else {
        divDia.classList.add('visible');
    }
}

function mostrarEditarInicio() { 
    const divInicio = document.getElementById('editandoInicio');
    if (divInicio.classList.contains('visible')) {
        divInicio.classList.remove('visible');
    } else {
        divInicio.classList.add('visible');
    }
}

function mostrarEditarFinal() { 
    const divFinal = document.getElementById('editandoFinal');
    if (divFinal.classList.contains('visible')) {
        divFinal.classList.remove('visible');
    } else {
        divFinal.classList.add('visible');
    }
}

function mostrarEditarDocente() { 
    const divDocente = document.getElementById('editandoDocente');
    if (divDocente.classList.contains('visible')) {
        divDocente.classList.remove('visible');
    } else {
        divDocente.classList.add('visible');
    }
}

function volverAtras() {
    const volver = document.getElementById('volver');
    window.location.href = "clases";
}
