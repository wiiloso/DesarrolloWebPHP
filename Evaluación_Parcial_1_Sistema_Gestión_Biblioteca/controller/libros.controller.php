<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once('../models/libros.model.php');

$libros = new Libros;

switch ($_GET['op']) {
    case 'librosAll':
        $data = $libros->librosAll();
        echo json_encode($data);
        break;
    case 'createLibro':
        $data = $libros->createLibro($_POST['titulo'], $_POST['autor'], $_POST['genero'], $_POST['anio_publicacion']);
        // libro_id, titulo, autor, genero, anio_publicacion
        echo json_encode($data);
        break;
    case 'updateLibro':
        $data = $libros->updateLibro($_POST['libro_id'], $_POST['titulo'], $_POST['autor'], $_POST['genero'], $_POST['anio_publicacion']);
        echo json_encode($data);
        break;
    case 'deleteLibro':
        $data = $libros->deleteLibro($_POST['libro_id']);
        echo json_encode($data);
        break;
    case 'obtenerLibrobyId':
        $id = $_POST['id'];
        $data = $libros->obtenerLibrobyId($id);
        echo json_encode($data);
        break;
    default:
        echo 'No se ha seleccionado ninguna acción';
        break;
}