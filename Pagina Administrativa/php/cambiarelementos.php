<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../../BD/conexionbd.php"); 
    if($_POST['opcion'] == "editar"){
        if($_POST['tipo'] == "pat"){
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
    }

    if($_POST['opcion'] == "borrar"){
        if($_POST['tipo'] == "pat"){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $sql = "SELECT P.Nombre, COUNT(PA.ID_Alumno) AS Cantidad, P.ID_Patologia from patologias p join patologia_alumno pa on p.ID_Patologia=pa.ID_Patologia and pa.Estado=1 join alumnos a on pa.ID_Alumno=a.ID_Alumno and a.Estado=1 where p.ID_Patologia=$id GROUP by 1;";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultado) > 0){
                echo json_encode([
                    "resultado" => "imposible",
                    "nombre" => $nombre
                ]);
                exit;
            } else {
                if($_POST['eliminar'] == "true"){
                    $sql = "UPDATE patologias SET Estado=0 WHERE ID_Patologia=$id";
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