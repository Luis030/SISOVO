document.addEventListener('DOMContentLoaded', function() {
    const informe = JSON.parse(localStorage.getItem('informeSeleccionado'));
    if (informe) {
        document.getElementById('titulo').textContent = informe.Titulo;
        document.getElementById('fecha').textContent = informe.Fecha;
        document.getElementById('docente').textContent = informe.Docente;
        document.getElementById('tituloOnInforme').textContent = informe.Titulo;
        document.getElementById('fechaOnInforme').textContent = informe.Fecha;
        document.getElementById('observacionesOnInforme').textContent = informe.Observaciones;
        document.getElementById('docenteOnInforme').textContent = informe.Docente;
    }
});