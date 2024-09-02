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
            }
        })
    }

    establecerInformacion();
}

