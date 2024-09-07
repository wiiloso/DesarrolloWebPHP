<?php
// TODO: Clase de IVA
require_once('../config/config.php');

class IVA {
    // idIVA, Detalle, Estado, Valor

    public function todos() // select * from iva
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `iva`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idIVA) // select * from iva where idIVA = $idIVA
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `iva` WHERE `idIVA` = $idIVA";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
}