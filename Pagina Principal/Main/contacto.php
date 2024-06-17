<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Centro CER</title>
        <link rel="stylesheet" href="Diseño/styleindex.css?">
    </head>
    <body>
        <?php
            include("Body/header.php");
        ?>
        <div id="main">
            <div id="contactoDiv">
                <h1 id="contactHere">Contactenos aquí</h1>
                <div id="redesDiv">
                    <div id="mail">
                        <img id="svgs" src="Diseño/IMG/mail.svg" alt="Mail">
                        <p id="svgsTexts">saltocentrocer@gmail.com</p>
                    </div>
                    <div id="wsp">
                        <img id="svgs" src="Diseño/IMG/wsp1.svg" alt="Celular">
                        <p id="svgsTexts">092 706 308</p>
                    </div>
                    <div id="tel">
                        <img id="svgs" src="Diseño/IMG/cel.svg" alt="Tel fijo">
                        <p id="svgsTexts">4732 4202</p>
                    </div>
                    <div id="dir">
                        <img id="svgs" src="Diseño/IMG/ubi.svg" alt="Dirección">
                        <p id="svgsTexts">Rincón 184</p>
                    </div>
                </div>
            </div>
            <div id="ubiDiv">
                <p id="ubiTitle">¿Cómo llegar?</p>
                <div id="mapDiv">
                    <iframe id="mapIframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3405.8804528377314!2d-57.96567778758818!3d-31.389859694864377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95addd2a185d2f41%3A0xf560dec7caf4bce9!2sCentro%20CER%20Salto!5e0!3m2!1ses-419!2suy!4v1718492158731!5m2!1ses-419!2suy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div> 
        <?php
            include("Body/footer.php");
        ?>
    </body>     
</html>