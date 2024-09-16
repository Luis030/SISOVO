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
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" href="css/styles.css">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                    
                    <li><a href="clases.php">Clases</a></li>
                    <?php
                    if($_SESSION['Privilegio'] == "docente"){
                    ?>
                    <li><a href="crearinforme.php">Realizar Informe</a></li>
                    <?php
                    }
                    ?>
                    <?php

                    ?>
                    <li><a href="#">Gestión</a></li>
                    <?php
                    if($_SESSION['Privilegio'] == "admin"){
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" onclick="toggleDropdown();">&#10010; Añadir </a>
                        <ul class="dropdown-menu" id="dropdown-menu">
                            <li><a href="añadiralumno.php">Alumno/Docente</a></li>
                            <li><a href="añadirtodo.php">Especialización/Patologia/Ocupación</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Lista Docente</a></li>
                    <?php
                    }
                    ?>
                    
                    <li id="about-button"><a href="#" id="aboutus" class="aboutus">About Us</a></li>
                    <li><a href="php/cerrar.php" id="cerrar-boton">Cerrar Sesión</a></li>
                </ul>
        </aside>

        <main class="content">
