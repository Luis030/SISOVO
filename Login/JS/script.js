function mostrarContra() {
    const contraseñaInput = document.getElementById("contra");
    const ojo = document.querySelector(".mostrarContra");
    if (contraseñaInput.type === "password") {
        contraseñaInput.type = "text";
        ojo.src = "Diseño/nover.svg";
    } else {
        contraseñaInput.type = "password";
        ojo.src = "Diseño/ver.svg";
    }
}

function mostrarContraNueva() {
    const contraseñaInput = document.getElementById("pass");
    const ojo2 = document.getElementById("ojo1");
    if (contraseñaInput.type === "password") {
        contraseñaInput.type = "text";
        ojo2.src = "Diseño/nover.svg";
    } else {
        contraseñaInput.type = "password";
        ojo2.src = "Diseño/ver.svg";
    }
}

function mostrarContraNueva2() {
    const contraseñaInput = document.getElementById("passnueva");
    const ojo3 = document.getElementById("ojo2");
    if (contraseñaInput.type === "password") {
        contraseñaInput.type = "text";
        ojo3.src = "Diseño/nover.svg";
    } else {
        contraseñaInput.type = "password";
        ojo3.src = "Diseño/ver.svg";
    }
}