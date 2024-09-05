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
    
