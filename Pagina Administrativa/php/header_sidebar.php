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
    <script>
         function cambiarEstilo(enlace) {
        // Primero, eliminar la clase 'active' de todos los <li> y <a>
        document.querySelectorAll('li').forEach(li => li.classList.remove('active'));
        document.querySelectorAll('a').forEach(a => a.classList.remove('active'));

        // Luego, añadir la clase 'active' al <li> que contiene el enlace clicado
        // y también al enlace clicado
        enlace.parentElement.classList.add('active');
        enlace.classList.add('active');
}
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
                    <li><a href="index.php" onclick="cambiarEstilo(this)">Inicio</a></li>
                    <li><a href="#" onclick="cambiarEstilo(this)">Lista Docente</a></li>
                    <li><a href="#" onclick="cambiarEstilo(this)">Clases</a></li>
                    <li><a href="#" onclick="cambiarEstilo(this)">Gestión</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" onclick="toggleDropdown(); cambiarEstilo(this)">&#10010; Añadir ▼</a>
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
        </aside>

        <main class="content">
