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
    tablas['listadoc'] = iniciarTabla('lista-docente', 'php/asistenciasdocentes.php', columnasListaDocente(), "50vh", rollCallBackListaDocente, {
      time: tipo
    });
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
        
        tablas['listadoc'] = iniciarTabla('lista-docente', 'php/asistenciasdocentes.php', columnasListaDocente(), "50vh", rollCallBackListaDocente, {
          docente: docente,
          fecha: fecha,
          tipo: tipo,
          hora: hora,
          rangofecha1: rangofechas1,
          rangofecha2: rangofechas2,
          rangohora1: rangohoras1,
          rangohora2: rangohoras2
        });
        const radios = document.querySelectorAll('.checkfiltro');
        radios.forEach(radio => {
            radio.checked = false;
        });
      }
    })
}
let cantidadfiltroPat = '-';
function filtroGraficoPat(grafico){
  Swal.fire({
    title: "Filtro",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        html: `
        <span>Agrupar en otras: </span>
        <br>
        <span>Patologias con menos de <input type='number' id='filtroGPAT' min=0 placeholder=`+cantidadfiltroPat+`> alumnos</span>
              `
  }).then((resultado) => {
      if(resultado.isConfirmed){
          let cantidad = "";
          let filtros = 0;
          const valorCantidad = document.getElementById('filtroGPAT').value;
          if(valorCantidad){
            cantidad = valorCantidad;
            filtros++;
          }

          if(filtros > 0){
            if(grafico == 1){
              crearGrafico("canvaPat", "pie", "php/patologiasgrafico.php", [], {
                leyenda: false,
                label: "Alumnos"
              }, {
                cantidadA: cantidad
              })
            } else {
              crearGrafico("canvaPatElementos", "pie", "php/patologiasgrafico.php", [], {
                leyenda: false,
                label: "Alumnos"
              }, {
                cantidadA: cantidad
              })
            }
            
          
            cantidadfiltroPat = cantidad;
            if(cantidadfiltroPat != '-'){
              document.querySelector('.filtradoGPat').style.fill = "blue";
            }
          }
      }
  })
}
let cantidadfiltroEsp = '-';
function filtroGraficoEsp(){
  Swal.fire({
    title: "Filtro",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        html: `
        <span>Agrupar en otras: </span>
        <br>
        <span>Especialidades con menos de <input type='number' id='filtroGESP' min=0 placeholder=`+cantidadfiltroEsp+`> docentes</span>
              `
  }).then((resultado) => {
      if(resultado.isConfirmed){
          let cantidad = "";
          let filtros = 0;
          const valorCantidad = document.getElementById('filtroGESP').value;
          if(valorCantidad){
            cantidad = valorCantidad;
            filtros++;
          }

          if(filtros > 0){
            crearGrafico("canvaEsp", "pie", "php/especialidadesgrafico.php", [], {
              leyenda: false,
              label: "Docentes"
            }, {
              cantidadD: cantidad
            })
          
            cantidadfiltroEsp = cantidad;
            if(cantidadfiltroEsp != '-'){
              document.querySelector('.filtradoGEsp').style.fill = "blue";
            }
          }
      }
  })
}
let cantidadMesesfiltroInf = 9;
function filtradoGraficoInf(){
  Swal.fire({
    title: "Filtro",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        html: `
        <span>Rango de meses:</span>
        <br>
        <br>
        <span>Min: <input type='month' id='filtroInf1'></span>
        <br>
        <br>
        <span>Max: <input type='month' id='filtroInf2'></span>
        <br>
        <br>
        <span>Meses exactos:</span>
        <br>
        <br>
        <span>Ultimos <input type='number' id='filtroGInf' min=1> meses</span>
              `
  }).then((resultado) => {
      if(resultado.isConfirmed){
          let cantidad = "";
          let rangofecha1 = "";
          let rangofecha2 = "";
          let filtros = 0;
          const valorFecha1 = document.getElementById('filtroInf1').value;
          const valorFecha2 = document.getElementById('filtroInf2').value;
          const valorCantidad = document.getElementById('filtroGInf').value;
          if(valorCantidad){
            cantidad = valorCantidad;
            filtros++;
          }
          
          if (valorFecha1 && valorFecha2) {
            rangofecha1 = valorFecha1;
            rangofecha2 = valorFecha2;
            filtros++;
            cantidad = "";
          }

          if(filtros > 0){
            if(cantidad != ""){
              crearGrafico('canvaInf', "bar", 'php/informespormes.php?nmes='+cantidad, [], {
                label: "Informes"
            });

            } else {
              crearGrafico('canvaInf', "bar", 'php/informespormes.php', [], {
                label: "Informes"
            }, {
              primermes: rangofecha1,
              segundomes: rangofecha2,
            });
            }
            document.querySelector('.filtradoGInf').style.fill = "blue";
          } else {
            document.querySelector('.filtradoGInf').style.fill = "transparent";
          }

      }
  })
}

