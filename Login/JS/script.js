function mostrarContra() {
    const contraseñaInput = document.getElementById("contra");
    const ojo = document.querySelector(".mostrarContra");
    if (contraseñaInput.type === "password") {
        contraseñaInput.type = "text";
        ojo.textContent = "🙈"; // Cambia el icono al de ocultar
    } else {
        contraseñaInput.type = "password";
        ojo.textContent = "👁️"; // Cambia el icono al de mostrar
    }
}

function mostrarContraNueva() {
    const contraseñaInput = document.getElementById("pass");
    const ojo2 = document.getElementById("ojo1");
    if (contraseñaInput.type === "password") {
        contraseñaInput.type = "text";
        ojo2.textContent = "🙈"; // Cambia el icono al de ocultar
    } else {
        contraseñaInput.type = "password";
        ojo2.textContent = "👁️"; // Cambia el icono al de mostrar
    }
}

function mostrarContraNueva2() {
    const contraseñaInput = document.getElementById("passnueva");
    const ojo3 = document.getElementById("ojo2");
    if (contraseñaInput.type === "password") {
        contraseñaInput.type = "text";
        ojo3.textContent = "🙈"; // Cambia el icono al de ocultar
    } else {
        contraseñaInput.type = "password";
        ojo3.textContent = "👁️"; // Cambia el icono al de mostrar
    }
}