function mostrarEditarNombre() { 
    const divNombre = document.getElementById('editandoNombre');
    const divDia = document.getElementById('editandoDia');
    const divInicio = document.getElementById('editandoInicio');
    const divFinal = document.getElementById('editandoFinal');
    const divDocente = document.getElementById('editandoDocente');
    if (divNombre.classList.contains('visible')) {
        divNombre.classList.remove('visible');
    } else {
        divNombre.classList.add('visible'); 
        divDia.classList.remove('visible');
        divInicio.classList.remove('visible');
        divFinal.classList.remove('visible');
        divDocente.classList.remove('visible'); 
    }
}

function mostrarEditarDia() { 
    const divNombre = document.getElementById('editandoNombre');
    const divDia = document.getElementById('editandoDia');
    const divInicio = document.getElementById('editandoInicio');
    const divFinal = document.getElementById('editandoFinal');
    const divDocente = document.getElementById('editandoDocente');
    if (divDia.classList.contains('visible')) {
        divDia.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible');
        divDia.classList.add('visible');
        divInicio.classList.remove('visible');
        divFinal.classList.remove('visible');
        divDocente.classList.remove('visible'); 
    }
}

function mostrarEditarInicio() { 
    const divNombre = document.getElementById('editandoNombre');
    const divDia = document.getElementById('editandoDia');
    const divInicio = document.getElementById('editandoInicio');
    const divFinal = document.getElementById('editandoFinal');
    const divDocente = document.getElementById('editandoDocente');
    if (divInicio.classList.contains('visible')) {
        divInicio.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible');
        divDia.classList.remove('visible');
        divInicio.classList.add('visible');
        divFinal.classList.remove('visible');
        divDocente.classList.remove('visible'); 
    }
}

function mostrarEditarFinal() { 
    const divNombre = document.getElementById('editandoNombre');
    const divDia = document.getElementById('editandoDia');
    const divInicio = document.getElementById('editandoInicio');
    const divFinal = document.getElementById('editandoFinal');
    const divDocente = document.getElementById('editandoDocente');
    if (divFinal.classList.contains('visible')) {
        divFinal.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible');
        divDia.classList.remove('visible');
        divInicio.classList.remove('visible');
        divFinal.classList.add('visible');
        divDocente.classList.remove('visible');
    }
}

function mostrarEditarDocente() { 
    const divNombre = document.getElementById('editandoNombre');
    const divDia = document.getElementById('editandoDia');
    const divInicio = document.getElementById('editandoInicio');
    const divFinal = document.getElementById('editandoFinal');
    const divDocente = document.getElementById('editandoDocente');
    if (divDocente.classList.contains('visible')) {
        divDocente.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible');
        divDia.classList.remove('visible');
        divInicio.classList.remove('visible');
        divFinal.classList.remove('visible');
        divDocente.classList.add('visible');
    }
}

function volverAtras() {
    const volver = document.getElementById('volver');
    window.location.href = "clases";
}
