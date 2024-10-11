<?php
include("../../BD/conexionbd.php");

$fecha = $_GET['fecha'];
$id_clase = $_GET['idclase'];

$query = "SELECT a.ID_Alumno, a.Nombre, ac.Asistio FROM alumnos_clase ac
          JOIN alumnos a ON ac.ID_Alumno = a.ID_Alumno
          WHERE ac.ID_Clase = '$id_clase' AND ac.Fecha = '$fecha' AND ac.Asistio IS NOT NULL"; 
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        // Si el alumno faltó (Asistio = 0), el checkbox estará marcado
        $asistio = $row['Asistio'] == 0 ? 'checked' : ''; 

        echo "<tr>
                <td>{$row['Nombre']}</td>
                <td>
                    <input type='hidden' name='asistencia[{$row['ID_Alumno']}]' value='1'>
                    <input type='checkbox' name='asistencia[{$row['ID_Alumno']}]' value='0' {$asistio}>
                </td>
              </tr>";
    }
} else {
    echo "Error en la consulta: " . $conexion->error;
}
?>
