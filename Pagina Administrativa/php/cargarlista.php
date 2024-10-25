<?php
include("../../BD/conexionbd.php");

$idclase = $_POST['ID_Clase'];
$sql = "SELECT a.ID_Alumno, a.Nombre, ac.Asistio FROM alumnos_clase ac
          JOIN alumnos a ON ac.ID_Alumno = a.ID_Alumno
          WHERE ac.ID_Clase = '$idclase' AND ac.Fecha = curdate() AND ac.Asistio IS NOT NULL";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_num_rows($resultado) > 0){
    echo "<input type='hidden' name='actualizando' value='true'>";
    while($row = mysqli_fetch_assoc($resultado)){
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
    echo "<input type='hidden' name='actualizando' value='false'>";
    $query = "SELECT a.ID_Alumno, a.Nombre FROM alumnos a
          JOIN alumnos_clase ac ON a.ID_Alumno = ac.ID_Alumno
          WHERE ac.ID_Clase = $idclase AND a.estado = 1 AND ac.Estado=1 AND ac.Asistio IS NULL";

    $resultado = mysqli_query($conexion, $query);
    if($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>
                    <td>{$row['Nombre']}</td>
                    <td>
                        <input type='hidden' name='asistencia[{$row['ID_Alumno']}]' value='1'>
                        <input type='checkbox' name='asistencia[{$row['ID_Alumno']}]' value='0'>
                    </td>
                </tr>";
        }
    } else {
        echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
    }
}

// Consultar los alumnos que aún no tienen asistencia para la clase actual

?>
