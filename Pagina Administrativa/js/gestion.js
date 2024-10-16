window.addEventListener('DOMContentLoaded', function() {
    const inicio = document.getElementById('inicio');
    const docentes = document.getElementById('docentes');
    const alumnos = document.getElementById('alumnos');
    const informes = document.getElementById('informes');
    const elementos = document.getElementById('elementos');

    cantidadAlumnos = document.getElementById('cantAlumnos');
    cantidadDocente = document.getElementById('cantDocentes');
    cantidadClases = document.getElementById('cantClases');
    
    const divGestion = document.getElementById('gestionContent');

    inicio.addEventListener('click', function() {
        cambiarSeccion('inicio');
    });
    docentes.addEventListener('click', function() {
        cambiarSeccion('docentes');
    });
    alumnos.addEventListener('click', function() {
        cambiarSeccion('alumnos');
    });
    informes.addEventListener('click', function() {
        cambiarSeccion('informes');
    });
    elementos.addEventListener('click', function() {
        cambiarSeccion('elementos');
    });

    fetch("php/traercantidades.php")
        .then(datos => datos.json())
        .then(datos => {
            cantidadAlumnos.innerHTML = datos.cantA;
            cantidadDocente.innerHTML = datos.cantD;
            cantidadClases.innerHTML = datos.cantC;
        })

    function cambiarSeccion(seccion) {
        divGestion.innerHTML = "";
        switch (seccion) {
            case 'inicio':
                let div1 = document.createElement('div');
                let div2 = document.createElement('div');
                let div3 = document.createElement('div');
                let div4 = document.createElement('div');
                let div5 = document.createElement('div');
                let div6 = document.createElement('div');
                let p1 = document.createElement('p');
                let p2 = document.createElement('p');
                let p3 = document.createElement('p');
                let p4 = document.createElement('p');
                let p5 = document.createElement('p');
                let p6 = document.createElement('p');
                let n1 = document.createElement('span');
                let n2 = document.createElement('span');
                let n3 = document.createElement('span');
                let divCanvas1 = document.createElement('div');
                let divCanvas2 = document.createElement('div');
                let divCanvas3 = document.createElement('div');
                let canvas1 = document.createElement('canvas');
                let canvas2 = document.createElement('canvas');
                let canvas3 = document.createElement('canvas');

                p1.innerText = "Alumnos totales";
                p2.innerText = "Docentes totales";
                p3.innerText = "Clases totales";
                p4.innerText = "Informes realizados";
                p5.innerText = "Patologías";
                p6.innerText = "Especialistas";

                fetch("php/traercantidades.php")
                .then(datos => datos.json())
                .then(datos => {
                    n1.innerText = datos.cantA;
                    n2.innerText = datos.cantD;
                    n3.innerText = datos.cantC;
                })

                canvas1.id = "canvaInf";
                canvas2.id = "canvaPat";
                canvas3.id = "canvaEsp";

                divCanvas1.appendChild(canvas1);
                divCanvas2.appendChild(canvas2);
                divCanvas3.appendChild(canvas3);

                div1.appendChild(p1);
                div1.appendChild(n1);

                div2.appendChild(p2);
                div2.appendChild(n2);

                div3.appendChild(p3);
                div3.appendChild(n3);

                div4.appendChild(p4);
                div4.appendChild(divCanvas1);

                div5.appendChild(p5);
                div5.appendChild(divCanvas2);

                div6.appendChild(p6);
                div6.appendChild(divCanvas3);

                divGestion.appendChild(div1);
                divGestion.appendChild(div2);
                divGestion.appendChild(div3);
                divGestion.appendChild(div4);
                divGestion.appendChild(div5);
                divGestion.appendChild(div6);

                break;
            case 'docentes':

                break;
            case 'alumnos':

                break;
            case 'informes':

                break;
            case 'elementos':
                
                break;
        }
    }
})

