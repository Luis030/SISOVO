<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar cuenta</title>
    <link rel="stylesheet" href="Diseño/recuperarpass.css">
    <link rel="shortcut icon" href="../Diseño/IMG/logocer-render.png" type="image/x-icon">
</head>
<body>
    <div class="contenedor-recuperar">
        <h1>Recuperar Cuenta</h1>
        <div class="contenedor-formulario">
            <form action="recuperarpass.php" method="post">
                <p>Cédula</p>
                <input type="text" name="cedula">
                <br>
                <div class="cont-span">
                    <?php
                    if(isset($_GET['errorid'])){
                        if($_GET['errorid'] == "1"){
                            echo "<span>No hay ningun correo asignado a su cuenta, contacte con un administrador</span>";
                        }
                        if($_GET['errorid'] == "2"){
                            echo "<span>La cédula no esta registrada.</span>";
                        }
                        if($_GET['errorid'] == "3"){
                            echo "<span>Error del servidor, intente mas tarde.</span>";
                        }
                    } else {
                    ?>
                    <span>Se le enviara un código al correo electronico asociado a su cuenta</span>
                    <?php
                    }
                    ?>
                </div>
                <p>
                    <button>Ingresar</button>
                </p>
                <p class="atrasp">
                    <a href="../index" class="atras">Atras</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>