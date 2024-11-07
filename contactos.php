<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <link rel="stylesheet" href="Diseño/estilocontactos.css">
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
    <main>
        <div class="titulo-contacto">
            <h1>Contacto</h1>
        </div>
        <div class="tipos-contacto">
            <img src="https://cdn-icons-png.flaticon.com/512/3722/3722026.png" alt="Dirección" id="img1">Rincón 184
            <img src="https://cdn-icons-png.flaticon.com/512/785/785868.png" alt="Número tel" id="img2">092706308
            <img src="https://svgsilh.com/svg/31172.svg" alt="Número tel fijo" id="img3">4732 4202
            <img src="https://cdn-icons-png.flaticon.com/512/4926/4926635.png" alt="Correo" id="img4">saltocentrocer@gmail.com
        </div>
        <div class="container-mapa">
            <div class="info-mapa">
                <h1>Mapa del lugar</h1>
                <a href="https://maps.app.goo.gl/JZYBDNn2SJ4arFYt9" target="_blank" id="vermaps">VER EN GOOGLE MAPS</a>
                <a href="https://wa.me/598092706308" target="_blank" id="enviarwhatsapp">ENVIAR WHATSAPP</a>
            </div>
            <div class="mapa">
                <iframe id="mapIframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3405.8804528377314!2d-57.96567778758818!3d-31.389859694864377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95addd2a185d2f41%3A0xf560dec7caf4bce9!2sCentro%20CER%20Salto!5e0!3m2!1ses-419!2suy!4v1718492158731!5m2!1ses-419!2suy" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
            </div>
        </div>
        <div class="lugar">
            <img src="Diseño/IMG/lugarcer.jpg" alt="">
            <img src="Diseño/IMG/lugarcer2.jpg" alt="" id="lugarcer1">
        </div>
    </main>
    <?php
        require_once("php/footer.php");
    ?>
</body>
</html>