const imagenes = [
    'Diseño/IMG/galeria1.jpg',
    'Diseño/IMG/galeria2.jpg',
    'Diseño/IMG/galeria3.jpg',
    'Diseño/IMG/galeria4.jpg',
    'Diseño/IMG/galeria5.jpg'
];
let indice = 0;


function esCelular() {
    return window.innerWidth <= 768; 
}

function actualizarImagenes() {
    const galeria = document.querySelector('.galeria');
    const galeriaImg = document.querySelectorAll('.galeria-imagen');
    const flechaizq = document.querySelector('.flecha-izq');
    const flechader = document.querySelector('.flecha-der');

    const desplazamiento = esCelular() ? 100 : 33.3; 

    galeria.style.transform = `translateX(-${indice * desplazamiento}%)`;

    galeriaImg.forEach((img, index) => {
        if (esCelular()) {
            if (index === indice) {
                img.classList.remove('borroso');
            } else {
                img.classList.add('borroso');
            }
        } else {
            if (index === indice || index === indice + 1 || index === indice + 2) {
                img.classList.remove('borroso');
            } else {
                img.classList.add('borroso');
            }
        }
    });

    if (indice === 0) {
        flechaizq.classList.add('disabled');
    } else {
        flechaizq.classList.remove('disabled');
    }

    if (esCelular()) {
        if (indice === imagenes.length - 1) {
            flechader.classList.add('disabled');
        } else {
            flechader.classList.remove('disabled');
        }
    } else {
        if (indice === imagenes.length - 3) {
            flechader.classList.add('disabled');
        } else {
            flechader.classList.remove('disabled');
        }
    }
}

window.addEventListener('resize', actualizarImagenes);

window.onload = function() {

    const galeria = document.querySelector('.galeria');
    galeria.innerHTML = imagenes.map((src) => 
        `<img src="${src}" class="galeria-imagen">`
    ).join('');


    document.querySelector('.flecha-izq').addEventListener('click', slideIzq);
    document.querySelector('.flecha-der').addEventListener('click', slideDer);

    actualizarImagenes();
};

function slideIzq() {
    if (indice > 0) {
        indice--;
        actualizarImagenes();
    }
}

function slideDer() {
    if (esCelular()) {
        if (indice < imagenes.length - 1) {
            indice++;
            actualizarImagenes();
        }
    } else {
        if (indice < imagenes.length - 3) {
            indice++;
            actualizarImagenes();
        }
    }
}
