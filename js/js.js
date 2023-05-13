document.getElementById("productoForm").addEventListener("submit", function(event) {
    var nombre = document.getElementsByName("nombre")[0].value;
    var descripcion = document.getElementsByName("descripcion")[0].value;
    var stock = document.getElementsByName("stock")[0].value;
    var precioVenta = document.getElementsByName("precioVenta")[0].value;

    // Validar los campos según tus criterios
    if (nombre.length < 3) {
        alert("El nombre debe tener al menos 3 caracteres.");
        event.preventDefault(); // Evitar el envío del formulario
    }
    
    if (descripcion.length < 3) {
        alert("La descripción debe tener al menos 3 caracteres.");
        event.preventDefault();
    }

    if (isNaN(stock) || stock < 0) {
        alert("El stock debe ser un número positivo.");
        event.preventDefault();
    }

    if (!/^(\d+(\.\d{1,2})?)$/.test(precioVenta)) {
        alert("El precio de venta debe ser un número decimal válido. Ejemplo: 12.34");
        event.preventDefault();
    }
});