<?php
include('../db.php');
include('../DAO/ProductoDAO.php');

if (isset($_GET['buscar_producto'])) {
  $buscar_product = $_GET['buscar_producto'];

  $productoDAO = new ProductoDAO();
  $resultados = $productoDAO->buscarPorNombre($buscar_product);
} else {
  // Si no se proporciona un término de búsqueda, mostrar un mensaje o redirigir a otra página
}

// Mostrar los resultados de la búsqueda
if ($resultados && mysqli_num_rows($resultados) > 0) {
  while ($producto = mysqli_fetch_array($resultados)) {?>
    <p>Nombre: <?= $producto['Nombre']?></p>
    <p>Descripción: <?= $producto['Descripcion']?></p>
  <?php
    }
} else {
  echo '<p>No se encontraron resultados.</p>';
}
?>