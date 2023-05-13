<?php
class ProductoDAO {
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $stock;
    private $precioVenta;
    
    // Constructor para crear una instancia de la clase con atributos iniciales
    public function __construct($idProducto = null, $nombre = null, $descripcion = null, $stock = null, $precioVenta = null) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->precioVenta = $precioVenta;
    }
    
    // Métodos CRUD
    public function create() {
        $conn = conectar();
        $query = $conn->prepare('INSERT INTO PRODUCTO (Nombre, Descripcion, Stock, PrecioVenta) VALUES (?,?,?,?)'); 
        $nombre = $this->getNombre();
        $descripcion = $this->getDescripcion();
        $stock = $this->getStock();
        $precioVenta = $this->getPrecioVenta();
        $query->bind_param('ssid', $nombre, $descripcion, $stock, $precioVenta);

        if(!$query->execute()){
            return false;
        } else {
            return true;
        }
    }
    
    public function read() {
        $conn = conectar();
        $query = 'SELECT * FROM PRODUCTO';
        $result = mysqli_query($conn, $query);
        
        if(!$result){
            return false;
        } else {
            return $result;
        }
    }
    
    public function update($idProducto) {
        $conn = conectar();
        $query = $conn->prepare('UPDATE PRODUCTO SET Nombre = ?, Descripcion = ?, Stock = ?, PrecioVenta = ? WHERE IdProducto = ?'); 
        $nombre = $this->getNombre();
        $descripcion = $this->getDescripcion();
        $stock = $this->getStock();
        $precioVenta = $this->getPrecioVenta();
        $query->bind_param('ssidi', $nombre, $descripcion, $stock, $precioVenta, $idProducto);

        if(!$query->execute()){
            return false;
        } else {
            return true;
        }
    }
    
    public function delete($idProducto) {
        $conn = conectar();
        $query = 'DELETE FROM PRODUCTO WHERE IdProducto =' . $idProducto;
        $result = mysqli_query($conn, $query);
        
        if(!$result){
            return false;
        } else {
            return true;
        }
    }
    
    public function getProducto($idProducto) {
        $conn = conectar();
        $query = 'SELECT * FROM PRODUCTO WHERE IdProducto =' . $idProducto;
        $result = mysqli_query($conn, $query);
        
        if(!$result){
            return false;
        } else {
            return $result;
        }
    }
    public function buscarPorNombre($nombre){
        $conn = conectar();
        $query = "SELECT * FROM PRODUCTO WHERE Nombre LIKE '%$nombre%'";
        return mysqli_query($conn, $query);
    }

        // Métodos "get" y "set" para los atributos de la clase
    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function getPrecioVenta() {
        return $this->precioVenta;
    }

    public function setPrecioVenta($precioVenta) {
        $this->precioVenta = $precioVenta;
    }

}