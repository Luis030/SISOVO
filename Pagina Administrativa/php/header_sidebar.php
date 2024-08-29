<?php
    include("php/corroborarlogin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Panel Admin</h1>
        <div class="user-info">
            <span class="username"><?php echo $_SESSION['usuario']?></span>
            <span class="time" id="time"></span> 
        </div>
        <button class="menu-toggle" onclick="toggleSidebar()">☰ Menú</button>
    </header>

    <div class="container">
        <aside class="sidebar" id="sidebar">
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Lista Docente</a></li>
                    <li><a href="#">Clases</a></li>
                    <li><a href="#">Gestión</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" onclick="toggleDropdown()">Añadir ▼</a>
                        <ul class="dropdown-menu" id="dropdown-menu">
                            <li><a href="añadirdocente.php">Docente</a></li>
                            <li><a href="añadiralumno.php">Alumno</a></li>
                            <li><a href="#">Clase</a></li>
                            <li><a href="#">Especializacion</a></li>
                            <li><a href="#">Patologia</a></li>
                        </ul>
                    </li>
                    <li id="about-button"><a href="#" id="aboutus" class="aboutus">About Us</a></li>
                    <li><a href="php/cerrar.php" id="cerrar-boton">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
