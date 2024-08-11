<?php

require_once('../config/config.php');

class Proveedores {
    
    public function ProveedoresAll() {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM proveedores";
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

    public function obtenerProveedorbyId($id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM proveedores WHERE idProveedores = '".$id."'";
            $result = mysqli_query($conexion, $sql);
            $data =$result->fetch_assoc();
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }   

    public function createProveedor($Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();       
            $sql = "INSERT INTO proveedores (Nombre_Empresa, Direccion, Telefono, Contacto_Empresa,Teleofno_Contacto) VALUES ('$Nombre_Empresa', '$Direccion', '$Telefono', '$Contacto_Empresa', '$Teleofno_Contacto')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateProveedor($idProveedores, $Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "UPDATE proveedores SET Nombre_Empresa = '$Nombre_Empresa', Direccion = '$Direccion', Telefono = '$Telefono', Contacto_Empresa = '$Contacto_Empresa', Teleofno_Contacto = '$Teleofno_Contacto' WHERE idProveedores = $idProveedores";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteProveedor($idProveedores) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "DELETE FROM proveedores WHERE idProveedores = $idProveedores";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}