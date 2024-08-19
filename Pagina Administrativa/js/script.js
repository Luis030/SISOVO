window.onload = function (){
    const patologiasSelect = document.getElementById("patologias-select");
    const abrirabout = document.getElementById('aboutus');
    const overlay = document.getElementById('overlay');
    const cerrarabout = document.getElementById('cerrarabout');
    const logoespañol = document.getElementById('logo-español');
    const logoingles = document.getElementById('logo-ingles');
    const parrafoabout = document.getElementById('parrafo-aboutus');

    logoespañol.addEventListener('click', () => {
        parrafoabout.textContent = "Somos estudiante de informatica de tercer año de UTU, y esta aplicación fue desarrollada por motivo de nuestro proyecto de fin de año";
        logoespañol.style.border = "3px solid blue";
        logoingles.style.border = "3px solid black";
    })
    logoingles.addEventListener('click', () => {
        parrafoabout.textContent = "We are third-year computer science students at UTU, and this application was developed for our end-of-year project.";
        logoingles.style.border = "3px solid blue";
        logoespañol.style.border = "3px solid black";
    })
    abrirabout.addEventListener('click', function() {
      overlay.style.display = 'block';
      document.body.style.overflow = 'hidden';
    });
  
    cerrarabout.addEventListener('click', function() {
      overlay.style.display = 'none';
      document.body.style.overflow = 'auto';
    });


    
    function obtenerPatologias(){
        if(patologiasSelect){
            fetch("php/obtenerpatologias.php")
            .then(respuesta => respuesta.json())
            .then(patologias => {
                console.log(patologias);
                patologiasSelect.innerHTML = '';
                patologias.forEach(patologia => {
                    const opcion = document.createElement('option');
                    opcion.value = patologia.ID_Patologia;
                    opcion.textContent = patologia.Nombre;
                    patologiasSelect.appendChild(opcion);
                });
            })
            .catch(error => console.error("Error al obtener patologias", error))
            
        }
    }

    if(patologiasSelect){
        obtenerPatologias();
    }
    
}




function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    sidebar.style.display = sidebar.style.display === "block" ? "none" : "block";
}

function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdown-menu");
    dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
}

function updateTime() {
    const indexhour = document.getElementById('horaactual');
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const timeString = `${hours}:${minutes}:${seconds}`;
    
    document.getElementById('time').textContent = timeString; // Actualiza la hora en el header
    if(indexhour){
        document.getElementById('horaactual').textContent = timeString; // Actualiza la hora en el index.php
    }
    

    const dateString = now.toLocaleDateString('es-ES', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    if(indexhour){
        document.getElementById('date').textContent = dateString;
    }
    
}

setInterval(updateTime, 1000);
updateTime();
