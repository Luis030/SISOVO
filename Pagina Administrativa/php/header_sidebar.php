<?php
    session_start();

    if(!isset($_SESSION["usuario"])) {
        header("Location: ../Pagina Principal/Main");
    } else {
        if($_SESSION['Privilegio'] != "admin" && $_SESSION['Privilegio'] != "docente"){
            header("Location: ../Pagina Principal/Main");
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/multi-select-tag.js"></script>
    <link rel="stylesheet" href="css/multi-select-tag.css">
    <script>
         document.addEventListener("DOMContentLoaded", function() {
            const currentUrl = window.location.pathname.split('/').pop();
            const menuLinks = document.querySelectorAll('a');

            menuLinks.forEach(link => {
                const linkUrl = link.getAttribute('href').split('/').pop();
                if (linkUrl === currentUrl) {
                    link.classList.add('active');
                }
                if (link.closest('.dropdown-menu') && linkUrl === currentUrl) {
                    document.querySelector('.dropdown-toggle').classList.add('activo');
                }
            });

            const liDropdown = document.querySelector('.dropdown');
            const dropdownToggle = document.querySelector('.dropdown-toggle');
            dropdownToggle.addEventListener('click', function() {
                dropdownToggle.classList.toggle('activo');
                liDropdown.classList.toggle('activoDropdown');
            });
        });
    </script>
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
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Lista Docente</a></li>
                    <li><a href="clases.php">Clases</a></li>
                    <li><a href="#">Gestión</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" onclick="toggleDropdown();">&#10010; Añadir ▼</a>
                        <ul class="dropdown-menu" id="dropdown-menu">
                            <li><a href="añadirdocente.php">Docente</a></li>
                            <li><a href="añadiralumno.php">Alumno</a></li>
                            <li><a href="#dfsa">Clase</a></li>
                            <li><a href="#dsa">Especializacion</a></li>
                            <li><a href="#">Patologia</a></li>
                        </ul>
                    </li>
                    <li id="about-button"><a href="#" id="aboutus" class="aboutus">About Us</a></li>
                    <li><a href="php/cerrar.php" id="cerrar-boton">Cerrar Sesión</a></li>
                </ul>
        </aside>

        <main class="content">
