window.onscroll = function() {
    var menu = document.getElementById('menu');
    var header = document.getElementById('main-header');
    if (window.pageYOffset > 100) {
        header.classList.add('small');
        menu.classList.add('bajado');
    } else {
        header.classList.remove('small');
        menu.classList.remove('bajado');
    }
};

// Funcionalidad para el menú desplegable
document.getElementById('menu-toggle').onclick = function() {
    var menu = document.getElementById('menu');
    if (menu.classList.contains('active')) {
        menu.classList.remove('active');
    } else {
        menu.classList.add('active');
    }
};