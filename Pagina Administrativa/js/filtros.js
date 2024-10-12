document.addEventListener('DOMContentLoaded', function(){
    const botonesRadio = document.querySelectorAll('.checkfiltro');
    botonesRadio.forEach((botonRadio) => {
        botonRadio.addEventListener('change', function() {
          // Cuando se selecciona uno, desactivar los demás
          if (this.checked) {
            botonesRadio.forEach((cb) => {
              if (cb !== this) {
                cb.checked = false;  // Desactivar los demás
              }
            });
            
            // Ejecutar una función específica dependiendo de cuál checkbox fue seleccionado
            filtrarListaDocente(this.value);
          }
        });
    });
    
      
})

function filtrarListaDocente(tipo){
    tablas['listadoc'] = iniciarTabla('lista-docente', 'php/asistenciasdocentes.php?time='+tipo, columnasListaDocente(), "50vh", rollCallBackListaDocente);
}

function filtrosAvanzadosListaDocente(){
    Swal.fire({
        title: "Filtros avanzados",
        focusConfirm: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        html: `
        Fecha:
        <input type="date" class="avanzado"><br><br>

        Rango de fechas: <br> <br>
         <input type="date" class="avanzado" disabled> <input type="date" class="avanzado" disabled>
        <br><br>
        Tipo: <select id="selectAvanzado">
            <option value=""></option>
            <option value="E">Entrada</option>
            <option value="S">Salida</option>
        </select>
        <br><br>
        Hora: <input type="time" class="avanzado">
        <br><br>
        Rango de horas: <br><br>
        <input type="time" class="avanzado" disabled> <input type="time" class="avanzado" disabled>
        `
    })
}