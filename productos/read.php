<?php 
include('../include/header.php');
include('../db.php');
include('../DAO/ProductoDAO.php');
?>
<div class="container p-4">
    <?php if(isset($_SESSION['message'])){ ?>

    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset();}?>

    <div class="row d-flex">
        <?php include('../partials/form_search.php');?>

        <div class="col">            
            <table class="table mt-3">
                <thead class="table">
                    <tr>
                        <th class="col">Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Stock</th>
                        <th>Precio Venta</th>
                        <?php include('../partials/modal_add_producto.php');?>
                    </tr>
                </thead>
                <tbody>
                    <div class="text-center">
                        <?php if (isset($_GET['buscar_producto'])) {?>
                            <a class="text-center" href="read.php">Ver todos los Productos</a>
                        <?php }?>
                    </div>
            <!-- IMPRIMIMOS LOS PRODUCTOS -->
            <?php 
            
            $producto = new ProductoDAO();
            if (isset($_GET['buscar_producto'])) {
                $buscar_product = $_GET['buscar_producto'];

                $result_productos = $producto->buscarPorNombre($buscar_product);
            }
            else{
                $result_productos = $producto->read();
            }
            
            if (mysqli_num_rows($result_productos) >= 1){
                $contador = 0;
                while($producto = mysqli_fetch_array($result_productos)) {
                    $contador ++;?>
                    <tr>
                        <th scope="row"><?php echo $contador?></th>
                        <td><?php echo $producto['Nombre']?></td>
                        <td><?php echo $producto['Descripcion']?></td>
                        <td><?php echo $producto['Stock']?></td>
                        <td><?php echo $producto['PrecioVenta']?></td>
                        
                        <!-- EDIT -->
                        <td class="border-0"> 
                            <a href="update.php?IdProducto=<?php echo $producto['IdProducto']?>" class="btn btn-primary">Edit</a>

                        <!-- DELETE -->
                            <a href="delete.php?IdProducto=<?php echo $producto['IdProducto']?>" class="btn btn-danger">Delete</a>
                        </td>
        
                    </tr>
                <?php }} else{?>
                    <tr>
                        <td class="text-center" colspan="5">
                        <p>
                            <p><?= $buscar_product ? "No se encontraron resultados de <b class='text-primary'>" . $buscar_product : "</b> No hay Productos..."; ?></p>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('../include/footer.php');?>
