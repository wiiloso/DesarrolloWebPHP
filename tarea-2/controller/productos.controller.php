<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once('../models/productos.model.php');
$productos = new Productos;
switch ($_GET['op']) {
    case 'ProductosAll':
        $data = $productos->ProductosAll();
        echo json_encode($data);
        break;
    case 'createProducto':
        $data = $productos->createProducto($_POST['Codigo_Barras'], $_POST['Nombre_Producto'], $_POST['Graba_IVA']);
        echo json_encode($data);
        break;
    case 'updateProducto':
        $data = $productos->updateProducto($_POST['idProductos'], $_POST['Codigo_Barras'], $_POST['Nombre_Producto'], $_POST['Graba_IVA']);
        echo json_encode($data);
        break;
    case 'eliminarProducto':
        $data = $productos->deleteProducto($_POST['idProductos']);
        echo json_encode($data);
        break;
    case 'obtenerProductobyId':
        $id = $_POST['id'];
        $data = $productos->obtenerProductobyId($id);
         echo json_encode($data);
        break;
    default:
        echo 'No se ha seleccionado ninguna acción';
        break;
}