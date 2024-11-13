let graficos = {};
window.addEventListener('DOMContentLoaded', () => {
    if(document.querySelector('#canvaInf')){
        crearGrafico('canvaInf', "bar", 'php/informespormes.php', [], {
            label: "Informes"
        });
    }
    if(document.querySelector('#canvaPat')){
        crearGrafico("canvaPat", "pie", "php/patologiasgrafico.php", [], {
            leyenda: false,
            label: "Alumnos"
        })  
    }
    if(document.querySelector('#canvaEsp')){
        crearGrafico("canvaEsp", "pie", "php/especialidadesgrafico.php", [], {
            leyenda: false,
            label: "Docentes"
        })
    }

    if(document.querySelector('#canvaPatElementos')){
        crearGrafico("canvaPatElementos", "pie", "php/patologiasgrafico.php", [], {
            leyenda: false,
            label: "Alumnos"
        })
    }

    if(document.querySelector('#canvaEmpleados')){
        crearGrafico("canvaEmpleados", "pie", "php/ocupacionesgrafico.php", [], {
            leyenda: false,
            label: "Personas"
        })
    }

    if(document.querySelector('#canvaDocAlu')){
        crearGrafico("canvaDocAlu", "pie", "php/alumnosdocentegrafico.php", [], {
            leyenda: false,
            label: "Alumnos"
        })
    }

    if(document.querySelector('#canvaDocCla')){
        crearGrafico("canvaDocCla", "pie", "php/docentesclasegrafico.php", [], {
            leyenda: false,
            label: "Clases"
        })
    }

    if(document.querySelector('#canvaDocInf')){
        crearGrafico("canvaDocInf", "pie", "php/informesdocentegrafico.php", [], {
            leyenda: false,
            label: "Informes"
        })
    }
})

function crearGrafico(elementoID, tipoGrafico, urlDatos, etiquetasExtras = [], opcionesExtras = {}, param = {}) {
    $.ajax({
        url: urlDatos,
        method: "POST",
        dataType: "json",
        data: param,
        success: function (data) {
            const etiquetas = data.etiquetas || [];
            const valores = data.valores || [];
            const canvas = document.getElementById(elementoID).getContext('2d');
            if (graficos[elementoID]) {
                graficos[elementoID].destroy();
            }
            const grafico = new Chart(canvas, {
                type: tipoGrafico, 
                data: {
                    labels: [...etiquetas, ...etiquetasExtras], 
                    datasets: [{
                        label: opcionesExtras.label || 'Datos',
                        data: valores,   
                        borderWidth: opcionesExtras.borderWidth || 1
                    }]
                },
                options: {
                    ...opcionesExtras.options,
                    plugins: {
                        legend: {
                            display: opcionesExtras.leyenda || false 
                        }
                    }
                }
            });
            graficos[elementoID] = grafico;
        },
        error: function (error) {
            console.error("Error obteniendo los datos: ", error);
        }
    });
}