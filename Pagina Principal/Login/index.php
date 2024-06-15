<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesión</title>
        <link rel="stylesheet" href="Diseño/loginMainstyle.css?">
    </head>
    <body>
        <div id="header">
            <a href="../Main/index.php" id="backMain" title="Volver">
                <img src="Diseño/IMG/leftArrow.svg" alt="Volver" id="leftArrowHeader">
            </a>
            <h1 id="titleLogin">Iniciar Sesión</h1>
        </div>
        <div id="Main">
            <p id="mainText">Ingrese aquí su cuenta para<br> poder iniciar sesión:</p>
            <form action="" method="post">
                <div id="loginDiv">
                    <p id="textUser">Usuario<br></p>
                    <input type="text" name="User" id="inputUser" placeholder="Ingrese su usuario">
                    <p id="textPass">Contraseña<br></p>
                    <input type="text" name="User" id="inputPass" placeholder="Ingrese su contraseña">
                    <br>
                    <input type="submit" value="Ingresar" id="loginStart">
                </div>
            </form>
        </div>
        <div id="footer">
            <p id="footerInfo">&copy;Centro CER | Developed by &copy;SISOVO Corp. | <a href="" id="footerAboutUs">Sobre nosotros</a></p>
        </div>
    </body>
</html>