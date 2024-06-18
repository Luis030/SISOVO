window.onload = () => {
        
        const abrirabout = document.getElementById('aboutus');
        const overlay = document.getElementById('overlay');
        const cerrarabout = document.getElementById('cerrarabout');
        const logoespañol = document.getElementById('logo-español');
        const logoingles = document.getElementById('logo-ingles');
        const parrafoabout = document.getElementById('parrafo-aboutus');
      
        function horaActual() {
            var fechaHoraLocal = new Date(); 
            var hora = fechaHoraLocal.getHours(); 
            var minutos = fechaHoraLocal.getMinutes(); 
        
            
            hora = hora < 10 ? '0' + hora : hora;
            minutos = minutos < 10 ? '0' + minutos : minutos;
        
            var horaYMinutos = hora + ':' + minutos;
            document.querySelector('.horaactual').textContent = horaYMinutos;
        }
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
        horaActual();
        setInterval(horaActual, 1000);
      
}