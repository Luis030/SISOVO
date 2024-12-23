<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería</title>
    <link rel="stylesheet" href="Diseño/estilogaleria.css">
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
    ?>
    <div class="titulo-galeria">
        <h1>Galería</h1>
        <p>Aquí podrá ver una colección de fotos de nuestra institución</p>
    </div>

    <div class="galeria-container">
        <div class="galeria"></div>
        <div class="flechas-container">
            <button class="flecha flecha-izq disabled">◀</button>
            <button class="flecha flecha-der">▶</button>
        </div>
    </div>
    <div class="imagenes-individuales">
        <div class="imagen-container">
            <img src="Diseño/IMG/galeria1.jpg" alt="Descripción de la imagen" class="imagen">
            <div class="info-box">
                <p>Entrada del lugar.</p>
            </div>
        </div>
        <div class="imagen-container">
            <img src="Diseño/IMG/galeria2.jpg" alt="Descripción de la imagen" class="imagen">
            <div class="info-box">
                <p>Cartel en la entrada.</p>
            </div>
        </div>
        <div class="imagen-container">
            <img src="Diseño/IMG/galeria3.jpg" alt="Descripción de la imagen" class="imagen">
            <div class="info-box">
                <p>Cartel en la entrada.</p>
            </div>
        </div>      
    </div>
    <div class="imagenes-individuales">
        <div class="imagen-container">
            <img src="Diseño/IMG/galeria4.jpg" alt="Descripción de la imagen" class="imagen">
            <div class="info-box">
                <p>Vista desde lejos.</p>
            </div>
        </div>
        <div class="imagen-container">
            <img src="Diseño/IMG/galeria5.jpg" alt="Descripción de la imagen" class="imagen">
            <div class="info-box">
                <p>Imagen de un salon.</p>
            </div>
        </div>
        <div class="imagen-container">
            <img src="Diseño/IMG/titulos.jpg" alt="Descripción de la imagen" class="imagen">
            <div class="info-box">
                <p>Títulos profesionales</p>
            </div>
        </div>      
    </div>
    
    
    <?php
    require_once("php/footer.php");
    ?>
    <script src="JS/galeria.js"></script>
</body>
</html>
