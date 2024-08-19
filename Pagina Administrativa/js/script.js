window.onload = function (){
    const patologiasSelect = document.getElementById("patologias-select");


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