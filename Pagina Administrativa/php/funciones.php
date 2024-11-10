<?php
function validarCedula($cedula) {
    $cedula = str_replace(array('.', '-'), '', $cedula);
    if (strlen($cedula) != 8) {
        return false;
    }
    $num = substr($cedula, 0, 7);
    $digitoVerificador = substr($cedula, -1);
    $coeficientes = [2, 9, 8, 7, 6, 3, 4];
    $total = 0;
    for ($i = 0; $i < 7; $i++) {
        $total += $num[$i] * $coeficientes[$i];
    }
    $modulo = $total % 10;
    $digitoCalculado = $modulo == 0 ? 0 : 10 - $modulo;
    return $digitoCalculado == $digitoVerificador;
}

function generarPass($cedula, $extranjera = false) {
    if($extranjera == false){
        $num = substr($cedula, 0, 7);
        $digitoVerificador = substr($cedula, -1);

        $cedulacompleta = $num . '-' . $digitoVerificador;
        $contraseña = password_hash($cedulacompleta, PASSWORD_DEFAULT);
    }
    if($extranjera == true){
        $cedulacompleta = $cedula . '-E';
        $contraseña = password_hash($cedulacompleta, PASSWORD_DEFAULT);
    }
    return $contraseña;
}

function generarPassDoc($cedula, $nombre, $apellido) {

    $inicialNombre = strtoupper(substr(trim($nombre), 0, 1));
    
    $inicialApellido = strtoupper(substr(trim($apellido), 0, 1));

    // Generar la contraseña en el formato: cedula@inicialNombre.inicialApellido
    $contrasena = $cedula . '@' . $inicialNombre . '.' . $inicialApellido;

    $contrasenaHasheada = password_hash($contrasena, PASSWORD_DEFAULT);

    return $contrasenaHasheada;
}