document.addEventListener('DOMContentLoaded', function(){
    const elementos = document.querySelectorAll('.añadir-a');
    const currentUrl = decodeURIComponent(window.location.pathname.split('/').pop());


    elementos.forEach(link => {
        let enlace = link.getAttribute('href').split('/').pop();
        console.log(currentUrl)
        console.log(enlace)
        if(enlace === currentUrl){
            link.classList.add('enlace-activo');
        }
    })
})