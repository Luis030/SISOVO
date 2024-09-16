function patologiaForm(){
    const contenedorPat = document.querySelector('.contenedor-formulario-patologia');
    const contenedorEsp = document.querySelector('.contenedor-formulario-especialidad');
    const contenedorOcu = document.querySelector('.contenedor-formulario-ocupacion');

    contenedorEsp.style.display = 'none';
    contenedorOcu.style.display = 'none'
    contenedorPat.style.display = 'block';
}

function ocupacionForm(){
    const contenedorPat = document.querySelector('.contenedor-formulario-patologia');
    const contenedorEsp = document.querySelector('.contenedor-formulario-especialidad');
    const contenedorOcu = document.querySelector('.contenedor-formulario-ocupacion');

    contenedorEsp.style.display = 'none';
    contenedorOcu.style.display = 'block'
    contenedorPat.style.display = 'none';
}

function especialidadForm(){
    const contenedorPat = document.querySelector('.contenedor-formulario-patologia');
    const contenedorEsp = document.querySelector('.contenedor-formulario-especialidad');
    const contenedorOcu = document.querySelector('.contenedor-formulario-ocupacion');

    contenedorEsp.style.display = 'block';
    contenedorOcu.style.display = 'none'
    contenedorPat.style.display = 'none';
}