<?php 
require_once('../config/config.php');

class Estudiantes {
    // estudiante_id, nombre, apellido, fecha_nacimiento, grado, estado
    public function estudiantesAll() {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM estudiantes";
            $result = mysqli_query($conexion, $sql);
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }   
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtenerEstudiantebyId($id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM estudiantes WHERE estudiante_id = $id";
            $result = mysqli_query($conexion, $sql);
            $data =$result->fetch_assoc(); 
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function createEstudiante($nombre, $apellido, $fecha_nacimiento, $grado, $estado) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "INSERT INTO estudiantes (nombre, apellido, fecha_nacimiento, grado, estado) VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$grado', '$estado')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateEstudiante($estudiante_id, $nombre, $apellido, $fecha_nacimiento, $grado, $estado) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "UPDATE estudiantes SET nombre = '$nombre', apellido = '$apellido', fecha_nacimiento = '$fecha_nacimiento', grado = '$grado', estado = '$estado' WHERE estudiante_id = $estudiante_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteEstudiante($estudiante_id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "DELETE FROM estudiantes WHERE estudiante_id = $estudiante_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}