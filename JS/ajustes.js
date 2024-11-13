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

    function establecerInformacion(){
        fetch("php/infouser.php")
        .then(respuesta => respuesta.json())
        .then(info => {
            const resultadoDiv = document.getElementById('datosdiv');
            resultadoDiv.innerHTML = '';
            if(info.length > 0){
                const usuario = info[0];
                if (usuario.Nombre) {
                    const nombreP = document.createElement('p');
                    nombreP.style.fontWeight = "bold";
                    const spanNombre = document.createElement('span');
                    spanNombre.style.fontWeight = "normal";
                    spanNombre.textContent = usuario.Nombre;
                    nombreP.textContent = "Nombre: ";
                    nombreP.appendChild(spanNombre);
                    resultadoDiv.appendChild(nombreP);
                }
    
                if (usuario.Apellido) {
                    const apellidoP = document.createElement('p');
                    apellidoP.style.fontWeight = "bold";
                    const spanApellido = document.createElement('span');
                    spanApellido.style.fontWeight = "normal";
                    spanApellido.textContent = usuario.Apellido;
                    apellidoP.textContent = "Apellido: ";
                    apellidoP.appendChild(spanApellido);
                    resultadoDiv.appendChild(apellidoP);
                }
    
                if (usuario.Cedula) {
                    const cedulaP = document.createElement('p');
                    cedulaP.style.fontWeight = "bold";
                    const spanCedula = document.createElement('span');
                    spanCedula.style.fontWeight = "normal";
                    spanCedula.textContent = usuario.Cedula;
                    cedulaP.textContent = "Cédula: ";
                    cedulaP.appendChild(spanCedula);
                    resultadoDiv.appendChild(cedulaP);
                }
    
                if (usuario.Fecha_Nac) {
                    const fechaP = document.createElement('p');
                    fechaP.style.fontWeight = "bold";
                    const spanFecha = document.createElement('span');
                    spanFecha.style.fontWeight = "normal";
                    spanFecha.textContent = formatearFecha(usuario.Fecha_Nac);
                    fechaP.textContent = "Fecha de nacimiento: ";
                    fechaP.appendChild(spanFecha);
                    resultadoDiv.appendChild(fechaP);
                }
                
                if (usuario.Mail_Padres) {
                    const mailP = document.createElement('p');
                    mailP.style.fontWeight = "bold";
                    const spanMail = document.createElement('span');
                    spanMail.style.fontWeight = "normal";
                    spanMail.textContent = usuario.Mail_Padres;
                    mailP.textContent = "Correo: ";
                    mailP.appendChild(spanMail);
                    resultadoDiv.appendChild(mailP);
                }

                if (usuario.Mail) {
                    const mailP = document.createElement('p');
                    mailP.style.fontWeight = "bold";
                    const spanMail = document.createElement('span');
                    spanMail.style.fontWeight = "normal";
                    spanMail.textContent = usuario.Mail;
                    mailP.textContent = "Correo: ";
                    mailP.appendChild(spanMail);
                    resultadoDiv.appendChild(mailP);
                }
                
                if (usuario.ID_Alumno) {
                    fetch("php/obtenerdatos.php?tipo=alumno&id=" + usuario.ID_Alumno)
                    .then(response => response.json())
                    .then(info => {
                        const lista = document.getElementById('lista');
                        lista.innerHTML = '';
                        info.forEach(dato => {
                            const li = document.createElement('li');
                            li.textContent = dato.Nombre;
                            lista.appendChild(li);
                        });
                    })
                    .catch(error => console.error("Error:", error));
                }

                if (usuario.ID_Docente) {
                    fetch("php/obtenerdatos.php?tipo=docente&id=" + usuario.ID_Docente)
                    .then(response => response.json())
                    .then(info => {
                        const lista = document.getElementById('lista');
                        lista.innerHTML = '';
                        info.forEach(dato => {
                            const li = document.createElement('li');
                            li.textContent = dato.Nombre;
                            lista.appendChild(li);
                        });
                    })
                    .catch(error => console.error("Error:", error));
                }

                if (usuario.Tipo == "admin") {
                    const cartel = document.createElement('h2');
                    cartel.style.textAlign = "center"; 
                    cartel.style.fontWeight = "normal";
                    cartel.textContent = "Usuario administrador.";
                    resultadoDiv.appendChild(cartel);
                }
                
            }
        })
    }

    establecerInformacion();
}

