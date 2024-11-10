window.onload = function() {
    function formatearFecha(fechaSQL) {
        const fecha = new Date(fechaSQL);
        const dia = fecha.getDate() + 1;
        const mes = fecha.getMonth() + 1;
        const año = fecha.getFullYear();
        const diaBien = dia < 10 ? '0' + dia : dia;
        const mesBien = mes < 10 ? '0' + mes : mes;
        return diaBien + "/" + mesBien + "/" + año;
    } 
    function obtenerClases() {
        fetch("php/infouser.php")
        .then(respuesta => respuesta.json())
        .then(info => {
            console.log(info);
            const clasesDiv = document.getElementById('clasesAsignadas');
            clasesDiv.innerHTML = '';
            if (info.length > 0) {
                const usuario = info[0];
                if(usuario.ID_Alumno) {
                    fetch("php/obtenerclases.php?id=" + usuario.ID_Alumno)
                    .then(response => response.json())
                    .then(info => {
                        info.forEach(dato => {
                            const p = document.createElement('p');
                            p.textContent = "Clase: "+dato.Nombre+", Horario: "+dato.Horario;
                            clasesDiv.appendChild(p);
                        });
                    })
                } else {
                    console.log("ladron")
                }
            }
        })
    }
    function obtenerInformes() {
        fetch("php/infouser.php")
        .then(respuesta => respuesta.json())
        .then(info => {
            console.log(info);
            const listaInformes = document.getElementById('listaInformes');
            listaInformes.innerHTML = '';
            if (info.length > 0) {
                const usuario = info[0];
                if(usuario.ID_Alumno) {
                    fetch("php/obtenerinformes.php?id=" + usuario.ID_Alumno)
                    .then(response => response.json())
                    .then(info => {
                        info.forEach(dato => {
                            const li = document.createElement('li');
                            li.classList.add("resultadoInforme");
                            const a = document.createElement('a');
                            a.classList.add("linkInforme");
                            a.textContent = dato.Titulo + " " + "(" + formatearFecha(dato.Fecha) + ")";
                            a.onclick = function() {
                                localStorage.setItem('informeSeleccionado', JSON.stringify(dato));
                                window.open('fpdf/informe.php?ID=' + dato.ID_Informe, '_blank');
                            };
                            li.appendChild(a);
                            listaInformes.appendChild(li);
                        }); 
                        filtrarInformes();
                    })
                }
            }
        })
    }
    function filtrarInformes() {
        const busquedaInput = document.getElementById('busquedaInformeAlumno');
        const listaInformes = document.getElementById('listaInformes');
        const items = listaInformes.getElementsByTagName('li');

        busquedaInput.addEventListener('input', function () {
            const textoFiltro = busquedaInput.value.toLowerCase();

            for (let i = 0; i < items.length; i++) {
                const item = items[i];
                const textoItem = item.textContent || item.innerText;

                if (textoItem.toLowerCase().indexOf(textoFiltro) > -1) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            }
        });
    }

    obtenerClases();
    obtenerInformes(); 
}