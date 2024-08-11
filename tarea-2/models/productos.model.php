<?php 
require_once('../config/config.php');
class Productos {
    
    public function ProductosAll() {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM productos";
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

    public function obtenerProductobyId($id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM productos WHERE idProductos = '".$id."'";
            $result = mysqli_query($conexion, $sql);
            $data =$result->fetch_assoc();
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function createProducto($Codigo_Barras, $Nombre_Producto, $Graba_IVA) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "INSERT INTO productos (Codigo_Barras, Nombre_Producto, Graba_IVA) VALUES ('$Codigo_Barras', '$Nombre_Producto', '$Graba_IVA')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateProducto($idProductos, $Codigo_Barras, $Nombre_Producto, $Graba_IVA) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "UPDATE productos SET Codigo_Barras = '$Codigo_Barras', Nombre_Producto = '$Nombre_Producto', Graba_IVA = '$Graba_IVA' WHERE idProductos = '".$idProductos."'";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteProducto($idProductos) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "DELETE FROM productos WHERE idProductos = '".$idProductos."'";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}