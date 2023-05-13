<?php
include('../db.php');
include('../DAO/ProductoDAO.php');
$producto = new ProductoDAO();

if (isset($_GET['IdProducto'])){
    // SELECCIONAR LOS CAMPOS EN BASE AL ID QUE RECIBIMOS

    $result_productos = $producto->getProducto($_GET['IdProducto']);
    
    if (mysqli_num_rows($result_productos) >=1){
        
        while($p = mysqli_fetch_array($result_productos)) {
           $nombre = $p['Nombre'];
           $descripcion = $p['Descripcion'];
           $stock = $p['Stock'];
           $precioVenta = $p['PrecioVenta'];
        }
    }
}

// NOW WE UPDATE

if (isset($_POST['editar_producto'])){
    $producto->setNombre($_POST['Nombre']);
    $producto->setDescripcion($_POST['Descripcion']);
    $producto->setStock($_POST['Stock']);
    $producto->setPrecioVenta($_POST['PrecioVenta']);

    $result = $producto->update($_GET['IdProducto']);
    if(!$result){
        $_SESSION['message'] = 'Error al actualizar producto';
    }else{
        $_SESSION['message'] = 'Producto actualizado correctamente';
        $_SESSION['message_type'] = 'success';
    }
    header('location:read.php');
}
?>

<?php include('../include/header.php')?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-xl-4 mx-auto">
            <div class="card card-body">

                <form action="update.php?IdProducto=<?php echo $_GET['IdProducto']?>" method="POST">
                    <!-- UPDATE NOMBRE -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="Nombre" type="text" value='<?php echo $nombre?>' placeholder="Editar Nombre" autofocus required>
                    </div>
                    <!-- UPDATE DESCRIPCION -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="Descripcion" type="text" value='<?php echo $descripcion?>' placeholder="Editar Descripción" required >
                    </div>
                    <!-- UPDATE STOCK -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="Stock" type="text" value='<?php echo $stock?>' placeholder="Editar Stock" required>
                    </div>
                    <!-- UPDATE PRECIO VENTA -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="PrecioVenta" type="text" value='<?php echo $precioVenta?>' placeholder="Editar Precio de Venta" >
                    </div>
                    <div class="form-group mb-3 d-flex justify-content-center flex-wrap gap-2">
                        <a href="productos.php"><input type="button" class="btn btn-primary " value="Cancelar"></a>
                        <input type="submit" class="btn btn-success" name="editar_producto" value="Guardar Cambios">
                    </div> 
                </form>

            </div>
        </div>
    </div>
</div>
<?php include('../include/footer.php')?>
