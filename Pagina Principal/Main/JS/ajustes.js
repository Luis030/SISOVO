window.onload = function(){
    function establecerInformacion(){
        fetch("php/infouser.php")
        .then(respuesta => respuesta.json())
        .then(info => {
            console.log(info);
            const resultadoDiv = document.getElementById('datosdiv');
            resultadoDiv.innerHTML = '';
            if(info.length > 0){
                const usuario = info[0];
                if (usuario.Nombre) {
                    const nombreP = document.createElement('p');
                    nombreP.textContent = "Nombre: " + usuario.Nombre;
                    resultadoDiv.appendChild(nombreP);
                }
    
                if (usuario.Apellido) {
                    const apellidoP = document.createElement('p');
                    apellidoP.textContent = "Apellido: " + usuario.Apellido;
                    resultadoDiv.appendChild(apellidoP);
                }
    
                if (usuario.Cedula) {
                    const cedulaP = document.createElement('p');
                    cedulaP.textContent = "Cédula: " + usuario.Cedula;
                    resultadoDiv.appendChild(cedulaP);
                }
    
                if (usuario.Fecha_Nac) {
                    const fechaNacP = document.createElement('p');
                    fechaNacP.textContent = "Fecha de Nacimiento: " + usuario.Fecha_Nac;
                    resultadoDiv.appendChild(fechaNacP);
                }
                
                if(usuario.Mail_Padres){
                    const mail = document.createElement('p');
                    mail.textContent = "Correo : " + usuario.Mail_Padres;
                    resultadoDiv.appendChild(mail);
                }

                if(usuario.Mail){
                    const mail = document.createElement('p');
                    mail.textContent = "Correo : " + usuario.Mail;
                    resultadoDiv.appendChild(mail);
                }
                
                if(usuario.ID_Alumno) {
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
                if(usuario.ID_Docente){
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
                
            }
        })
    }


    establecerInformacion();
}

