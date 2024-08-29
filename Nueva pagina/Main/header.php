<?php
    session_start();
?>
<link rel="stylesheet" href="Diseño/style.css?aaa">
<header id="main-header">
        <div class="container">
            <div class="logo">
                <img src="Diseño/IMG/logocer-render.png" alt="Logo CER">
            </div>
            <button class="menu-toggle" id="menu-toggle" aria-label="Abrir menú">
                &#9776;
            </button>
            <nav id="menu">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="servicios.php">Servicios</a></li>
                    <li><a href="#galeria">Galería</a></li>
                    <li><a href="quienessomos.php">Quiénes Somos</a></li>
                    <li><a href="contactos.php">Contacto</a></li>
                </ul>
            </nav>
            <?php
            if(!isset($_SESSION['usuario'])) {
                echo "<div class='login'>";
                echo "<a href='../Login/index.php'>Ingresar</a>";
                echo "</div>";
            } else if(isset($_SESSION['verificacion'])) {
                echo "<div class='infoUser'>";
                echo "<button id='botonUser' onclick='toggleMenu()'>".$_SESSION['usuario']."</button>";
                echo "<ul class='menuUser'>";
                if(isset($_SESSION['Privilegio'])) {
                    if($_SESSION['Privilegio'] == "admin") {
                        echo "<li><a href='../../Pagina Administrativa/index.php'>Administrador</a></li>";
                    }
                    if($_SESSION['Privilegio'] == "alumno") {
                        echo "<li><a href='#'>Panel de alumno</a></li>";
                    }
                    echo "<li><a href='#'>Ajustes</a></li>";
                    echo "<li><a href='cerrarsesion.php'>Cerrar Sesión</a></li>";
                }
                echo "</ul>";
                echo "</div>";
            }
            ?>
        </div>
</header>
<script src="js.js"></script>