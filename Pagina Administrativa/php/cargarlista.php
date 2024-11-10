<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        include("../../BD/conexionbd.php");

        $idclase = $_POST['ID_Clase'];
        $sql = "SELECT A.ID_Alumno, A.Nombre, AC.Asistio FROM alumnos_clase AC
                JOIN alumnos A ON AC.ID_Alumno = A.ID_Alumno
                WHERE AC.ID_Clase = '$idclase' AND AC.Fecha = curdate() AND AC.Asistio IS NOT NULL";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_num_rows($resultado) > 0) {
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
            $query = "SELECT A.ID_Alumno, A.Nombre FROM alumnos A
                JOIN alumnos_clase AC ON A.ID_Alumno = AC.ID_Alumno
                WHERE AC.ID_Clase = $idclase AND A.estado = 1 AND AC.Estado = 1 AND AC.Asistio IS NULL";

            $resultado = mysqli_query($conexion, $query);
            if($resultado) {
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
    } else {
        header("Location: ../../");
    }
?>
