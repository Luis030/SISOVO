<?php
    ini_set('session.cookie_httponly', 1);
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
        ini_set('session.cookie_secure', 1);
    }
    ini_set('session.use_strict_mode', 1);
    session_start();
?>
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
<link rel="stylesheet" href="Diseño/style.css">
<header id="main-header">
        <div class="container">
            <div class="logo">
                <img src="Diseño/IMG/logocer-render.png" alt="Logo CER" id="logoIMG">
            </div>
            <button class="menu-toggle" id="menu-toggle" aria-label="Abrir menú">
                &#9776;
            </button>
            <nav id="menu">
                <ul>
                    <li><a href="index">Inicio</a></li>
                    <li><a href="servicios">Servicios</a></li>
                    <li><a href="galeria">Galería</a></li>
                    <li><a href="quienessomos">Quiénes Somos</a></li>
                    <li><a href="contactos">Contacto</a></li>
                </ul>
            </nav>
            <?php
            if(!isset($_SESSION['usuario'])) {
                echo "<div class='login'>";
                echo "<a href='Login/index'>Ingresar</a>";
                echo "</div>";
            } else if(isset($_SESSION['verificacion'])) {
                echo "<div class='infoUser'>";
                echo "<button id='botonUser' onclick='toggleMenu()'>".$_SESSION['usuario']."</button>";
                echo "<ul class='menuUser'>";
                if(isset($_SESSION['Privilegio'])) {
                    if($_SESSION['Privilegio'] == "admin" || $_SESSION['Privilegio'] == "docente") {
                        echo "<li><a href='Pagina Administrativa/index'>Administrador</a></li>";
                    }
                    if($_SESSION['Privilegio'] == "alumno") {
                        echo "<li><a href='panelalumno'>Panel de alumno</a></li>";
                    }
                    echo "<li><a href='ajustes'>Ajustes</a></li>";
                    echo "<li><a href='cerrarsesion'>Cerrar Sesión</a></li>";
                }
                echo "</ul>";
                echo "</div>";
            }
            ?>
        </div>
</header>
<script src="JS/js.js"></script>