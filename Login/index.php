<?php
    $errorlogin = false;
    if(isset($_GET['errorid'])){
        if($_GET['errorid'] == '3'){
            $errorlogin = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
    <link rel="stylesheet" href="Diseño/logincss.css?"> 
    <link rel="shortcut icon" href="../Diseño/IMG/logocer-render.png" type="image/x-icon">
    <script src="JS/script.js"></script>
</head>
    <body>
        <div class="all">
            <h1>Iniciar Sesión</h1>
            <div class="login">
                <form action="backend.php" method="POST">
                    <div class="input">
                        <p>Cedula</p>
                        <input type="text" name="cedula" required>
                    </div>
                    <div class="input">
                        <p>Contraseña</p>
                        <input type="password" name="pass" id="contra" required>
                        <span class="mostrarContra" onclick="mostrarContra()">👁️</span>
                    </div>
                    <p>
                        <button>Ingresar</button>
                    </p>
                    <?php
                        if ($errorlogin === TRUE) {
                            echo "<div class='errorlogin'>Credenciales incorrectas.</div>";
                        }
                    ?>
                    <p class="atrasp">
                        <a href="../index" class="atras">Atras</a>
                    </p>
                    <p>
                        <a href="recuperar.php">Recuperar cuenta</a>
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>