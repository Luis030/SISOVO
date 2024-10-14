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
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        html: `
        <div class="filtros-div">
        Docente:
        <input type="text" id="docente-filtro" class="avanzado" placeholder="Nombre o cedula"><br><br>
        Fecha:
        <input type="date" id="fecha-filtro" class="avanzado"><br><br>
        Tipo: <select id="selectAvanzado">
            <option value=""></option>
            <option value="E">Entrada</option>
            <option value="S">Salida</option>
        </select>
        <br><br>
        Hora: <input type="time" id="hora-avanzado" class="avanzado">
        <br><br>
      </div>
      <div class="filtros-div">
          Rango de fechas: <br> <br>
          Min: <input type="date" id="fechas-filtro-1" class="avanzado"><br><br> Max: <input type="date" id="fechas-filtro-2" class="avanzado">
          <br><br>
          
          
          Rango de horas: <br><br>
          Min: <input type="time" id="horas-filtro-1" class="avanzado"><br><br>Max: <input type="time" id="horas-filtro-2" class="avanzado">
      </div>
        `
    }).then((resultado) => {
      if(resultado.isConfirmed){
        let docente = "";
        let fecha = "";
        let tipo = "";
        let hora = "";
        let rangofechas1 = "";
        let rangofechas2 = "";
        let rangohoras1 = "";
        let rangohoras2 = "";
        const ValorDocente = document.getElementById('docente-filtro').value;
        const ValorFecha = document.getElementById('fecha-filtro').value;
        const ValorTipo = document.getElementById('selectAvanzado').value;
        const ValorHora = document.getElementById('hora-avanzado').value;
        const ValorFechas1 = document.getElementById('fechas-filtro-1').value;
        const ValorFechas2 = document.getElementById('fechas-filtro-2').value;
        const ValorHoras1 = document.getElementById('horas-filtro-1').value;
        const ValorHoras2 = document.getElementById('horas-filtro-2').value;
        if(ValorDocente){
          docente = ValorDocente
        }
        if(ValorFecha){
          fecha = ValorFecha
        }
        if(ValorTipo){
          tipo = ValorTipo
        }
        if(ValorHora){
          hora = ValorHora
        }
        if(ValorFechas1){
          fecha = "";
          rangofechas1 = ValorFechas1;
        }
        if(ValorFechas2){
          fecha = "";
          rangofechas2 = ValorFechas2;
        }
        if(ValorHoras1){
          hora = "";
          rangohoras1 = ValorHoras1;
        }
        if(ValorHoras2){
          hora = "";
          rangohoras2 = ValorHoras2;
        }
        
        tablas['listadoc'] = iniciarTabla('lista-docente', 'php/asistenciasdocentes.php?docente='+docente+'&&fecha='+fecha+'&&tipo='+tipo+'&&hora='+hora+'&&rangofecha1='+rangofechas1+'&&rangofecha2='+rangofechas2+'&&rangohora1='+rangohoras1+'&&rangohora2='+rangohoras2, columnasListaDocente(), "50vh", rollCallBackListaDocente);
        const radios = document.querySelectorAll('.checkfiltro');
        radios.forEach(radio => {
            radio.checked = false;
        });
      }
    })
}