<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once('../models/estudiantes.model.php');

$estudiantes = new Estudiantes;

switch ($_GET['op']) {
    case 'estudiantesAll':
        $data = $estudiantes->estudiantesAll();
        echo json_encode($data);
        break;
    case 'createEstudiante':
        $data = $estudiantes->createEstudiante($_POST['nombre'], $_POST['apellido'], $_POST['fecha_nacimiento'], $_POST['grado'], $_POST['estado']);
        // estudiante_id, nombre, apellido, fecha_nacimiento, grado, estado
        echo json_encode($data);
        break;
    case 'updateEstudiante':
        $data = $estudiantes->updateEstudiante($_POST['estudiante_id'], $_POST['nombre'], $_POST['apellido'], $_POST['fecha_nacimiento'], $_POST['grado'], $_POST['estado']);
        echo json_encode($data);
        break;
    case 'deleteEstudiante':
        $data = $estudiantes->deleteEstudiante($_POST['estudiante_id']);
        echo json_encode($data);
        break;
    case 'obtenerEstudiantebyId':
        $id = $_POST['id'];
        $data = $estudiantes->obtenerEstudiantebyId($id);
        echo json_encode($data);
        break;
    default:
        echo 'No se ha seleccionado ninguna acción';
        break;
}

