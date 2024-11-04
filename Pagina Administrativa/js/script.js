window.onload = function (){
    const inputs = document.querySelectorAll('input');

    inputs.forEach(function(input) {
        input.setAttribute('autocomplete', 'off');
    });

    const especialidadesSelect = document.getElementById('especialidades-select');
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
    
    let url = decodeURIComponent(window.location.href);
    let pagina = url.split('?')[0].split('/').pop();

    console.log(pagina)
    switch(pagina){
        case 'listadocente.php':
            document.getElementById('lista-docente-li').classList.add('enlace-activo-sidebar');
            break;
        case 'clases.php':
            document.getElementById('clases-li').classList.add('enlace-activo-sidebar');
            break;
        case 'index.php':
            document.getElementById('inicio-li').classList.add('enlace-activo-sidebar');
            break;
        case 'gestion.php':
            document.getElementById('gestion-li').classList.add('enlace-activo-sidebar');
            break;
        case 'añadiralumno.php':
            document.getElementById('agregar-a').classList.add('enlace-activo-a');
            document.getElementById('agregar-alumno-a').classList.add('enlace-activo');
            break;
        case 'añadirdocente.php':
            document.getElementById('agregar-a').classList.add('enlace-activo-a');
            document.getElementById('agregar-docente-a').classList.add('enlace-activo');
            break;
        case 'añadirtodo.php':
            document.getElementById('agregar-a').classList.add('enlace-activo-a');
            break;
        case 'añadirclase.php':
            document.getElementById('agregar-a').classList.add('enlace-activo-a');
            break;
    }

}

function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    sidebar.style.display = sidebar.style.display === "block" ? "none" : "block";
}

function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdown-menu");
    dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
    if(dropdownMenu.style.display == "block"){
        document.getElementById('agregar-a').classList.add('enlace-activo-a')
    } else {
        document.getElementById('agregar-a').classList.remove('enlace-activo-a')
    }
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
