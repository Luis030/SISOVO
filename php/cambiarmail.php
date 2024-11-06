<?php
require_once("../BD/conexionbd.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_SESSION['cedula'];
    $correonuevo = $_POST['nuevomail'];
    $correonuevoconfirm = $_POST['nuevomailconfirm'];

    if ($correonuevo !== $correonuevoconfirm) {
        header("Location:../ajustes?errorid=6"); 
        exit;
    }

    $query = "UPDATE usuarios SET Correo = '$correonuevo' WHERE Cedula = $cedula";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado == TRUE) {
        header("Location:../ajustes?successm=true");
        exit;
    } else {
        header("Location:../ajustes?errorid=7");
        exit;
    }
}