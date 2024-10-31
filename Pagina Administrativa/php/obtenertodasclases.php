<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once("../../BD/conexionbd.php");

    header('Content-Type: application/json');  
    if(isset($_POST['docente'])){
        $ceduladoc = $_POST['docente'];
        $sql = "SELECT 
        C.ID_Clase, D.ID_Docente,
        C.Nombre,
        CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, 
        C.Horario AS Horarios, 
        COUNT(AC.ID_Alumno) AS Cantidad_Alumnos
    FROM 
        clase C
    JOIN 
        docentes D ON C.ID_Docente = D.ID_Docente
    LEFT JOIN 
        alumnos_clase AC ON C.ID_Clase = AC.ID_Clase 
        AND AC.Estado = 1 
        AND AC.Asistio IS NULL 
    
    WHERE 
        C.Estado = 1
        AND D.Cedula=$ceduladoc
    GROUP BY 
        C.ID_Clase; 
    ";
    } else {
        $sql = "SELECT 
    C.ID_Clase, D.ID_Docente,
    C.Nombre, 
    CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, 
    C.Horario AS Horarios, 
    COUNT(CASE WHEN A.Estado = 1 THEN AC.ID_Alumno END) AS Cantidad_Alumnos
    FROM 
        clase C
    JOIN 
        docentes D ON C.ID_Docente = D.ID_Docente
    LEFT JOIN 
        alumnos_clase AC ON C.ID_Clase = AC.ID_Clase 
        AND AC.Estado = 1 
        AND AC.Asistio IS NULL 
    LEFT JOIN 
        alumnos A ON AC.ID_Alumno = A.ID_Alumno
    WHERE 
        C.Estado = 1
    GROUP BY 
        C.ID_Clase;";

    }

    $resultado = mysqli_query($conexion, $sql);

    $clases = array();
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $clases[] = $fila;
        }
    } else {
        $data = [];
        echo json_encode($data);
    }

    // Verificar si hay algún error al convertir a JSON
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Error al convertir a JSON']);
    } else {
        echo json_encode($clases);
    }

    mysqli_close($conexion);  
} else {
    header("Location: ../../");
}
?>
