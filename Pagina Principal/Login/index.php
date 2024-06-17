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
            <div class="login-principal">
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
                                    <input type="text" class="input-login" name="cedula" id="cedula" placeholder="Documento">
                                </div>
                            </div>
                            <div class="contenido-formulario">
                                <div class="titulo-input">
                                    <label>Contraseña</label>
                                </div>
                                <div class="div-input-login">
                                    <input type="password" class="input-login" placeholder="Contraseña">
                                </div>
                            </div>
                            <div class="contenido-formulario-btn">
                                <input type="submit" value="Ingresar">
                            </div>
                            <p class="register-p">¿Eres nuevo? Registrate aqui:</p>
                            <div class="div-registro-login">
                                
                                <a href="registro.php" class="registro-a">Registrarse</a>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="div-imagen-login">
                    <img src="https://scontent.fmvd1-1.fna.fbcdn.net/v/t1.6435-9/52630312_1780654198703018_3031136116469137408_n.jpg?stp=c0.25.525.274a_dst-jpg_p235x350&_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_ohc=EFf_2AFRNuYQ7kNvgHRr6-A&_nc_ht=scontent.fmvd1-1.fna&oh=00_AYCBv4LIjQuOmxBWk9BehIK9xEgfQs40je3JX5J2aA9_zA&oe=6695946D" alt="">
                </div>
            </div>
        </div>
        <div id="footer">
            <p id="footerInfo">&copy;Centro CER | Developed by &copy;SISOVO Corp. | <a href="" id="footerAboutUs">Sobre nosotros</a></p>
        </div>
    </body>
</html>