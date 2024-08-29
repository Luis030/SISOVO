function toggleMenu(){
    const menu = document.querySelector('.menuUser');
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
}

document.addEventListener('click', function(event) {
    const menu = document.querySelector('.menuUser');
    const menuBtn = document.querySelector('#botonUser');

    if (!menu.contains(event.target) && !menuBtn.contains(event.target)) {
        menu.style.display = 'none';
    }
});
    

window.onscroll = function() {
    var menu = document.getElementById('menu');
    var header = document.getElementById('main-header');
    var menuUser = document.querySelector('.menuUser');
    if (window.pageYOffset > 100) {
        header.classList.add('small');
        menu.classList.add('bajado');
        menuUser.classList.add('menuBajado');
    } else {
        header.classList.remove('small');
        menu.classList.remove('bajado');
        menuUser.classList.remove('menuBajado');
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