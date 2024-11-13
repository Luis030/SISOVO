<?php
    require_once("../../BD/conexionbd.php");
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['filtrado'])) {
            if($_POST['filtrado'] == true) {
                $maxedad = isset($_POST['valemax']) ? $_POST['valemax'] : '';
                $minedad = isset($_POST['valemin']) ? $_POST['valemin'] : '';
                $patologia = isset($_POST['patologia']) ? $_POST['patologia'] : '';
                $consultabase = "
                SELECT DISTINCT A.ID_Alumno, A.ID_Usuario, A.Nombre, A.Apellido, A.Cedula,
                                TIMESTAMPDIFF(YEAR, A.Fecha_Nac, CURDATE()) AS Edad,
                                A.Celular_Padres, U.Correo AS Mail_Padres
                FROM alumnos A
                JOIN usuarios U ON U.ID_Usuario = A.ID_Usuario
                LEFT JOIN patologia_alumno PA ON A.ID_Alumno = PA.ID_Alumno AND PA.Estado = 1
                LEFT JOIN patologias P ON PA.ID_Patologia = P.ID_Patologia
                WHERE A.Estado = 1";
                if ($minedad != '') {
                    $consultabase .= " AND TIMESTAMPDIFF(YEAR, A.Fecha_Nac, CURDATE()) >= " . intval($minedad);
                }
                
                if ($maxedad != '') {
                    $consultabase .= " AND TIMESTAMPDIFF(YEAR, A.Fecha_Nac, CURDATE()) <= " . intval($maxedad);
                }
                
                if (!empty($patologia)) {
                    $consultabase .= " AND P.ID_Patologia = " . intval($patologia);
                }
                
                $resultado = mysqli_query($conexion, $consultabase);

                if(mysqli_num_rows($resultado) > 0) {
                    $filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                    echo json_encode($filas);
                    exit;
                } else {
                    echo json_encode([]);
                    exit;
                }
                exit;
            }
            exit;
        }

        $q = isset($_POST['q']) ? $_POST['q'] : '';
        
        if(isset($_POST['idclase'])) {
            $idclase = $_POST['idclase'];
            $sql = "SELECT A.ID_Alumno, CONCAT(Nombre, ' ', Apellido) AS NombreCompleto FROM alumnos A LEFT JOIN alumnos_clase AC on A.ID_Alumno=AC.ID_Alumno AND AC.ID_Clase=$idclase WHERE (CONCAT(Nombre, ' ', Apellido) LIKE '%$q%' OR Cedula LIKE '%$q%') AND A.Estado = 1 AND AC.ID_Clase is null;";
        } else if(isset($_POST['alumnostabla']) && $_POST['alumnostabla'] == "true") {
            $q = isset($_POST['q']) ? $_POST['q'] : '';
            $sql = "SELECT A.ID_Alumno, A.ID_Usuario, A.Nombre, A.Apellido, A.Cedula, TIMESTAMPDIFF(YEAR, Fecha_Nac, CURDATE()) AS Edad, Celular_Padres, U.Correo AS Mail_Padres, CONCAT(Grado, '°') AS Grado FROM alumnos A JOIN usuarios U ON A.ID_Usuario = U.ID_Usuario WHERE A.Estado = 1";
        } else {
            $q = isset($_POST['q']) ? $_POST['q'] : '';
            $sql = "SELECT ID_Alumno, CONCAT(Nombre, ' ', Apellido) AS NombreCompleto FROM alumnos WHERE (CONCAT(Nombre, ' ', Apellido) LIKE '%$q%' OR Cedula LIKE '%$q%') AND A.Estado = 1 LIMIT 50";
        }

        $resultado = mysqli_query($conexion, $sql);
        $alumnos = [];

        if(mysqli_num_rows($resultado) > 0) {
            while($fila = mysqli_fetch_assoc($resultado)) {
                $alumnos[] = $fila; 
            }
        }
        echo json_encode($alumnos); 
    } else {
        header("Location: ../../");
    }
?>
