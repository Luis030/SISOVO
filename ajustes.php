<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes</title>
    <link rel="stylesheet" href="Diseño/estiloajustes.css">
    <script src="JS/ajustes.js"></script>
    <link rel="shortcut icon" href="Diseño/IMG/logocer-render.png" type="image/x-icon">
        <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2GVWX27RV2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-2GVWX27RV2');
    </script>
</head>
<body>
    <?php
        require_once("php/header.php");
        if(!isset($_SESSION['usuario'])) {
            header("Location:index.");
        }
        $exito = false;
        $exito2 = false;
        $codigo = 0;

        if (isset($_GET['successp'])) {
            $exito = true;
        }

        if (isset($_GET['successm'])) {
            $exito2 = true;
        }

        if(isset($_GET['errorid'])) {
            $codigo = $_GET['errorid'];
        }
    ?>
    <main>
        <div class="ajustes-container">
            <div class="ajustes">
                <div class="ajustes-header">
                    <h1>Ajustes</h1>
                    <img src="Diseño/IMG/logocer-render.png" alt="">
                </div>
                <div class="principal-ajustes">
                    <div class="infocuenta">
                        <h1>Información de la cuenta</h1>
                        <div class="datos" id="datosdiv">
                            <?php
                                switch($_SESSION['Privilegio']){
                                    case 'admin':
                                        echo "<h2>Usuario administrador.</h2>";
                                        break;
                                    default:
                                        break;
                                }
                            ?>
                        </div>
                        <div class="informacion">
                            <?php
                                switch($_SESSION['Privilegio']){
                                    case 'alumno':
                                        echo "<h2>Patologías: </h2>";
                                        echo "<ul id='lista'>";
                                        echo "</ul>";
                                        break;
                                    case 'docente':
                                        echo "<h2>Especialidades: </h2>";
                                        echo "<ul id='lista'>";
                                        echo "</ul>";
                                        break;
                                    default:
                                        break;
                                }
                            ?>
                        </div>
                    </div>
                    <div class="cambiarpass">
                        <h1>Cambiar contraseña</h1>
                        <div class="cambiarpass-form">
                            <form action="php/cambiarpass.php" method="post">
                                <p>Contraseña actual</p>
                                <input type="password" name="viejapass" required>
                                <p>Contraseña nueva</p>
                                <input type="password" name="nuevapass" required>
                                <p>Repita la nueva contraseña</p>
                                <input type="password" name="nuevapassconfirm" required>
                                <div class="botonpass">
                                    <button>Enviar</button>
                                </div>
                                <?php
                                    if ($exito === true) {
                                        echo "<p class='bien'>Contraseña actualizada.</p>";
                                    }
                                    switch($codigo) {
                                        case '1':
                                            echo "<p class='mal'>Las contraseñas no coinciden.</p>";
                                            break;
                                        case '2':
                                            echo "<p class='mal'>Error con el servidor.</p>";
                                            break;
                                        case '3':
                                            echo "<p class='mal'>La contraseña es incorrecta.</p>";
                                            break;
                                        case '4':
                                            echo "<p class='mal'>La nueva contraseña debe tener entre 8 y 20 caracteres.</p>";
                                            break;
                                        case '5':
                                            echo "<p class='mal'>La nueva contraseña contiene caracteres no permitidos (', \", <, >, \\).</p>";
                                            break;
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                    <div class="cambiarpass">
                        <h1>Cambiar correo</h1>
                        <div class="cambiarpass-form">
                            <form action="php/cambiarmail.php" method="post">
                                <p>Correo nuevo</p>
                                <input type="mail" name="nuevomail" required>
                                <p>Repita el nuevo correo</p>
                                <input type="mail" name="nuevomailconfirm" required>
                                <div class="botonpass">
                                    <button>Enviar</button>
                                </div>
                                <?php
                                    if ($exito2 === true) {
                                        echo "<p class='bien'>Correo actualizado.</p>";
                                    }
                                    switch($codigo) {
                                        case '6':
                                            echo "<p class='mal'>Los correos no coinciden.</p>";
                                            break;
                                        case '7':
                                            echo "<p class='mal'>Error con el servidor.</p>";
                                            break;
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                    <?php
                        if ($_SESSION['Privilegio'] == "alumno") {
                    ?>                       
                    <div class="panelalumno">
                        <h1>Panel de alumno</h1>
                        <p>Este panel es una página en la cual se puede acceder a información útil del alumno, aquí estarán sus informes y las clases que esta inscrito. Los informes pueden ser impresos desde la web para presentar a BPS.</p>
                        <div>
                            Haz <a href="panelalumno" class="irAlumno">click aquí</a> para ir!
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("php/footer.php");
    ?>
</body>
</html>