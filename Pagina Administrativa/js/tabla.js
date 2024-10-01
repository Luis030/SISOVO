function cerrarEliminar() {
    const overlayCon = document.getElementById('overlayFondo');
    overlayCon.style.display = 'none';
}

document.addEventListener('keydown', (event) => {
    if(event.key === 'Escape'){
        const overlayCon = document.getElementById('overlayFondo');
        if(overlayCon.style.display == "block"){
        overlayCon.style.display = 'none';
        }
    }
})