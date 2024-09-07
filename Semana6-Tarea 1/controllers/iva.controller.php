<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

//TODO: controlador de IVA

require_once('../models/iva.model.php');
error_reporting(0);

$iva = new IVA;

    // idIVA, Detalle, Estado, Valor

switch ($_GET["op"]) {
    case 'todos': // Procedimiento para cargar todos los IVA
        $datos = array();
        $datos = $iva->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todas[] = $row;
        }
        echo json_encode($todas);
        break;
    case 'uno': // Procedimiento para obtener un IVA por ID
        if (!isset($_POST["idIVA"])) {
            echo json_encode(["error" => "IVA ID not specified."]);
            exit();
        }
        $idIVA = intval($_POST["idIVA"]);
        $datos = array();
        $datos = $iva->uno($idIVA);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
}


