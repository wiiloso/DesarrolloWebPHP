<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once('../models/proveedores.model.php');

$proveedores = new Proveedores;

switch ($_GET['op']) {
    case 'ProveedoresAll':
        $data = $proveedores->ProveedoresAll();
        echo json_encode($data);
        break;
    case 'createProveedor':
        $data = $proveedores->createProveedor($_POST['Nombre_Empresa'], $_POST['Direccion'], $_POST['Telefono'], $_POST['Contacto_Empresa'], $_POST['Teleofno_Contacto']);
        echo json_encode($data);
        break;
    case 'updateProveedor':
        $data = $proveedores->updateProveedor($_POST['idProveedores'], $_POST['Nombre_Empresa'], $_POST['Direccion'], $_POST['Telefono'], $_POST['Contacto_Empresa'], $_POST['Teleofno_Contacto']);
        echo json_encode($data);
        break;
    case 'deleteProveedor':
        $data = $proveedores->deleteProveedor($_POST['idProveedores']);
        echo json_encode($data);
        break;
    case 'obtenerProveedorbyId':
        $id = $_POST['id'];
        $data = $proveedores->obtenerProveedorbyId($id);
         echo json_encode($data);
         break;
    default:
        echo 'No se ha seleccionado ninguna acción';
        break;
}
