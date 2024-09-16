function patologiaForm(){
    const contenedorPat = document.querySelector('.formPat');
    const contenedorEsp = document.querySelector('.formEsp');
    const contenedorOcu = document.querySelector('.formOcu');
    const botonPat = document.getElementById('patologiaBoton');
    const botonEsp = document.getElementById('especialidadBoton');
    const botonOcu = document.getElementById('ocupacionBoton');
    const tituloP = document.getElementById('tituloAgregado');

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
    const contenedorPat = document.querySelector('.formPat');
    const contenedorEsp = document.querySelector('.formEsp');
    const contenedorOcu = document.querySelector('.formOcu');
    const botonPat = document.getElementById('patologiaBoton');
    const botonEsp = document.getElementById('especialidadBoton');
    const botonOcu = document.getElementById('ocupacionBoton');
    const tituloP = document.getElementById('tituloAgregado');

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
    const contenedorPat = document.querySelector('.formPat');
    const contenedorEsp = document.querySelector('.formEsp');
    const contenedorOcu = document.querySelector('.formOcu');
    const botonPat = document.getElementById('patologiaBoton');
    const botonEsp = document.getElementById('especialidadBoton');
    const botonOcu = document.getElementById('ocupacionBoton');
    const tituloP = document.getElementById('tituloAgregado');

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