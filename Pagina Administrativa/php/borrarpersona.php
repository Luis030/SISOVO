<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once("../../BD/conexionbd.php");
    if($_POST['p'] == "alumno"){
        $IDalumno = $_POST['id'];
        if($_POST['t'] == "borrar"){
            if($IDalumno){
                $sql = "UPDATE alumnos SET Estado = 0 WHERE ID_Alumno = $IDalumno;";
                if(mysqli_query($conexion, $sql) === TRUE){
                    $sql = "UPDATE patologia_alumno SET Estado = 0 WHERE ID_Alumno = $IDalumno;";
                    if(mysqli_query($conexion, $sql) == TRUE){
                        $sql = "SELECT ID_Usuario FROM alumnos WHERE ID_Alumno = $IDalumno;";
                        $resultado = mysqli_query($conexion, $sql);
                        while($fila = mysqli_fetch_assoc($resultado)){
                            $iduser = $fila['ID_Usuario'];
                        }
                        $sql = "UPDATE usuarios SET Estado = 0 WHERE ID_Usuario = $iduser;";
                        if(mysqli_query($conexion, $sql) == TRUE){
                            $sql = "UPDATE alumnos_clase SET Estado = 0 WHERE ID_Alumno = $IDalumno;";
                            if(mysqli_query($conexion, $sql) == TRUE){
                                echo json_encode([
                                    "Resultado" => "exitoso",
                                    "IDAlumno" => $IDalumno
                                ]);
                                exit;
                            }
                        }
                    }
                } else {
                    echo json_encode([
                        "Resultado" => "error",
                        "IDAlumno" => $IDalumno
                    ]);
                    exit;
                }
            }
        }
    } 
    if($_POST['p'] == "docente"){
        $IDdocente = $_POST['id'];
        if($_POST['t'] == "verificar"){
            $sql = "SELECT *
                    FROM clase
                    WHERE ID_Docente = $IDdocente AND Estado=1";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultado) > 0){
                echo json_encode([
                    "borrar" => "imposible",
                    "docente" => $IDdocente
                ]);
                exit;
            } else {
                echo json_encode([
                    "borrar" => "posible",
                    "docente" => $IDdocente
                ]);
                exit;
            }
        }
        if($_POST['t'] == "borrar"){
            $sql = "UPDATE docentes SET Estado=0 WHERE ID_Docente=$IDdocente";
            $result1 = mysqli_query($conexion, $sql);
            $sql = "SELECT ID_Usuario FROM docentes WHERE ID_Docente=$IDdocente;";
                $resultado = mysqli_query($conexion, $sql);
                while($fila = mysqli_fetch_assoc($resultado)){
                    $iduser = $fila['ID_Usuario'];
                }
            $sql = "UPDATE usuarios SET Estado=0 WHERE ID_Usuario=$iduser";
            $result2 = mysqli_query($conexion, $sql);
            if($result1 == TRUE && $result2 == TRUE){
                $sql = "UPDATE especializacion_docente SET Estado=0 WHERE ID_Docente=$IDdocente;";
                if(mysqli_query($conexion, $sql) == TRUE){
                    echo json_encode([
                        "resultado" => "exito",
                        "id" => $IDdocente
                    ]);
                }
            } else {
                echo json_encode([
                    "resultado" => "error"
                ]);
            }
        }
    }
} else {
    header("Location: ../../");
}
?>