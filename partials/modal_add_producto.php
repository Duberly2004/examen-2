<button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">+ Producto</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/eval02/productos/create.php" method="POST" id="productoForm">
            <!-- NOMBRE -->
            <div class="form-group mb-3">
                <input id="nombre" class="form-control" name="Nombre" type="text" placeholder="Nombre" autofocus required minlength="3">
            </div>
            <!-- DESCRIPCION -->
            <div class="form-group mb-3">
                <input id="description" class="form-control" name="Descripcion" type="text" placeholder="Descripción" required minlength="3">
            </div>
            <!-- STOCK -->
            <div class="form-group mb-3">
                <input id="stock" class="form-control" name="Stock" type="text" placeholder="Stock" required>
            </div>
            <!-- PRECIO VENTA -->
            <div class="form-group mb-3">
                <input id="precioVenta" class="form-control" name="PrecioVenta" type="text" placeholder="Precio de Venta" required>
            </div>
       
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <!-- BUTTON REGISTRAR -->
          <input type="submit" class="btn btn-primary" name="guardar_producto" value="Guardar">
      </div>
    </form> <!--form -->
  </div>
</div>
</div>