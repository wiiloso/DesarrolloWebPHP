<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once('../models/profesores.model.php');

$profesores = new Profesores;

switch ($_GET['op']) {
    case 'profesoresAll':
        $data = $profesores->profesoresAll();
        echo json_encode($data);
        break;
    case 'createProfesor':
        $data = $profesores->createProfesor($_POST['nombre'], $_POST['apellido'], $_POST['especialidad'], $_POST['email'], $_POST['estado']);
        // profesor_id, nombre, apellido, especialidad, email, estado
        echo json_encode($data);
        break;
    case 'updateProfesor':
        $data = $profesores->updateProfesor($_POST['profesor_id'], $_POST['nombre'], $_POST['apellido'], $_POST['especialidad'], $_POST['email'], $_POST['estado']);
        echo json_encode($data);
        break;
    case 'deleteProfesor':
        $data = $profesores->deleteProfesor($_POST['profesor_id']);
        echo json_encode($data);
        break;
    case 'obtenerProfesorbyId':
        $id = $_POST['id'];
        $data = $profesores->obtenerProfesorbyId($id);
        echo json_encode($data);
        break;
    default:
        echo 'No se ha seleccionado ninguna acción';
        break;
}





    
