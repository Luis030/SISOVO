window.addEventListener('DOMContentLoaded', (event) => {
    const cedulaIngresada = document.getElementById('cedulaIngresada');
    const entradaCheckbox = document.getElementById('entrada');
    const salidaCheckbox = document.getElementById('salida');
    const botonGuardar = document.getElementById('btn');

    entradaCheckbox.addEventListener('change', function() {
        if (this.checked) {
            salidaCheckbox.checked = false;
        }
    });

    salidaCheckbox.addEventListener('change', function() {
        if (this.checked) {
            entradaCheckbox.checked = false;
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'e' || event.key === 'E') {
            entradaCheckbox.checked = true;
            salidaCheckbox.checked = false;
        }
        if (event.key === 's' || event.key === 'S') {
            salidaCheckbox.checked = true;
            entradaCheckbox.checked = false;
        }
        if (event.key === 'Enter') {
            botonGuardar.click();
        }
    });

    botonGuardar.addEventListener('click', function() {
        guardarCedula();
    });

    function guardarCedula() {
        let tipo = "";
        const cedula = cedulaIngresada.value;
        const entrada = entradaCheckbox.checked;
        const salida = salidaCheckbox.checked;
        if (entrada == true) {
            tipo = "Entrada";
        }
        if (salida == true) {
            tipo = "Salida";
        }
        if (tipo == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes elegir entrada o salida.",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            })
        } else {
            fetch("php/asistenciadocente.php?cedula=" + cedula + "&&tipo=" + tipo)
            .then(datos => datos.json())
            .then(datos => {    
                if (datos.mensaje == "si") {
                    Swal.fire({
                        title: "Correcto!",
                        text: "Asistencia ingresada correctamente.",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
                if (datos.mensaje == "no") {
                    Swal.fire({
                        title: "Error!",
                        text: "Ingrese una cédula válida",
                        icon: "warning",
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            })

        }
    }    
});
