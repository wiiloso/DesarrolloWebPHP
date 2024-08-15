<?php 
require_once('../config/config.php');
class Libros {

    public function librosAll() {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM libros";
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

    public function obtenerLibrobyId($id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM libros WHERE libro_id = $id";
            $result = mysqli_query($conexion, $sql);
            $data =$result->fetch_assoc(); 
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function createLibro($titulo, $autor, $genero, $anio_publicacion) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "INSERT INTO libros (titulo, autor, genero, anio_publicacion) VALUES ('$titulo', '$autor', '$genero', '$anio_publicacion')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateLibro($libro_id, $titulo, $autor, $genero, $anio_publicacion) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "UPDATE libros SET titulo = '$titulo', autor = '$autor', genero = '$genero', anio_publicacion = '$anio_publicacion' WHERE libro_id = $libro_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteLibro($libro_id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "DELETE FROM libros WHERE libro_id = $libro_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}