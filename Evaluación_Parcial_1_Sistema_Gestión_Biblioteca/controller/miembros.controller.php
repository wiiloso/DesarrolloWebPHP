<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once('../models/miembros.model.php');
$miembros = new Miembros;

// miembro_id, nombre, apellido, email, fecha_suscripcion
switch ($_GET['op']) {
    case 'miembrosAll':
        $data = $miembros->miembrosAll();
        echo json_encode($data);
        break;
    case 'createMiembro':
        $data = $miembros->createMiembro($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['fecha_suscripcion']);
        echo json_encode($data);
        break;
    case 'updateMiembro':
        $data = $miembros->updateMiembro($_POST['miembro_id'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['fecha_suscripcion']);
        echo json_encode($data);
        break;
    case 'deleteMiembro':
        $data = $miembros->deleteMiembro($_POST['miembro_id']);
        echo json_encode($data);
        break;
    case 'obtenerMiembrobyId':
        $id = $_POST['id'];
        $data = $miembros->obtenerMiembrobyId($id);
        echo json_encode($data);
        break;
    default:
        echo 'No se ha seleccionado ninguna acción';
        break;
}