function filtradoTablaAlumnos() {
  Swal.fire({
    title: "Filtros avanzados",
    showCancelButton: true,
    confirmButtonText: "Aceptar",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    html: `
    <h3>Edad:</h3>
    <div class="filtros-alumnos-div">
      <span>Min: <input type="number" min=0 id="minimo-edad-filtro"> Max: <input type="number" min=0 id="maximo-edad-filtro"></span>
    </div>
    <h3>Patologia:</h3>
    <div class="filtros-alumnos-div">
      <select id="select-patologias-filtro" style="width: 100%"></select>
    </div>
    `,
    didOpen: () => {
      $('#select-patologias-filtro').select2({
        placeholder: 'Selecciona una patologia', 
        minimumInputLength: 0,
        ajax: {
          url: 'php/obtenerpatologias.php', 
          dataType: 'json',
          delay: 250,
          method: "POST",  
          data: function (params) {
            return {
              q: params.term || ''
            };
          },
          processResults: function (data) {
            return {
              results: data.map(function (patologia) {
                return { id: patologia.ID_Patologia, text: patologia.Nombre };
              })
            };
          },
          cache: true
        }
      });
    }
  }).then((resultado) => {
    if (resultado.isConfirmed) {
      let patologia = "";
      let valEdadMin = "";
      let valEdadMax = "";
      let filtros = 0;
      const valorPat = document.getElementById('select-patologias-filtro').value;
      const valorEdadMin = document.getElementById('minimo-edad-filtro').value;
      const valorEdadMax = document.getElementById('maximo-edad-filtro').value;
      if(valorPat){
        patologia = valorPat;
        filtros++;
      }
      if(valorEdadMin){
        valEdadMin = valorEdadMin;
        filtros++;
      }
      if(valorEdadMax){
        valEdadMax = valorEdadMax;
        filtros++;
      }
      if(filtros > 0){
        tablas['tablaalu'] = iniciarTabla('tabla-alumnos-gestion', 'php/alumnos.php', columnastablaAlumnos(), "50vh", false, {
          filtrado: true,
          patologia: patologia,
          valemax: valEdadMax,
          valemin: valEdadMin
        });
      }
    }
  });
}
let cantidadfiltroDocAlu = 2;
function filtradoGraficoDocAlu(){
  Swal.fire({
    title: "Filtro",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        html: `
        <span>Agrupar en otros: </span>
        <br>
        <span>Docentes con menos de <input type='number' id='filtroGDOCALU' min=0 placeholder=`+cantidadfiltroDocAlu+`> alumnos</span>
              `
  }).then((resultado) => {
    if(resultado.isConfirmed){
      let cantidad = "";
      let filtros = 0;
      const valorCantidad = document.getElementById('filtroGDOCALU').value;
      if(valorCantidad){
        cantidad = valorCantidad;
        filtros++;
      }

      if(filtros > 0){
        crearGrafico("canvaDocAlu", "pie", "php/alumnosdocentegrafico.php", [], {
          leyenda: false,
          label: "Alumnos"
        }, {
          filtro: cantidad
        })
      
        cantidadfiltroDocAlu = cantidad;
        if(cantidadfiltroDocAlu != 2){
          document.querySelector('.filtradoGDocAlu').style.fill = "blue";
        } else {
          document.querySelector('.filtradoGDocAlu').style.fill = "transparent";
        }
      }
    }
  })
}
let cantidadfiltroDocCla = '-';
function filtradoGraficoDocCla(){
  Swal.fire({
    title: "Filtro",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        html: `
        <span>Agrupar en otros: </span>
        <br>
        <span>Docentes con menos de <input type='number' id='filtroGDOCCLA' min=0 placeholder=`+cantidadfiltroDocCla+`> clases</span>
              `
  }).then((resultado) => {
    if(resultado.isConfirmed){
      let cantidad = "";
      let filtros = 0;
      const valorCantidad = document.getElementById('filtroGDOCCLA').value;
      if(valorCantidad){
        cantidad = valorCantidad;
        filtros++;
      }

      if(filtros > 0){
        crearGrafico("canvaDocCla", "pie", "php/docentesclasegrafico.php", [], {
          leyenda: false,
          label: "Clases"
        }, {
          filtro: cantidad
        })
        
        cantidadfiltroDocCla = cantidad;
        if(cantidadfiltroDocCla != '-'){
          document.querySelector('.filtradoGDocCla').style.fill = "blue";
        }
      }
    }
  })
}
let cantidadfiltroDocInf = '-';
function filtradoGraficoDocInf(){
  Swal.fire({
    title: "Filtro",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        html: `
        <span>Agrupar en otros: </span>
        <br>
        <span>Docentes con menos de <input type='number' id='filtroGDOCINF' min=0 placeholder=`+cantidadfiltroDocInf+`> informes</span>
              `
  }).then((resultado) => {
    if(resultado.isConfirmed){
      let cantidad = "";
      let filtros = 0;
      const valorCantidad = document.getElementById('filtroGDOCINF').value;
      if(valorCantidad){
        cantidad = valorCantidad;
        filtros++;
      }

      if(filtros > 0){
        crearGrafico("canvaDocInf", "pie", "php/informesdocentegrafico.php", [], {
          leyenda: false,
          label: "Informes"
        }, {
          filtro: cantidad
        })
      
        cantidadfiltroDocInf = cantidad;
        if(cantidadfiltroDocInf != '-'){
          document.querySelector('.filtradoGDocInf').style.fill = "blue";
        }
      }
    }
  })
}
let cantidadfiltroOcu = '-';
function filtroGraficoOcu(){
  Swal.fire({
    title: "Filtro",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        html: `
        <span>Agrupar en otros: </span>
        <br>
        <span>Ocupaciones con menos de <input type='number' id='filtroGOcu' min=0 placeholder=`+cantidadfiltroOcu+`> personas</span>
              `
  }).then((resultado) => {
    if(resultado.isConfirmed){
      let cantidad = "";
      let filtros = 0;
      const valorCantidad = document.getElementById('filtroGOcu').value;
      if(valorCantidad){
        cantidad = valorCantidad;
        filtros++;
      }

      if(filtros > 0){
        crearGrafico("canvaEmpleados", "pie", "php/ocupacionesgrafico.php", [], {
          leyenda: false,
          label: "Personas"
        }, {
          filtro: cantidad
        })
      
        cantidadfiltroOcu = cantidad;
        if(cantidadfiltroOcu != '-'){
          document.querySelector('.filtradoGOcu').style.fill = "blue";
        }
      }
    }
  })
}