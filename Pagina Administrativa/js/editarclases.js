document.getElementById('hora').addEventListener('change', function() {
    const hora = this.value;
    const horas = parseInt(hora.split(':')[0], 10);
    const minutos = parseInt(hora.split(':')[1], 10);
    
    // Validar si la hora está fuera de los rangos permitidos
    if ((horas < 8 || (horas >= 12 && horas < 14) || horas >= 18) || (horas === 12 && minutos > 0) || (horas === 18 && minutos > 0)) {
      document.getElementById('errorMsg').style.display = 'block';
      this.value = ''; // Limpiar el valor
    } else {
      document.getElementById('errorMsg').style.display = 'none';
    }
  });

function mostrarEditarNombre() { 
    const divNombre = document.getElementById('editandoNombre');
    if (divNombre.style.display === "none") {
        divNombre.style.display = "flex"; 
    } else {
        divNombre.style.display = "none";
    }
}

function mostrarEditarDia() { 
    const divDia = document.getElementById('editandoDia');
    if (divDia.style.display === "none") {
        divDia.style.display = "flex"; 
    } else {
        divDia.style.display = "none";
    }
}

function mostrarEditarInicio() { 
    const divInicio = document.getElementById('editandoInicio');
    if (divInicio.style.display === "none") {
        divInicio.style.display = "flex"; 
    } else {
        divInicio.style.display = "none";
    }
}

function mostrarEditarFinal() { 
    const divFinal = document.getElementById('editandoFinal');
    if (divFinal.style.display === "none") {
        divFinal.style.display = "flex"; 
    } else {
        divFinal.style.display = "none";
    }
}

function mostrarEditarDocente() { 
    const divDocente = document.getElementById('editandoDocente');
    if (divDocente.style.display === "none") {
        divDocente.style.display = "flex"; 
    } else {
        divDocente.style.display = "none";
    }
}

