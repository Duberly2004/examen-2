<?php 
include('../db.php');
include('../DAO/ProductoDAO.php');

if (isset($_POST['guardar_producto'])) {
    $producto = new ProductoDAO();
    $producto->setNombre($_POST['Nombre']);
    $producto->setDescripcion($_POST['Descripcion']);
    $producto->setStock($_POST['Stock']);
    $producto->setPrecioVenta($_POST['PrecioVenta']);

    if (!$producto->create()) {
        echo 'Error al crear producto :c';
    }

    $_SESSION['message'] = 'Producto registrado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: read.php');
}

?>