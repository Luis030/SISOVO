<?php
    session_start();

    if(!isset($_SESSION["usuario"])) {
        header("Location: ../Pagina Principal/Main");
        exit();
    } else {
        if($_SESSION['Privilegio'] != "admin" && $_SESSION['Privilegio'] != "docente"){
            header("Location: ../Pagina Principal/Main");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" href="css/styles.css">
    <script>
         document.addEventListener("DOMContentLoaded", function() {
            const currentUrl = window.location.pathname.split('/').pop();
            const menuLinks = document.querySelectorAll('a');

            menuLinks.forEach(link => {
                const linkUrl = link.getAttribute('href').split('/').pop();
                if (linkUrl === currentUrl) {
                    link.classList.add('active');
                }
                if (link.closest('.dropdown-menu') && linkUrl === currentUrl) {
                    document.querySelector('.dropdown-toggle').classList.add('activo');
                }
            });

            const liDropdown = document.querySelector('.dropdown');
            const dropdownToggle = document.querySelector('.dropdown-toggle');
            dropdownToggle.addEventListener('click', function() {
                dropdownToggle.classList.toggle('activo');
                liDropdown.classList.toggle('activoDropdown');
            });
        });
    </script>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <h1>Panel administrativo</h1>
        <div class="user-info">
            <span class="username"><?php echo $_SESSION['usuario']?></span>
            <span class="time" id="time"></span> 
        </div>
        <button class="menu-toggle" onclick="toggleSidebar()">☰ Menú</button>
    </header>

    <div class="container">
        <aside class="sidebar" id="sidebar">
                <ul>
                    <li><a href="index.php"><svg width="175px" height="175px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0L0 6V8H1V15H4V10H7V15H15V8H16V6L14 4.5V1H11V2.25L8 0ZM9 10H12V13H9V10Z" fill="#000000"></path> </g></svg><span>Inicio</span></a></li>
                    <?php
                    if($_SESSION['Privilegio'] == "admin"){

                    ?>
                    <li><a href="clases.php"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 9H21M3 15H21M9 9L9 20M15 9L15 20M6.2 20H17.8C18.9201 20 19.4802 20 19.908 19.782C20.2843 19.5903 20.5903 19.2843 20.782 18.908C21 18.4802 21 17.9201 21 16.8V7.2C21 6.0799 21 5.51984 20.782 5.09202C20.5903 4.71569 20.2843 4.40973 19.908 4.21799C19.4802 4 18.9201 4 17.8 4H6.2C5.0799 4 4.51984 4 4.09202 4.21799C3.71569 4.40973 3.40973 4.71569 3.21799 5.09202C3 5.51984 3 6.07989 3 7.2V16.8C3 17.9201 3 18.4802 3.21799 18.908C3.40973 19.2843 3.71569 19.5903 4.09202 19.782C4.51984 20 5.07989 20 6.2 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg><span>Clases</span></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if($_SESSION['Privilegio'] == "docente"){
                    ?>
                    <li><a href="crearinforme.php"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5 2h16v12h-2V4H5v16h8v2H3V2h2zm2 4h10v2H7V6zm10 4H7v2h10v-2zM7 14h7v2H7v-2zm13 5h3v2h-3v3h-2v-3h-3v-2h3v-3h2v3z" fill="#000000"></path> </g></svg><span>Realizar Informe</span></a></li>
                    <li><a href="informesdocente.php"><svg fill="#000000" viewBox="0 0 1000 1000" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 1000 1000" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata> <g> <g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)"> <path d="M1685.8,4989.2c-253.7-58.9-499.3-265.9-621.1-519.6l-75.1-158.3l-6.1-4141c-4.1-2772.8,2-4173.4,16.2-4238.4c56.8-267.9,257.8-513.6,523.7-639.4l156.3-75.1l3258-6.1c2174-4.1,3290.4,2,3355.4,16.2c326.8,69,627.2,365.4,702.4,692.2c14.2,58.9,22.3,1049.5,22.3,2809.4c0,2616.5-2,2724.1-38.6,2801.2c-48.7,101.5-3373.6,3428.5-3458.9,3460.9C5449.2,5017.6,1797.5,5015.6,1685.8,4989.2z M4856.5,3087.2c0-1433.1,2-1451.4,115.7-1648.3c89.3-152.2,253.7-298.4,426.3-381.6l158.3-75.1l1427-6.1l1425-6.1v-2494.7c0-1891.9-6.1-2506.9-24.4-2547.5c-52.8-117.7,148.2-111.6-3385.8-111.6s-3333.1-6.1-3385.8,111.6c-38.6,81.2-34.5,8302.2,4.1,8371.2c58.9,105.6,12.2,101.5,1682.8,103.5h1556.9V3087.2z M6866.1,1585.1c-1351.9-4.1-1337.7-6.1-1380.3,109.6c-12.2,30.5-20.3,552.1-20.3,1293V4230l1319.4-1319.4l1319.4-1319.4L6866.1,1585.1z"></path> <path d="M2989-327.1v-304.5h2009.6h2009.6v304.5v304.5H4998.6H2989V-327.1z"></path> <path d="M2989-1646.5V-1951h2009.6h2009.6v304.5v304.5H4998.6H2989V-1646.5z"></path> <path d="M2989-2925.3v-304.5h954.1h954v304.5v304.5h-954H2989V-2925.3z"></path> </g> </g> </g></svg><span>Ver informes</span></a></li>
                    <li><a href="clasesdocente.php"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 6L21 6.00078M8 12L21 12.0008M8 18L21 18.0007M3 6.5H4V5.5H3V6.5ZM3 12.5H4V11.5H3V12.5ZM3 18.5H4V17.5H3V18.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg><span>Clases</span></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if($_SESSION['Privilegio'] == "admin"){
                    ?>
                    <li><a href="gestion.php?pagina=inicio"><svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>settings_3_line</title> <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="System" transform="translate(-1248.000000, 0.000000)"> <g id="settings_3_line" transform="translate(1248.000000, 0.000000)"> <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path> <path d="M14.0352,2.80881 C14.4041,2.54328 14.9244,2.41911 15.4361,2.60633 C16.5334,3.00779 17.5399,3.59556 18.4176,4.33073 C18.8347,4.6801 18.9873,5.19202 18.942,5.64392 C18.8666,6.39677 18.9994,7.12366 19.3611,7.7502 C19.6827889,8.30737333 20.1637667,8.74748988 20.7513584,9.05690332 L20.9766,9.16678 C21.3914,9.35374 21.7593,9.74288 21.8525,10.2803 C21.9495,10.8397 22,11.4144 22,12.0001 C22,12.5858 21.9495,13.1606 21.8525,13.72 C21.76862,14.20366 21.462233,14.567197 21.0994052,14.7713908 L20.9766,14.8335 C20.2865,15.1446 19.723,15.6233 19.3611,16.2501 C18.9994,16.8766 18.8666,17.6034 18.942,18.3562 C18.9872,18.8081 18.8347,19.32 18.4176,19.6694 C17.5399,20.4045 16.5334,20.9923 15.4362,21.3937 C14.9245,21.581 14.4042,21.4568 14.0353,21.1912 C13.4206,20.7488 12.7241,20.5 12,20.5 C11.2759,20.5 10.5794,20.7488 9.96474,21.1912 C9.59585,21.4568 9.07552,21.581 8.56378,21.3937 C7.46655,20.9923 6.46002,20.4045 5.5823,19.6693 C5.16523,19.32 5.01269,18.8081 5.05794,18.3562 C5.13332,17.6034 5.00045,16.8766 4.63874,16.2501 C4.31706,15.6929444 3.83615432,15.2528062 3.24858549,14.9433807 L3.02335,14.8335 C2.6086,14.6465 2.24075,14.2574 2.14752,13.72 C2.05047,13.1606 2,12.5858 2,12.0001 C2,11.4143 2.05047,10.8396 2.14751,10.2801 C2.231417,9.796467 2.5377662,9.4329165 2.90054972,9.2287416 L3.02334,9.16664 C3.71344,8.85555 4.27685,8.37689 4.63874,7.75007 C5.00046,7.12356 5.13333,6.39671 5.05794,5.64391 C5.01268,5.19203 5.16522,4.68015 5.5823,4.3308 C6.46004,3.59559 7.4666,3.0078 8.56387,2.60633 C9.07558,2.4191 9.59589,2.54328 9.96478,2.80881 C10.5794,3.25123 11.2759,3.50003 12,3.50003 C12.7241,3.50003 13.4206,3.25123 14.0352,2.80881 Z M14.9917,4.57792 C14.1261,5.14715 13.1053,5.50003 12,5.50003 C10.8947,5.50003 9.87388,5.14715 9.00832,4.57792 C8.30727,4.8608 7.65502,5.24042 7.0682,5.70056 C7.12793,6.734 6.92299,7.79365 6.37079,8.75007 C5.81845,9.70677 5.00295,10.4142 4.07778,10.8792 C4.02655,11.245 4,11.6192 4,12.0001 C4,12.381 4.02655,12.7551 4.07778,13.121 C5.00295,13.586 5.81845,14.2934 6.37079,15.2501 C6.92298,16.2065 7.12793,17.2661 7.0682,18.2995 C7.655,18.7597 8.30722,19.1393 9.00824,19.4222 C9.87381,18.8529 10.8947,18.5 12,18.5 C13.1053,18.5 14.1262,18.8529 14.9918,19.4222 C15.6927,19.1393 16.3449,18.7597 16.9317,18.2996 C16.872,17.2662 17.0769,16.2065 17.6291,15.2501 C18.1815,14.2933 18.997,13.5859 19.9222,13.1209 C19.9735,12.7551 20,12.381 20,12.0001 C20,11.6192 19.9735,11.2451 19.9222,10.8794 C18.997,10.4144 18.1815,9.70693 17.6291,8.7502 C17.0769,7.79371 16.8719,6.734 16.9317,5.7005 C16.3449,5.24039 15.6927,4.86079 14.9917,4.57792 Z M12,8 C14.2091,8 16,9.79086 16,12 C16,14.2091 14.2091,16 12,16 C9.79086,16 8,14.2091 8,12 C8,9.79086 9.79086,8 12,8 Z M12,10 C10.8954,10 10,10.8954 10,12 C10,13.1046 10.8954,14 12,14 C13.1046,14 14,13.1046 14,12 C14,10.8954 13.1046,10 12,10 Z" id="形状" fill="#000000"> </path> </g> </g> </g> </g></svg><span>Gestión</span></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if($_SESSION['Privilegio'] == "admin"){
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" onclick="toggleDropdown();"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> </g></svg><span>Añadir</span> </a>
                        <ul class="dropdown-menu" id="dropdown-menu">
                            <li><a href="añadiralumno.php"><svg viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>profile_plus_round [#1324]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-60.000000, -2239.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M24.0001371,2083 C24.0001371,2083.552 23.5521371,2084 23.0001371,2084 L21.0001371,2084 L21.0001371,2086 C21.0001371,2086.552 20.5521371,2087 20.0001371,2087 C19.4481371,2087 19.0001371,2086.552 19.0001371,2086 L19.0001371,2084 L17.0001371,2084 C16.4481371,2084 16.0001371,2083.552 16.0001371,2083 C16.0001371,2082.448 16.4481371,2082 17.0001371,2082 L19.0001371,2082 L19.0001371,2080 C19.0001371,2079.448 19.4481371,2079 20.0001371,2079 C20.5521371,2079 21.0001371,2079.448 21.0001371,2080 L21.0001371,2082 L23.0001371,2082 C23.5521371,2082 24.0001371,2082.448 24.0001371,2083 M15.7401371,2097 L7.6121371,2097 C6.8171371,2097 6.3141371,2096.099 6.7721371,2095.449 C7.8511371,2093.92 9.6251371,2092.916 11.6331371,2092.902 C11.6471371,2092.902 11.6611371,2092.906 11.6751371,2092.906 C11.6901371,2092.906 11.7031371,2092.902 11.7181371,2092.902 C13.7271371,2092.916 15.5021371,2093.919 16.5801371,2095.449 C17.0381371,2096.099 16.5361371,2097 15.7401371,2097 M11.6751371,2086.906 C12.7781371,2086.906 13.6751371,2087.803 13.6751371,2088.906 C13.6751371,2089.995 12.8001371,2090.879 11.7181371,2090.902 C11.7031371,2090.902 11.6901371,2090.9 11.6751371,2090.9 C11.6611371,2090.9 11.6471371,2090.902 11.6331371,2090.902 C10.5501371,2090.879 9.6751371,2089.995 9.6751371,2088.906 C9.6751371,2087.803 10.5731371,2086.906 11.6751371,2086.906 M14.7011371,2091.495 C15.5311371,2090.527 15.9311371,2089.18 15.5001371,2087.724 C15.1031371,2086.38 13.9731371,2085.319 12.6061371,2085.011 C9.9921371,2084.422 7.6751371,2086.393 7.6751371,2088.906 C7.6751371,2089.899 8.0501371,2090.796 8.6491371,2091.495 C6.5201371,2092.365 4.8481371,2094.181 4.1011371,2096.4 C3.6711371,2097.68 4.6691371,2099 6.0191371,2099 L17.3311371,2099 C18.6811371,2099 19.6801371,2097.68 19.2491371,2096.4 C18.5021371,2094.181 16.8311371,2092.365 14.7011371,2091.495" id="profile_plus_round-[#1324]"> </path> </g> </g> </g> </g></svg><span>Persona</span></a></li>
                            <li><a href="añadirtodo.php"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Edit / Add_To_Queue"> <path id="Vector" d="M3 9V19.4C3 19.9601 3 20.2399 3.10899 20.4538C3.20487 20.642 3.35774 20.7952 3.5459 20.8911C3.7596 21 4.0395 21 4.59846 21H15.0001M14 13V10M14 10V7M14 10H11M14 10H17M7 13.8002V6.2002C7 5.08009 7 4.51962 7.21799 4.0918C7.40973 3.71547 7.71547 3.40973 8.0918 3.21799C8.51962 3 9.08009 3 10.2002 3H17.8002C18.9203 3 19.4801 3 19.9079 3.21799C20.2842 3.40973 20.5905 3.71547 20.7822 4.0918C21.0002 4.51962 21.0002 5.07969 21.0002 6.19978L21.0002 13.7998C21.0002 14.9199 21.0002 15.48 20.7822 15.9078C20.5905 16.2841 20.2842 16.5905 19.9079 16.7822C19.4805 17 18.9215 17 17.8036 17H10.1969C9.07899 17 8.5192 17 8.0918 16.7822C7.71547 16.5905 7.40973 16.2842 7.21799 15.9079C7 15.4801 7 14.9203 7 13.8002Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg><span>Elemento</span></a></li>
                            <li><a href="añadirclase.php"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M3.36066 4.98361H4.93443V7.86885H8.60656V9.44262H4.93443V13.1148H8.60656V14.6885H4.14754C3.71296 14.6885 3.36066 14.3362 3.36066 13.9016V4.98361Z" fill="#000000"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M1 1.83607C1 0.822034 1.82203 0 2.83607 0H10.7049C11.7189 0 12.541 0.822034 12.541 1.83607V3.67213C12.541 4.68616 11.7189 5.5082 10.7049 5.5082H2.83607C1.82203 5.5082 1 4.68616 1 3.67213V1.83607ZM2.83607 1.57377C2.6912 1.57377 2.57377 1.6912 2.57377 1.83607V3.67213C2.57377 3.81699 2.6912 3.93443 2.83607 3.93443H10.7049C10.8498 3.93443 10.9672 3.81699 10.9672 3.67213V1.83607C10.9672 1.6912 10.8498 1.57377 10.7049 1.57377H2.83607Z" fill="#000000"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81967 8.39344C7.81967 7.37941 8.64171 6.55738 9.65574 6.55738H12.2787C13.2927 6.55738 14.1148 7.37941 14.1148 8.39344V8.91803C14.1148 9.93206 13.2927 10.7541 12.2787 10.7541H9.65574C8.64171 10.7541 7.81967 9.93206 7.81967 8.91803V8.39344ZM9.65574 8.13115C9.51088 8.13115 9.39344 8.24858 9.39344 8.39344V8.91803C9.39344 9.06289 9.51088 9.18033 9.65574 9.18033H12.2787C12.4235 9.18033 12.541 9.06289 12.541 8.91803V8.39344C12.541 8.24858 12.4235 8.13115 12.2787 8.13115H9.65574Z" fill="#000000"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81967 13.6393C7.81967 12.6253 8.64171 11.8033 9.65574 11.8033H12.2787C13.2927 11.8033 14.1148 12.6253 14.1148 13.6393V14.1639C14.1148 15.178 13.2927 16 12.2787 16H9.65574C8.64171 16 7.81967 15.178 7.81967 14.1639V13.6393ZM9.65574 13.377C9.51088 13.377 9.39344 13.4945 9.39344 13.6393V14.1639C9.39344 14.3088 9.51088 14.4262 9.65574 14.4262H12.2787C12.4235 14.4262 12.541 14.3088 12.541 14.1639V13.6393C12.541 13.4945 12.4235 13.377 12.2787 13.377H9.65574Z" fill="#000000"></path> </g></svg><span>Clase</span></a></li>
                        </ul>
                    </li>
                    <li><a href="listadocente.php"><svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M 16 3 C 14.742188 3 13.847656 3.890625 13.40625 5 L 6 5 L 6 28 L 26 28 L 26 5 L 18.59375 5 C 18.152344 3.890625 17.257813 3 16 3 Z M 16 5 C 16.554688 5 17 5.445313 17 6 L 17 7 L 20 7 L 20 9 L 12 9 L 12 7 L 15 7 L 15 6 C 15 5.445313 15.445313 5 16 5 Z M 8 7 L 10 7 L 10 11 L 22 11 L 22 7 L 24 7 L 24 26 L 8 26 Z M 15 14 L 15 17 L 12 17 L 12 19 L 15 19 L 15 22 L 17 22 L 17 19 L 20 19 L 20 17 L 17 17 L 17 14 Z"></path></g></svg><span>Lista Docente</span></a></li>
                    <?php
                    }
                    ?>
                    
                    <li id="about-button"><a href="#" id="aboutus" class="aboutus">About Us</a></li>
                    <li><a href="php/cerrar.php" id="cerrar-boton">Cerrar Sesión</a></li>
                </ul>
        </aside>

        <main class="content">
