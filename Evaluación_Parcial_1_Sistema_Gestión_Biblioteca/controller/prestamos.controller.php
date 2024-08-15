<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once('../models/prestamos.model.php');

$prestamos = new Prestamos;
    // prestamo_id, fechaprestamo, fechadevolucion, libro_id, miembro_id, estadopres_id

switch ($_GET['op']) {
    case 'prestamosAll':
        $data = $prestamos->prestamosAll();
        echo json_encode($data);
        break;
    case 'createPrestamo':
        $data = $prestamos->createPrestamo($_POST['fechaprestamo'], $_POST['fechadevolucion'], $_POST['libro_id'], $_POST['miembro_id'], $_POST['estadopres_id']);
        echo json_encode($data);
        break;
    case 'updatePrestamo':
        $data = $prestamos->updatePrestamo($_POST['prestamo_id'], $_POST['fechaprestamo'], $_POST['fechadevolucion'], $_POST['libro_id'], $_POST['miembro_id'], $_POST['estadopres_id']);
        echo json_encode($data);
        break;
    case 'deletePrestamo':
        $data = $prestamos->deletePrestamo($_POST['prestamo_id']);
        echo json_encode($data);
        break;
    case 'obtenerPrestamobyId':
        $id = $_POST['id'];
        $data = $prestamos->obtenerPrestamobyId($id);
        echo json_encode($data);
        break;
    default:
        echo 'No se ha seleccionado ninguna acción';
        break;
}

