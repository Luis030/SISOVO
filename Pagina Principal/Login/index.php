<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
    <link rel="stylesheet" href="Diseño/logincss.css?a"> 
    <link rel="shortcut icon" href="Diseño/logocer.jpg" type="image/x-icon">
</head>
    <body>
        <div class="all">
            <h1>Iniciar Sesión</h1>
            <div class="login">
                <form action="backend.php" method="POST">
                    <p>Cedula</p>
                    <input type="text" name="cedula" required>
                    <p>Contraseña</p>
                    <input type="password" name="pass" required>
                    <p>
                    <button>Ingresar</button>
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>