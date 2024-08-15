<?php 
require_once('../config/config.php');

// miembro_id, nombre, apellido, email, fecha_suscripcion
class Miembros {
    public function miembrosAll() {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM miembros";
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

    public function obtenerMiembrobyId($id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM miembros WHERE miembro_id = $id";
            $result = mysqli_query($conexion, $sql);
            $data =$result->fetch_assoc(); 
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function createMiembro($nombre, $apellido, $email, $fecha_suscripcion) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "INSERT INTO miembros (nombre, apellido, email, fecha_suscripcion) VALUES ('$nombre', '$apellido', '$email', '$fecha_suscripcion')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateMiembro($miembro_id, $nombre, $apellido, $email, $fecha_suscripcion) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "UPDATE miembros SET nombre = '$nombre', apellido = '$apellido', email = '$email', fecha_suscripcion = '$fecha_suscripcion' WHERE miembro_id = $miembro_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteMiembro($miembro_id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "DELETE FROM miembros WHERE miembro_id = $miembro_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}