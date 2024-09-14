document.addEventListener('keydown', (event) => {
    if(event.key === 'Escape'){
        const patOverlayDiv = document.getElementById('agregar-overlay');
        if(patOverlayDiv.style.display == "block"){
            patOverlayDiv.style.display = 'none';
        }
    }
})
function patOverlay(){
    const patOverlayDiv = document.getElementById('agregar-overlay');
    patOverlayDiv.style.display = 'block';
    
}
function cerrarPatOverlay(){
    const patOverlayDiv = document.getElementById('agregar-overlay');
    patOverlayDiv.style.display = 'none';
}