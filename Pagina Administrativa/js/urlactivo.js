function actualizarClasePorHref(claseElemento, claseActiva) {
    document.addEventListener('DOMContentLoaded', function() {
        const elementos = document.querySelectorAll(`.${claseElemento}`);
        const currentUrl = decodeURIComponent(window.location.pathname.split('/').pop());

        elementos.forEach(link => {
            let enlace = link.getAttribute('href').split('/').pop();
            if(enlace === currentUrl){
                link.classList.add(claseActiva);
            }
        });
    });
}



