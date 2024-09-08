document.addEventListener('DOMContentLoaded', function() {
    const informe = JSON.parse(localStorage.getItem('informeSeleccionado'));
    if (informe) {
        document.getElementById('titulo').textContent = informe.Titulo;
        document.getElementById('fecha').textContent = informe.Fecha;
        document.getElementById('observaciones').textContent = informe.ID_Informe;
    } else {
        document.getElementById('detalle').textContent = 'Informe no encontrado.';
    }
});