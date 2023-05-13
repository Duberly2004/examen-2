<?php
include('../db.php');
include('../DAO/ProductoDAO.php');

if(isset($_GET['IdProducto'])){
    $producto = new ProductoDAO();
    $result = $producto->delete($_GET['IdProducto']);
    if(!$result){
        die('Error al eliminar producto');
    }
    $_SESSION['message'] = 'Producto eliminado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: read.php');
}

?>