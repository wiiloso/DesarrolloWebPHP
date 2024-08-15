<?php 
require_once('../config/config.php');

class Prestamos{

    // prestamo_id, fechaprestamo, fechadevolucion, libro_id, miembro_id, estadopres_id

    public function prestamosAll() {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            // $sql = "SELECT * FROM prestamos";
            $sql = "select pr.fechaprestamo, pr.fechadevolucion, li.titulo, mi.nombre, es.descripcion  from prestamos pr
                    inner join libros li on pr.prestamo_id = li.libro_id
                    inner join miembros mi on pr.miembro_id = mi.miembro_id
                    inner join estadoslibro es on pr.estadopres_id = es.estadopres_id";
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

    public function obtenerPrestamobyId($id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            // $sql = "SELECT * FROM prestamos WHERE prestamo_id = $id";  
            $sql = "select pr.fechaprestamo, pr.fechadevolucion, li.titulo, mi.nombre, es.descripcion  from prestamos pr
                    inner join libros li on pr.prestamo_id = li.libro_id
                    inner join miembros mi on pr.miembro_id = mi.miembro_id
                    inner join estadoslibro es on pr.estadopres_id = es.estadopres_id WHERE prestamo_id = $id";
            $result = mysqli_query($conexion, $sql);
            $data =$result->fetch_assoc(); 
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function createPrestamo($fechaprestamo, $fechadevolucion, $libro_id, $miembro_id, $estadopres_id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "INSERT INTO prestamos (fechaprestamo, fechadevolucion, libro_id, miembro_id, estadopres_id) VALUES ('$fechaprestamo', '$fechadevolucion', '$libro_id', '$miembro_id', '$estadopres_id')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updatePrestamo($prestamo_id, $fechaprestamo, $fechadevolucion, $libro_id, $miembro_id, $estadopres_id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "UPDATE prestamos SET fechaprestamo = '$fechaprestamo', fechadevolucion = '$fechadevolucion', libro_id = '$libro_id', miembro_id = '$miembro_id', estadopres_id = '$estadopres_id' WHERE prestamo_id = $prestamo_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deletePrestamo($prestamo_id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "DELETE FROM prestamos WHERE prestamo_id = $prestamo_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
