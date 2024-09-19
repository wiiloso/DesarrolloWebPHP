<?php 
require_once('../config/config.php');

class Profesores {
    // profesor_id, nombre, apellido, especialidad, email, estado

    public function profesoresAll() {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM profesores";
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

    public function obtenerProfesorbyId($id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM profesores WHERE profesor_id = $id";
            $result = mysqli_query($conexion, $sql);
            $data =$result->fetch_assoc(); 
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function createProfesor($nombre, $apellido, $especialidad, $email, $estado) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "INSERT INTO profesores (nombre, apellido, especialidad, email, estado) VALUES ('$nombre', '$apellido', '$especialidad', '$email', '$estado')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateProfesor($profesor_id, $nombre, $apellido, $especialidad, $email, $estado) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "UPDATE profesores SET nombre = '$nombre', apellido = '$apellido', especialidad = '$especialidad', email = '$email', estado = '$estado' WHERE profesor_id = $profesor_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteProfesor($profesor_id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "DELETE FROM profesores WHERE profesor_id = $profesor_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}