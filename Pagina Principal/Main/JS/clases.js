window.onload = function() {
    function obtenerClases() {
        fetch("PHP/infouser.php")
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
                            p.textContent = "Clase: "+dato.Nombre+", Día: "+dato.Dia+", Horario: "+dato.Inicio+"-"+dato.Final;
                            clasesDiv.appendChild(p);
                        });
                    })
                }
            }
        })
    }   
    obtenerClases();
}
