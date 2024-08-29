window.onload = () => {
    const esp = document.getElementById('banderaUY');
    const ing = document.getElementById('banderaUS');

    document.getElementById('botonIdiomaIngles').addEventListener('click', function() {
        document.querySelector('h2').textContent = 'About us';
        document.getElementById('infotext').innerHTML = 'We are third-year IT students at Escuela Superior Catalina Harriague de Castaños (UTU).<br> We focus on web design and development using HTML structure and programming languages<br> such as PHP, JavaScript, among others.';
        ing.style.border = "3px solid blue";
        esp.style.border = "3px solid black";
    });

    document.getElementById('botonIdiomaEspañol').addEventListener('click', function() {
        document.querySelector('h2').textContent = 'Sobre nosotros';
        document.getElementById('infotext').innerHTML = 'Somos estudiantes de 3ero de informática de la Escuela Superior Catalina Harriague de Castaños(UTU),<br> nos centramos en el diseño y desarrollo de páginas web, usando estructura HTML y lenguajes de programación<br>tales como PHP, JavaScript, entre otros.';
        esp.style.border = "3px solid blue";
        ing.style.border = "3px solid black";
    });
}
