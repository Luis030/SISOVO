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
    if (divDia.style.display == 'none') {
        divDia.style.display = 'flex';
    } else {    
        divDia.style.display = 'none';
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
    if (divDocente.style.display == 'none') {
        divDocente.style.display = 'flex';
    } else {    
        divDocente.style.display = 'none';
    }
}

function volverAtras() {
    const volver = document.getElementById('volver');
    window.open("clases.php");
}
