<?php 
require_once('../config/config.php');
class Clientes {
    
    public function clientesAll() {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM clientes";
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

    public function obtenerClientebyId($id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM clientes WHERE idClientes = $id";
            $result = mysqli_query($conexion, $sql);
            $data =$result->fetch_assoc(); 
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function createCliente($Nombres, $Direccion, $Telefono, $Cedula, $Correo) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "INSERT INTO clientes (Nombres, Direccion, Telefono, Cedula, Correo) VALUES ('$Nombres', '$Direccion', '$Telefono', '$Cedula', '$Correo')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateCliente($idClientes, $Nombres, $Direccion, $Telefono, $Cedula, $Correo) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "UPDATE clientes SET Nombres = '$Nombres', Direccion = '$Direccion', Telefono = '$Telefono', Cedula = '$Cedula', Correo = '$Correo' WHERE idClientes = $idClientes";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteCliente($idClientes) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "DELETE FROM clientes WHERE idClientes = $idClientes";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}