<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../../BD/conexionbd.php"); 

    if($_POST['opcion'] == "editar") {
        if($_POST['tipo'] == "pat") {
            $id = $_POST['id'];
            $nuevonombre = $_POST['nombre'];
            $sql = "SELECT * FROM patologias WHERE Nombre='$nuevonombre'";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultado) > 0){
                echo json_encode([
                    "resultado" => "agregado",
                    "nombre" => $nuevonombre
                ]);
                exit;
            } else {
                $sql = "UPDATE patologias SET Nombre='$nuevonombre' WHERE ID_Patologia=$id";
                if(mysqli_query($conexion, $sql) == TRUE){
                    echo json_encode([
                        "resultado" => "exito",
                        "nombre" => $nuevonombre
                    ]);
                    exit;
                }
            }
        }

        if($_POST['tipo'] == "ocu") {
            $id = $_POST['id'];
            $nuevonombre = $_POST['nombre'];
            $sql = "SELECT * FROM ocupacion WHERE Nombre='$nuevonombre'";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultado) > 0){
                echo json_encode([
                    "resultado" => "agregado",
                    "nombre" => $nuevonombre
                ]);
                exit;
            } else {
                $sql = "UPDATE ocupacion SET Nombre='$nuevonombre' WHERE ID_Ocupacion=$id";
                if(mysqli_query($conexion, $sql) == TRUE){
                    echo json_encode([
                        "resultado" => "exito",
                        "nombre" => $nuevonombre
                    ]);
                    exit;
                }
            }
        }

        if($_POST['tipo'] == "esp") {
            $id = $_POST['id'];
            $nuevonombre = $_POST['nombre'];
            $sql = "SELECT * FROM especializaciones WHERE Nombre='$nuevonombre'";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultado) > 0){
                echo json_encode([
                    "resultado" => "agregado",
                    "nombre" => $nuevonombre
                ]);
                exit;
            } else {
                $sql = "UPDATE especializaciones SET Nombre='$nuevonombre' WHERE ID_Especializacion=$id";
                if(mysqli_query($conexion, $sql) == TRUE){
                    echo json_encode([
                        "resultado" => "exito",
                        "nombre" => $nuevonombre
                    ]);
                    exit;
                }
            }
        }
    }

    if($_POST['opcion'] == "borrar") {
        if($_POST['tipo'] == "pat") {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $sql = "SELECT P.Nombre, COUNT(PA.ID_Alumno) AS Cantidad, P.ID_Patologia 
                    FROM patologias P 
                    JOIN patologia_alumno PA ON P.ID_Patologia = PA.ID_Patologia AND PA.Estado = 1 
                    JOIN alumnos A on PA.ID_Alumno = A.ID_Alumno AND A.Estado = 1 
                    WHERE P.ID_Patologia = $id 
                    GROUP by 1";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultado) > 0) {
                if (isset($_POST['borrarigual'])) {
                    $sql = "UPDATE patologias SET Estado = 0 WHERE ID_Patologia = $id";
                    $resultado = mysqli_query($conexion, $sql);
                    $sql2 = "UPDATE patologia_alumno SET Estado = 0 WHERE ID_Patologia = $id";
                    $resultado2 = mysqli_query($conexion, $sql2);
                    if ($resultado === TRUE && $resultado2 === TRUE) {
                        echo json_encode([
                            "seborro" => "si",
                            "nombre" => $nombre
                        ]);
                    }
                } else {
                    echo json_encode([
                        "resultado" => "imposible",
                        "nombre" => $nombre
                    ]);
                }
                exit;
            } else {
                if($_POST['eliminar'] == "true") {
                    $sql = "UPDATE patologias SET Estado = 0 WHERE ID_Patologia = $id";
                    if(mysqli_query($conexion, $sql) == TRUE) {
                        echo json_encode([
                            "resultado" => "exito",
                            "nombre" => $nombre
                        ]);
                        exit;
                    }
                } else {
                    echo json_encode([
                        "resultado" => "posible",
                        "nombre" => $nombre
                    ]);
                    exit;
                }
            }
        }

        if($_POST['tipo'] == "ocu") {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $sql = "SELECT O.Nombre, COUNT(ED.ID_Especializacion) AS Cantidad FROM especializacion_docente ED, especializaciones E, ocupacion O WHERE ED.ID_Especializacion=E.ID_Especializacion AND O.ID_Ocupacion=E.ID_Ocupacion AND O.Estado=1 AND E.Estado=1 AND ED.Estado=1 AND O.ID_Ocupacion=$id GROUP BY 1;";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultado) > 0){
                echo json_encode([
                    "resultado" => "imposible",
                    "nombre" => $nombre
                ]);
                exit;
            } else {
                if($_POST['eliminar'] == "true"){
                    $sql = "UPDATE ocupacion SET Estado=0 WHERE ID_Ocupacion=$id";
                    if(mysqli_query($conexion, $sql) == TRUE){
                        echo json_encode([
                            "resultado" => "exito",
                            "nombre" => $nombre
                        ]);
                        exit;
                    }
                } else {
                    echo json_encode([
                        "resultado" => "posible",
                        "nombre" => $nombre
                    ]);
                    exit;
                }
            }
        }

        if($_POST['tipo'] == "esp") {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $sql = "SELECT E.Nombre, COUNT(*) AS Cantidad FROM especializaciones E join especializacion_docente ED on E.ID_Especializacion=ED.ID_Especializacion AND E.Estado=1 join docentes D on D.ID_Docente=ED.ID_Docente AND D.Estado=1 WHERE E.Estado=1 AND E.Nombre='$nombre' GROUP BY 1;";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultado) > 0){
                echo json_encode([
                    "resultado" => "imposible",
                    "nombre" => $nombre
                ]);
                exit;
            } else {
                if($_POST['eliminar'] == "true") {
                    $sql = "UPDATE especializaciones SET Estado=0 WHERE ID_Especializacion=$id";
                    if(mysqli_query($conexion, $sql) == TRUE){
                        echo json_encode([
                            "resultado" => "exito",
                            "nombre" => $nombre
                        ]);
                        exit;
                    }
                } else {
                    echo json_encode([
                        "resultado" => "posible",
                        "nombre" => $nombre
                    ]);
                    exit;
                }
            }
        }
    }
}
?>