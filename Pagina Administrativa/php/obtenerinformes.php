<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once("../../BD/conexionbd.php");

    if (isset($_POST['docente'])) {
        $id = $_POST['id'];

        $sql = "SELECT A.ID_Alumno, I.ID_Informe, Titulo, DATE_FORMAT(Fecha, '%d/%m/%Y') AS Fecha, CONCAT(A.Nombre, ' ', A.Apellido) AS Alumno, A.Cedula
        FROM informes I 
        JOIN alumnos A ON A.ID_Alumno = I.ID_Alumno 
        WHERE ID_Docente = $id AND I.Estado = 1 
        ORDER BY I.Fecha ASC";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($filas);
        } else {
            echo json_encode([]);
        }

        exit;
    }

    $sql = "SELECT D.ID_Docente, A.ID_Alumno, I.ID_Informe, CONCAT(A.Nombre, ' ', A.Apellido) AS Alumno, CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, Titulo, DATE_FORMAT(Fecha, '%d/%m/%Y') AS Fecha, A.Cedula 
    FROM docentes D 
    JOIN informes I on I.ID_Docente = D.ID_Docente 
    JOIN alumnos A on I.ID_Alumno = A.ID_Alumno 
    WHERE I.Estado = 1 
    ORDER BY I.Fecha ASC";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($filas);
    } else {
        echo json_encode([]);
    }
    
} else {
    header("Location: ../../");
}
?>