<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes</title>
    <link rel="stylesheet" href="Diseño/estiloajustes.css">
</head>
<body>
    <?php
    require_once("php/header.php");
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
                        <?php
                        echo "<div class='datos'>";
                        echo "<p>Nombre(s): Luis Sosa</p>";
                        echo "<p>Apellido(s): Federico Simonelli</p>";
                        echo "<p>Fecha de nacimiento: 20/03/24</p>";
                        echo "<p>Cédula: 8439583</p>";
                        echo "</div>";
                        ?>
                        <div class="patologias">
                            <h2>Patologias:</h2>
                            <ul>
                                <li>fsfsf</li>
                                <li>fsf</li>
                                <li>fsf</li>
                                <li>fsf</li>
                                <li>fsf</li>
                            </ul>
                        </div>
                    </div>
                    <div class="cambiarpass">
                        <h1>Cambiar contraseña</h1>
                        <div class="cambiarpass-form">
                            <form action="" method="post">
                                <p>Contraseña actual</p>
                                <input type="password">
                                <p>Contraseña nueva</p>
                                <input type="password">
                                <p>Repita la nueva contraseña</p>
                                <input type="password">
                                <div class="botonpass">
                                    <button>Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="panelalumno">
                        <h1>Panel de alumno</h1>
                        <p>Este panel es una página en la cual se puede acceder a información útil del alumno, aquí estarán sus informes y las clases que esta inscrito. Los informes pueden ser impresos desde la web para presentar a BPS.</p>
                        <div>
                            Haz <a href="" style="color:dodgerblue; text-decoration:none;">click aquí</a> para ir!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("php/footer.php");
    ?>
</body>
</html>