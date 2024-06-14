window.onload = () => {
    
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
      
}