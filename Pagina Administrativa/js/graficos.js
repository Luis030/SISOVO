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
            const coloresPredeterminados = [
                '#34495E',
                '#36A2EB',
                '#FFCE56',
                '#4BC0C0',
                '#9966FF',
                '#FF9F40',
                '#E7E9ED',
                '#FF5733',
                '#33FF57',
                '#3357FF',
                '#F1C40F',
                '#9B59B6',
                '#1ABC9C',
                '#2ECC71',
                '#E74C3C',
                '#3498DB',
                '#8E44AD',
                '#2C3E50',
                '#F39C12',
                '#D35400',
                '#C0392B',
                '#2980B9',
                '#16A085',
                '#F4D03F',
                '#7D3C98',
                '#1F618D',
                '#D5DBDB',
                '#E67E22',
                '#F5B041',
                '#9C88FF',
                '#F1948A',
                '#D2B4DE'
            ];
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
                        backgroundColor: coloresPredeterminados,  
                        borderColor: coloresPredeterminados,  
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