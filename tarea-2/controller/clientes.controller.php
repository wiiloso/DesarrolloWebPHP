<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once('../models/clientes.model.php');
$clientes = new Clientes;

switch ($_GET['op']) {
    case 'clientesAll':
        $data = $clientes->clientesAll();
        echo json_encode($data);
        break;
    case 'createCliente':
        $data = $clientes->createCliente($_POST['Nombres'], $_POST['Direccion'], $_POST['Telefono'], $_POST['Cedula'], $_POST['Correo']);
        echo json_encode($data);
        break;
    case 'updateCliente':
        $data = $clientes->updateCliente($_POST['idClientes'], $_POST['Nombres'], $_POST['Direccion'], $_POST['Telefono'], $_POST['Cedula'], $_POST['Correo']);
        echo json_encode($data);
        break;
    case 'deleteCliente':
        $data = $clientes->deleteCliente($_POST['idClientes']);
        echo json_encode($data);
        break;
    case 'obtenerClientebyId':
        $id = $_POST['id'];
        $data = $clientes->obtenerClientebyId($id);
        echo json_encode($data);
        // $data = $clientes->obtenerClientebyId($_GET['id']);
        break;
    default:
        echo 'No se ha seleccionado ninguna acción';
        break;
}