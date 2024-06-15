<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Iniciar Sesión</title>
        <link rel="stylesheet" href="Diseño/loginMainstyle.css?noandasino???">
    </head>
    <body>
        <div id="header">
            <a href="../Main/index.php" id="backMain" title="Volver">
                <img src="Diseño/IMG/leftArrow.svg" alt="Volver" id="leftArrowHeader">
            </a>
            <a href="" id="headInfo">Servicios</a>
            <a href="" id="headInfo">Colecciones</a>
            <a href="../Main/index.php" id="titleCER">
                <h1>CER</h1>
            </a>
            <a href="" id="headInfo">Quienes somos?</a>
            <a href="../Main/contacto.php" id="headInfo">Contacto</a>
        </div>
        <div id="Main">
            <p id="mainText">Ingrese aquí su cuenta para<br> poder iniciar sesión:</p>
            <div class="login-div">
                <form action="" method="post">
                    <div class="div-inputs-login">
                        <div class="div-titulo-login">
                            <h1>Iniciar Sesión</h1>
                        </div>
                        <div class="contenido-formulario">
                            <div class="titulo-input">
                                <label for="cedula">Cedula</label>
                            </div>
                            <div class="div-input-login">
                                <input type="text" class="input-login" name="cedula" id="cedula">
                            </div>
                        </div>
                        <div class="contenido-formulario">
                            <div class="titulo-input">
                                <label>Contraseña</label>
                            </div>
                            <div class="div-input-login">
                                <input type="password" class="input-login">
                            </div>
                        </div>
                        <div class="contenido-formulario-btn">
                            <input type="submit">
                        </div>
                    </div>
                    
                    
                </form>
            </div>
        </div>
        <div id="footer">
            <p id="footerInfo">&copy;Centro CER | Developed by &copy;SISOVO Corp. | <a href="" id="footerAboutUs">Sobre nosotros</a></p>
        </div>
    </body>
</html>